<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Service;
use App\Form\CarForm;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Request;
class CarRegistrationController extends Controller
{
    /**
     * @Route("/carRegistration", name="CarRegistration")
     * @throws \LogicException
     */
    public function carRegisterAction(Request $request, AuthorizationCheckerInterface $authChecker)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $newCar = new Car();
        $services = $em->getRepository(Service::class)->findAllUnique();
        dump($services);
        $form = $this->createForm(CarForm::class, $newCar, array(
            'service_choices' => $services));
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            
            $service = $newCar->getServiceName();
            $newCar->setServiceCategory($service->getServiceCategory());
            $newCar->setServiceName($service->getServiceName());
            $newCar->setUser($user);
            $em->persist($newCar);
            $em->flush();

            return $this->redirectToRoute('carServices', ['id' => $newCar->getCarId()]);
        }

        return $this->render('CarRegistration/carRegistration.html.twig', [
            'car_form' =>$form->createView()
        ]);
    }
}
