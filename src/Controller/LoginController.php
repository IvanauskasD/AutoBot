<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Events;

class LoginController extends Controller
{

    /**
     * @Route("/login", name="login")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function loginAction()
    {

        return $this->render('Login/login.html.twig');
    }

}
