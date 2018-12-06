<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Orders;
use App\Entity\Job;
use App\Entity\Employee;
use App\Form\EmployeesForm;
use App\Form\DurationForm;
use App\Form\OrdersForm;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class OrdersController extends Controller
{
    /**
     * @Route("/order", name="order")
     */
    public function index(Request $request, AuthorizationCheckerInterface $authorizationChecker)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }


        $user = $this->getUser();
        $cars = $user->getCars();
        $em = $this->getDoctrine()->getManager();
        $newService = new Job();
        $newOrders = new Orders();
        $newCar = $this->getDoctrine()->getRepository(Car::class)->findAll();
        $service = $this->getDoctrine()->getRepository(Job::class)->findAll();

        $form = $this->createForm(OrdersForm::class, $newOrders);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            foreach ($service as $ser)
                foreach ($newCar as $car)
                    if ($ser->getServiceName() == $car->getServiceName() && $ser->getServiceCategory() == $car->getServiceCategory()) {
                        $newOrders->setServiceName($ser->getServiceName());
                        $newOrders->setServiceCategory($ser->getServiceCategory());
                        $newOrders->setUser($user);
                        $newOrders->setCar($car);
                        $em->persist($newOrders);
                        $em->flush();

                    }
        return $this->redirectToRoute('homepage');

        }
    }
    /**
     * @Route("/order/{id}", name="orderDetails")
     */
    public function Details(Request $request, AuthorizationCheckerInterface $authorizationChecker,  $id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }
        $user = $this->getUser();
        $employee = $this->getDoctrine()->getRepository(Employee::class)->loadByCompany($user->getId());
        $form = $this->createForm(EmployeesForm::class, $employee);

        $form->handleRequest($request);
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);



        if($form->isSubmitted() && $form->isValid())
        {

            $employee->setOrders();

            $em->persist($employee);
            $em->flush();
        }
        dump($employee);

        return $this->render('orderDetails.html.twig', [
            'order' => $order,
            'form' => $form->createView()
        ]);
    }



    /**
     * @Route("/order/{id}/duration", name="orderDuration")
     */
    public function Duration(Request $request, AuthorizationCheckerInterface $authorizationChecker,  $id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);
        $form = $this->createForm(DurationForm::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $em->persist($order);
            $em ->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->render('duration.html.twig', array(
            'duration_form' => $form->createView()));
    }

    /**
     * @Route("/order/{id}/charge", name="orderCost")
     */
    public function Charge(Request $request, AuthorizationCheckerInterface $authorizationChecker, int $id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);
        $form = $this->createForm(OrdersForm::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $em->persist($order);
            $em ->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->render('cost.html.twig', array(
            'cost_form' => $form->createView()));
    }


    /**
     * @Route("/order/{id}/accept", name="orderAccept")
     */
    public function Accept(Request $request, AuthorizationCheckerInterface $authorizationChecker, int $id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);
        $order->setStatus("Accepted");
        $em->persist($order);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }
    /**
     * @Route("/order/{id}/deny", name="orderDeny")
     */
    public function Deny(Request $request, AuthorizationCheckerInterface $authorizationChecker, int $id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);
        $order->setStatus("Dismissed");
        $em->persist($order);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/order/{id}/finish", name="orderFinish")
     */
    public function Finish(Request $request, AuthorizationCheckerInterface $authorizationChecker, int $id, \Swift_Mailer $mailer)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }
        $user = $this->getUser();
       // $company = $this->getCompany();
        $em = $this->getDoctrine()->getManager();
        $order = $this->getDoctrine()->getRepository(Orders::class)->findByOrderId($id);
        $order->setStatus("Finished");
        $em->persist($order);
        $em->flush();

        $message = (new \Swift_Message('Your car was fixed'))
            ->setFrom('admin@example.com')
            ->setTo($user->getEmail())
            ->setBody(
                $this->renderView(
                    'email/confirmation.html.twig',
                    array(
                        'firstnames' => $user->getUsername()
                    )
                ),
                'text/html'
            );

        $mailer->send($message);

        return $this->redirectToRoute('homepage');
    }
}
