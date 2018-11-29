<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Profile;
use App\Entity\Maker;
use App\Entity\Service;
use App\Form\CarForm;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CarRegistrationController extends Controller
{

//    public function carRegisterAction(Request $request, AuthorizationCheckerInterface $authChecker)
//    {
//        $em = $this->getDoctrine()->getManager();
//        $user = $this->getUser();
//        $newCar = new Car();
//        $form = $this->createForm(CarForm::class, $newCar);
//        $form->handleRequest($request);
//
//        if($form->isSubmitted() && $form->isValid())
//        {
//            $newCar->setUser($user);
//            $em->persist($newCar);
//            $em->flush();
//
//            return $this->redirectToRoute('carServices', ['id' => $newCar->getCarId()]);
//        }
//
//        return $this->render('CarRegistration/carRegistration.html.twig', [
//            'car_form' =>$form->createView()
//        ]);
//    }
    /**
     * @Route("/carRegistration", name="CarRegistration")
     * @throws \LogicException
     */
    public function create(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $profile = new Profile();
        $meetup = new Car();
        $form = $this->createForm(CarForm::class, $meetup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $meetup->setUser($user);
            $em->persist($meetup);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('CarRegistration/carRegistration.html.twig', [
            'car' =>$form->createView()
        ]);
    }


}
