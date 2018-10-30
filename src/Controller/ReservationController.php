<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Events;

class ReservationController extends Controller
{

    /**
     * @Route("/reservation", name="reservation")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function reservationAction()
    {

        return $this->render('Reservation/reservation.html.twig');
    }

}
