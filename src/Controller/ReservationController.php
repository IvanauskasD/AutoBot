<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Entity\Orders;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class ReservationController extends Controller
{

    /**
     * @Route("/reservation/{id}", name="reservation")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function reservationAction(Request $request, AuthorizationCheckerInterface $authorizationChecker, $id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }
        $user = $this->getUser();
        $ids = $user->getId();

        $employees = new Employee();
        $employee = $this->getDoctrine()->getRepository(Employee::class)->loadByCompany($user->getId());

        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);

        return $this->render('Reservation/reservation.html.twig', array(
            'order' => $order
        ));
    }

    /**
     * @Route("/reservationDeny/{id}", name="reservationDeny")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function denyReservation()
    {

    }



}
