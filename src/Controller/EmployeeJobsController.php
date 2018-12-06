<?php

namespace App\Controller;

use App\Entity\Employee;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Orders;

class EmployeeJobsController extends Controller
{

    /**
     * @Route("/employee/pendingJobs", name="pendingJobs")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function pendingJobsAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $employeeOrders = $this->getDoctrine()->getRepository(Orders::class)->findByEmployee($user->getId());
        dump($employeeOrders);
        return $this->render('Employee/pendingJobs.html.twig', array(
            'employee' => $employeeOrders)
        );
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
