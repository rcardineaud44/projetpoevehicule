<?php

namespace App\Controller;

use App\Entity\Conducteur;
use App\Entity\Reservation;
use App\Entity\Voiture;
use App\Form\RetourType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RetourController extends Controller
{
    /**
     * @Route("/retour/{id_voiture}", name="retour")
     */
    public function retourner($id_voiture, Request $request, EntityManagerInterface $em)
    {
        //pour recuperer l'id du vehicule
        $listRepo = $em->getRepository(Voiture::class);
        $voiture = $listRepo->find($id_voiture);

        //pour le retour par rapport à l'id du véhucile
        $detailRepo = $em->getRepository(Reservation::class);
        $Detailvoiture = $detailRepo->find($id_voiture);

        $retourForm = $this->createForm(RetourType::class, $Detailvoiture);

        $retourForm->handleRequest($request);

        if($retourForm->isSubmitted() && $retourForm->isValid()){
            $Detailvoiture->setDisponibilite(true);
            $em->persist($Detailvoiture);
            $em->flush();

            $this->addFlash('success', 'Voiture retourner');

            return $this->redirectToRoute('list');
        }

        return $this->render('retour/retour.html.twig', [
            'voiture' => $voiture,
            'retourForm' => $retourForm->createView()
        ]);
    }
}
