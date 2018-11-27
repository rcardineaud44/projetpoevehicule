<?php

namespace App\Controller;

use App\Entity\Voiture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends Controller
{
    /**
     * @Route("/list", name="list")
     */
    public function list(EntityManagerInterface $em)
    {
        $listRepo = $em->getRepository(Voiture::class);
        $list = $listRepo->findAll();

        return $this->render('list/list.html.twig', [
            'list' => $list,
        ]);
    }
}
