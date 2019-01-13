<?php

namespace App\Controller;

use App\Entity\CarProblme;
use App\Entity\Employee;
use App\Entity\Report;
use App\Entity\Work;
use App\Form\FinishForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Orders;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
//        dump($employeeOrders);
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

        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $employeeOrders = $this->getDoctrine()->getRepository(Orders::class)->findByEmployee($user->getId());
        $testux = $this->getDoctrine()->getRepository(CarProblme::class)->findOneBy([], ['id' => 'desc']);
        $test = new Orders();
        foreach($employeeOrders as $gg)
            $test = $gg;
        //dump($test);
        return $this->render('Employee/currentJobs.html.twig', array(
            'employee' => $employeeOrders,
            'test' => $testux
        ));

    }

    /**
     * @Route("/employee/{id}/finish", name="jobFinished")
     */
    public function Finish(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);
        $order->setStatus("Finished");
        $em->persist($order);
        $em->flush();

        $report = new Report();
        $report->setEmployee($this->getUser());
        $form = $this->createForm(FinishForm::class, $report);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($report);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('Employee/report.html.twig', array(
            'order' => $order,
            'form' => $form->createView()
        ));
    }


    /**
     * @Route("/employee/jobDetails/{id}", name="currentJobDetails")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function currentJobsDetailsAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();
        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);
        $form = $this->createFormBuilder()
            ->add('status', TextType::class, array(
                'label' => 'Trukmė'
            ))
            ->add('cost', TextType::class, array(
                'label' => 'Kaina'
            ))
            ->add('submit', SubmitType::class, array('label' => 'Atnaujinti informaciją'))
            ->getForm();
        $work = new Work();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $bar = $form->get('status')->getData();
            $bars = $form->get('cost')->getData();
            $work->setWorkStatus($bar);

            $order->setDuration($bar);
            $order->setCost($bars);
            $em->flush();


        }
       // dump($order);
        return $this->render('Employee/currentJobDetails.html.twig', array(
            'employee' => $order,
            'form' => $form->createView()
        ));
    }


}
