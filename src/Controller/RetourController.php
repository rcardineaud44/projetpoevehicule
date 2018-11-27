<?php

namespace App\Controller;

use App\Entity\Reservation;
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
            'retourForm' => $retourForm->createView()
        ]);
    }
}
