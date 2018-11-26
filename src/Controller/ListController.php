<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends Controller
{
    /**
     * @Route("/list", name="list")
     */
    public function index()
    {
        return $this->render('list/list.html.twig', [
            'controller_name' => 'ListController',
        ]);
    }
}
