<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Events;

class CarRegisterForService extends Controller
{

    /**
     * @Route("/carservice", name="carservice")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function CarRegisterForServiceAction()
    {

        return $this->render('CarRegisterForService/carservice.html.twig');
    }

}
