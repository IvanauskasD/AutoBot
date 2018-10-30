<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\User;
use App\Entity\Employee;
use App\Entity\Orders;
use App\Form\JobForm;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Request;

class AgreementsController extends Controller
{


    /**
     * @Route("/agreements", name="agreements")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function feedbackAction()
    {

        return $this->render('Agreements/agreements.html.twig');
    }

}
