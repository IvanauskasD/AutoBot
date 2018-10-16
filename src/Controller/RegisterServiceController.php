<?php

namespace App\Controller;

use App\Form\ServiceForm;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use App\Entity\Service;
use Symfony\Component\HttpFoundation\Request;

class RegisterServiceController extends Controller
{
    /**
     * @Route("/user/registerService", name="registerService")
     */
    public function index(Request $request, AuthorizationCheckerInterface $authChecker)
    {
        $em = $this->getDoctrine()->getManager();
        $company = $this->getUser();
        $service = new Service();

        $form = $this->createForm(ServiceForm::class, $service);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $service->setCompany($company);


//            $car = $this->getDoctrine()->getRepository(Service::class)->find($service->getId());

            $service->setCompany($company);
            $em->persist($service);
            $em->flush();

            $user = $this->getUser();
            $services = $this->getDoctrine()->getManager()->getRepository(Service::class)->findByCompanyId($user->getId());
            return $this->render('serviceList.html.twig',[
                'services' => $services
            ]);
        }
        return $this->render('ServiceRegistration/serviceRegistration.html.twig', array(
            'services'=>$form->createView(),
//            'action' => "Add",
        ));
    }
}
