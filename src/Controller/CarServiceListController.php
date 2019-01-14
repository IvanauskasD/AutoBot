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
    public function index(AuthorizationCheckerInterface $authorizationChecker, $id)
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
}
