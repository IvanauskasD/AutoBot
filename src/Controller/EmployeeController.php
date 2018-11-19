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

class EmployeeController extends Controller
{

    /**
     * @Route("/company/employeeList", name="employee")
     */
    public function index(AuthorizationCheckerInterface $authorizationChecker)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }
        $user = $this->getUser();
        $users = $this->getDoctrine()->getManager()->getRepository(User::class)->findAll();
        $employee = $this->getDoctrine()->getManager()->getRepository(Employee::class)->findByCompany($user->getId());
//        $orders = $this->getDoctrine()->getManager()->getRepository(Orders::class)->findByCompany($user->getId());
        dump($employee);
        return $this->render('Company/employee.html.twig', [
            'employees' => $employee,
        ]);
    }


    /**
     * @Route("/company/addJobs", name="addJobs")
     */
    public function addJob(Request $request, AuthorizationCheckerInterface $authChecker)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $newJob = new Job();
        $form = $this->createForm(JobForm::class, $newJob);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newJob->setUser($user);
            $em->persist($newJob);
            $em->flush();

            return $this->redirectToRoute('companyJobs');
        }
            return $this->render('Company/addJob.html.twig', array(
                'registration_form' => $form->createView()));
        }

    /**
     * @Route("/company/parts", name="partsPrice")
     */
    public function parts()
    {
        return $this->render('Company/parts.html.twig');
    }

    /**
     * @Route("/company/jobs", name="companyJobs")
     */
    public function jobs()
    {
        return $this->render('Company/jobs.html.twig');
    }

}