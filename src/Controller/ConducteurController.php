<?php

namespace App\Controller;

use App\Entity\Conducteur;
use App\Form\ConducteurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/conducteur", name="conducteur_")
 */
class ConducteurController extends Controller
{
    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajout(Request $request, EntityManagerInterface $em)
    {
        $conducteur = new Conducteur();

        $form = $this->createForm(ConducteurType::class, $conducteur);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em->persist($conducteur);
            $em->flush();

            $this->addFlash('success', 'Lieu ajouté');

            return $this->redirectToRoute('list');
        }


        return $this->render('conducteur/ajoutConducteur.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
