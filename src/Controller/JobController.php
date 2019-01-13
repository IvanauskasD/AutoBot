<?php
namespace App\Controller;

use App\Entity\Job;
use App\Entity\AdminJob;
use App\Entity\Orders;
use App\Entity\Service;
use App\Entity\User;
use App\Form\JobDesForm;
use App\Form\DurationForm;
use App\Form\JobForm;
use App\Form\JobAddForm;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class JobController extends Controller
{
    /**
     * @Route("/jobReg", name="jobReg")
     */
    public function index(Request $request, AuthorizationCheckerInterface $authorizationChecker){

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $newJob = new AdminJob();
        $form = $this->createForm(JobForm::class, $newJob);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $newJob->setAdministrator($user);
            $em->persist($newJob);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }
        return $this->render('Registration/registrationJobs.html.twig', array(
            'jobs_form' => $form->createView()));
    }

    /**
     * @Route("/{id}/company/deleteJob", name="deleteJob")
     */
    public function deleteJob(Request $request, AuthorizationCheckerInterface $authorizationChecker)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $car = $this->getDoctrine()->getRepository(Job::class)->find($id);
        $cars = $this->getDoctrine()->getRepository(Car::class)->findAllByUserId($id);

    }
    /**
     * @Route("/company/addJobs", name="addJobs")
     */
    public function addJob(Request $request, AuthorizationCheckerInterface $authChecker)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $meetup = new Job();
        $form = $this->createForm(JobAddForm::class, $meetup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $meetup->setCompanyId($user);
            $em->persist($meetup);
            $em->flush();

            return $this->redirectToRoute('companyJobs');
        }
        return $this->render('Company/addJob.html.twig', array(
            'registration_form' => $form->createView()));
    }

    /**
     * @Route("/company/jobs", name="companyJobs")
     */
    public function jobs(Request $request, AuthorizationCheckerInterface $authChecker)
    {
        if ($authChecker->isGranted('ROLE_COMPANY')) {
            $em = $this->getDoctrine()->getManager();
            $id = $this->getUser();
            $jobs = $em->getRepository(Job::class)->findBy(['companyId' => $id]);

            return $this->render('Company/jobs.html.twig', [
                'jobs' => $jobs,
            ]);
        }
    }

    /**
     * @Route("/{id}/company/jobsDelete", name="deleteJob")
     */
    public function Delete ( AuthorizationCheckerInterface $authorizationChecker, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $jobs = $em->getRepository(Job::class)->find($id);



            $em->remove($jobs);
            $em->flush();
        return $this->redirectToRoute('companyJobs');
    }

    /**
     * @Route("/company/parts", name="partsPrice")
     */
    public function parts()
    {
        return $this->render('Company/parts.html.twig');
    }

}