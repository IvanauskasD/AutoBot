<?php

namespace App\Controller;

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
     * @Route("/reservation", name="reservation")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function reservationAction(Request $request, AuthorizationCheckerInterface $authorizationChecker, $id)
    {
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
        return $this->render('Reservation/reservation.html.twig');
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
        }
        dump($order);
        return $this->render('Reservation/denyComment.html.twig', array(
            'order' => $order,
            'form' => $form->createView()
        ));
    }





}
