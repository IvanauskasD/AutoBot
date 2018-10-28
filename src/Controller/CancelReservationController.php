<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Events;

class CancelReservationController extends Controller
{

    /**
     * @Route("/cancelreservation", name="cancelreservation")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function CancelReservationAction()
    {

        return $this->render('CancelReservation/cancelreservation.html.twig');
    }

}
