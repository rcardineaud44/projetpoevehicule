<?php

namespace App\Controller;

use App\Entity\Lieu;
use App\Form\LieuType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lieu", name="lieu_")
 */
class LieuController extends Controller
{
    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajout(Request $request, EntityManagerInterface $em)
    {
        $lieu = new Lieu();

        $form = $this->createForm(LieuType::class, $lieu);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em->persist($lieu);
            $em->flush();

            $this->addFlash('success', 'Lieu ajouté');

            return $this->redirectToRoute('list');
        }


        return $this->render('lieu/ajoutLieu.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
