<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\AdminJob;
use App\Entity\Job;
use App\Entity\Company;
use App\Entity\Orders;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\JobDesForm;
class CarRegisterForService extends Controller
{

    /**
     * @Route("/carservice", name="carservice")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function CarRegisterForServiceAction1()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $cars = $em->getRepository(Car::class)->findAllByUserId($user->getId());


//        $defaultData = array('message' => 'Type your message here');
//        $form = $this->createFormBuilder($defaultData)
//            ->add('jobName', EntityType::class, array(
//                'class' => AdminJob::class,
//                'label' => 'Job Name'
//            ))
//            ->getForm();
//        $form->handleRequest($request);
//        $questionForms = $form["jobName"]->getData();
//        $form->handleRequest($request);


        return $this->render('CarRegisterForService/carservice.html.twig', [
            'cars' => $cars,
        ]);
    }

    /**
     * @Route("/user/carServices/{id}", name="carservices")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function CarRegisterForServiceAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();


//        $defaultData = array('message' => 'Type your message here');
//        $form = $this->createFormBuilder($defaultData)
//            ->add('jobName', EntityType::class, array(
//                'class' => AdminJob::class,
//                'label' => 'Job Name'
//            ))
//            ->add('save', SubmitType::class, array('label' => 'Create Task'))
//            ->getForm();
//        $form->handleRequest($request);
//        $questionForms = $form["jobName"]->getData();

//        $form->handleRequest($request);
        $form = $this->createFormBuilder()
            ->add('jobName', EntityType::class, array(
                'class' => Job::class
            ))
            ->add('submit', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        $form->handleRequest($request);
        $companies = $em->getRepository(Job::class);
        $products = new Job();
        if ($form->isSubmitted() && $form->isValid()) {
            $bar = $form->get('jobName')->getData();
            $bars = $bar->getJobName();
            $products = $companies->findByOrderNotGrouped($bars);
            dump($products);
        }




        dump($products);

        return $this->render('CarRegisterForService/carservicelist.html.twig', [
            'companies' => $products,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/carServices/car={car_id}&&company={company_id}", name="RegisterCarService")
     */
    public function Register(Request $request, AuthorizationCheckerInterface $authorizationChecker, string $car_id, int $company_id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository(Company::class)->find($company_id);
        $car = $em->getRepository(Car::class)->find($car_id);
        $newOrder = new Orders();
//        $form = $this->createForm(TimeForm::class, $newOrder);
//        $form->handleRequest($request);
//        if($form->isSubmitted() && $form->isValid())
//        {
//            $newOrder->setCompany($company);
//            $newOrder->setCar($car);
//            $newOrder->setStatus('Waiting');
//            dump($newOrder);
//            $em->persist($newOrder);
//            $em->flush();
//            return $this->redirectToRoute('homepage');
//        }
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $cars = $em->getRepository(Car::class)->findAllByUserId($user->getId());
        return $this->render('selectTime.html.twig', array(
            'time_form' => $form->createView(),
            'cars' => $cars));
//        return $this->render('profile/index.html.twig',
//            ['error' => null,
//             'cars' => $cars
//            ]);
    }

}
