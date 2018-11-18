<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Events;

class EmployeeJobsController extends Controller
{

    /**
     * @Route("/employee/pendingJobs", name="pendingJobs")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function pendingJobsAction()
    {

        return $this->render('Employee/pendingJobs.html.twig');
    }

    /**
     * @Route("/employee/currentJobs", name="currentJobs")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function currentJobsAction(){
        return $this->render('Employee/currentJobs.html.twig');
    }

}
