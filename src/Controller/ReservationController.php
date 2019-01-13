<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\CarProblme;
use App\Entity\DenyComment;
use App\Entity\Employee;
use App\Entity\Orders;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use App\Form\DenyCommentForm;
class ReservationController extends Controller
{

    /**
     * @Route("/reservation", name="reservations")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function reservationAction(Request $request, AuthorizationCheckerInterface $authorizationChecker)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $cars = $em->getRepository(Car::class)->findAllByUserId($user->getId());
        $orders = $em->getRepository(Orders::class)->findByUser($user->getId());


//        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
//            return $this->redirectToRoute('homepage');
//        }
//        $user = $this->getUser();
//        $ids = $user->getId();
//
//        $employees = new Employee();
//        $employee = $this->getDoctrine()->getRepository(Employee::class)->loadByCompany($user->getId());
//
//        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);
//
//        return $this->render('Reservation/reservation.html.twig', array(
//            'order' => $order
//        ));

        return $this->render('Reservation/reservation.html.twig', array(
            'order' => $orders,
            'car' => $cars
        ));
    }

    /**
     * @Route("/DeclineReservation/{id}", name="DeclineReservation")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function reservationDeclineAction(Request $request, AuthorizationCheckerInterface $authorizationChecker, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);


        $order->setStatus("Canceled");

        $em->flush();

        return $this->redirectToRoute('reservations');
    }

    /**
     * @Route("/pendingJobList/{id}", name="pendingJobList")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function pendingJobsAction(AuthorizationCheckerInterface $authorizationChecker, $id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }

        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);


        return $this->render('Reservation/pendingJobs.html.twig', array(
            'order' => $order
        ));
    }

    /**
     * @Route("/jobDetails/{id}", name="jobDetails")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function jobDetailsAction(AuthorizationCheckerInterface $authorizationChecker, $id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }

        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);

        return $this->render('Employee/jobDetails.html.twig', array(
            'order' => $order
        ));
    }


    /**
     * @Route("/reservationDeny/{id}", name="reservationDeny")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function denyReservation(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $comment = new DenyComment();
        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);
        $form = $this->createForm(DenyCommentForm::class, $comment);
        $form->handleRequest($request);
        $order->setStatus("Dismissed");
        if($form->isSubmitted() && $form->isValid())
        {


            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }
        dump($order);
        return $this->render('Reservation/denyComment.html.twig', array(
            'order' => $order,
            'form' => $form->createView()
        ));
    }




    /**
     * @Route("/reservationAccept/{id}", name="reservationAccept")
     */
    public function Accept(Request $request, AuthorizationCheckerInterface $authorizationChecker, int $id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }
        $user = $this->getUser();
        $ids = $user->getId();
        $em = $this->getDoctrine()->getManager();
        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);
        $employees = new Employee();
        $employee = $this->getDoctrine()->getRepository(Employee::class)->loadByCompany($user->getId());
//        $form = $this->createForm(EmployeesForm::class, $employees, array(
//            'ids' => $ids
//        ));
//        if($form->isSubmitted() && $form->isValid())
//        {
//
//            $employees->setOrders($order);
//
//            $em->persist($employees);
//            $em->flush();
//        }
//        $form->handleRequest($request);
        $order->setStatus("Approved");
        $em->persist($order);
        $em->flush();


        return $this->redirectToRoute('homepage');
    }





}
