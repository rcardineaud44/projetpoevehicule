<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\AjoutVoitureType;
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
<<<<<<< HEAD
        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController',
        ]);
=======

        $voiture = new Voiture();

        $form = $this->createForm(AjoutVoitureType::class, $voiture);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($form);
            $em->flush();

            $this->addFlash('success', 'Voiture ajoutée');

            return $this->redirectToRoute('list');
        }


            return $this->render('voiture/index.html.twig', [
            'form' => $form->createView()
            ]);
>>>>>>> e461493b357ffc44e63aa2a2e624eac7b0cb8f02
    }
}
