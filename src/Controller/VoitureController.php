<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

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
    public function index()
    {
        return $this->render('voiture/list.html.twig', [
            'controller_name' => 'VoitureController',
        ]);
    }
}
