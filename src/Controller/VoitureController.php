<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Voiture;
use App\Form\AjoutVoitureType;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
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
     * @Route("/ajout", name="index")
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


            return $this->render('voiture/voiture.html.twig', [
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

    /**
     * @Route("/suivi/{id_voiture}", name="suivi")
     */
    public function suivi($id_voiture, Request $request, EntityManagerInterface $em)
    {
        $detailRepo = $em->getRepository(Reservation::class);

        $totalCarburant = 0;
        $totalKm = 0;
        $consoMoyenne = 0;



        //Appel d'une méthode permettant de recuperer toutes les reservations concernant une voiture
        //Stockage des reservations dans un tableat, ici $reservation
        $reservation = $detailRepo->returnAllReservationByVoiture($id_voiture);

        //Vérification que des reservations existent pour cette voiture
        if($reservation){
            $voiture = $reservation[0]->getVehicule();
            foreach ($reservation as $resa){
                $totalCarburant = $totalCarburant + $resa->getLitreCarburant();
                $totalKm = $totalKm + $resa->getKmParcouru();
            }
            $isVoiture = true;
            $consoMoyenne = ($totalCarburant*100)/$totalKm;

        } else {
            $voiture = new Voiture();
            $isVoiture = false;
        }

        dump($reservation);
        
        return $this->render('voiture/suivi.html.twig', [
            'reservations' => $reservation,
            'voiture' => $voiture,
            'isVoiture' => $isVoiture,
            'consoMoyenne' => $consoMoyenne
            ]);
    }

}
