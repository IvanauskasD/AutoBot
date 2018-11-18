<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Service;
use App\Entity\Orders;
use App\Entity\Company;
use App\Form\TimeForm;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Request;

class CarServiceListController extends Controller
{
    /**
     * @Route("/company/carServices/{id}", name="carServices")
     */
    public function index(AuthorizationCheckerInterface $authorizationChecker, string $id)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }
        $em = $this->getDoctrine()->getManager();
        
        $car = $em->getRepository(Car::class)->findById($id);
        //$companies = $em->getRepository(Service::class)->findBy(['serviceCategory' => $car->getServiceCategory(),'serviceName' => $car->getServiceName()]);
        return $this->render('carServiceList.html.twig', [
            'car' => $car
        ]);
    }

//    /**
//     * @Route("/company/test", name="VisitTime")
//     */
//    public function selectTime(Request $request, AuthorizationCheckerInterface $authorizationChecker, int $id)
//    {
//        $em = $this->getDoctrine()->getManager();
//        $car = $em->getRepository(Car::class)->find($id);
//
//
//
//
//
//    }

//    /**
//     * @Route("/company/carServices/car={car_id}&&company={company_id}", name="RegisterCarService")
//     */
//    public function Register(Request $request, AuthorizationCheckerInterface $authorizationChecker, string $car_id, int $company_id)
//    {
//        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
//            return $this->redirectToRoute('homepage');
//        }
//        $em = $this->getDoctrine()->getManager();
//        $company = $em->getRepository(Company::class)->find($company_id);
//        $car = $em->getRepository(Car::class)->find($car_id);
//        $newOrder = new Orders();
//        $form = $this->createForm(TimeForm::class, $newOrder);
//        $form->handleRequest($request);
//        if($form->isSubmitted() && $form->isValid())
//        {
//
//            $newOrder->setCompany($company);
//            $newOrder->setCar($car);
//            $newOrder->setStatus('Waiting');
//            dump($newOrder);
//            $em->persist($newOrder);
//            $em->flush();
//            return $this->redirectToRoute('homepage');
//        }
//
//
//
//
//        $em = $this->getDoctrine()->getManager();
//        $user = $this->getUser();
//        $cars = $em->getRepository(Car::class)->findAllByUserId($user->getId());
//
//        return $this->render('selectTime.html.twig', array(
//            'time_form' => $form->createView(),
//            'cars' => $cars));
////        return $this->render('profile/index.html.twig',
////            ['error' => null,
////             'cars' => $cars
////            ]);
//    }
    
}
