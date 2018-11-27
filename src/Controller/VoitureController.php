<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\AjoutVoitureType;
use App\Form\ReservationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class VoitureController
 * @package App\Controller
 * @Route("/voiture", name="voiture_")
 */
class VoitureController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request, EntityManagerInterface $em)
    {
        $voiture = new Voiture();

        $form = $this->createForm(AjoutVoitureType::class, $voiture);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $voiture->setDisponibilite(true);
            $em->persist($voiture);
            $em->flush();

            $this->addFlash('success', 'Voiture ajoutée');

            return $this->redirectToRoute('list');
        }


            return $this->render('voiture/index.html.twig', [
            'form' => $form->createView()
            ]);
    }

    /**
     * @Route("/reservation/{id_voiture}", name="reservation")
     */
    public function reservation($id_voiture, Request $request, EntityManagerInterface $em)
    {
        $detailRepo = $em->getRepository(Voiture::class);
        $Detailvoiture = $detailRepo->find($id_voiture);

        $formResa = $this->createForm(ReservationType::class, $Detailvoiture);

        $formResa->handleRequest($request);

        if($formResa->isSubmitted() && $formResa->isValid()){
            $Detailvoiture->setDisponibilite(false);

            $em->persist($Detailvoiture);
            $em->flush();

            $this->addFlash('success', 'Voiture reservée');

            return $this->redirectToRoute('list');
        }


        return $this->render('voiture/reservation.html.twig', [
            'form' => $formResa->createView(), 'voiture' => $Detailvoiture]);
    }

}
