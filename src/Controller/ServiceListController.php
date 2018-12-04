<?php
namespace App\Controller;

use App\Entity\Job;
use App\Form\ServiceForm;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Request;

class ServiceListController extends Controller
{
    /**
     * @Route("/company/services", name="companyServices")
     */
    public function index(AuthorizationCheckerInterface $authorizationChecker)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }
        $user = $this->getUser();
        $services = $this->getDoctrine()->getManager()->getRepository(Job::class)->findByCompanyId($user->getId());
        return $this->render('serviceList.html.twig',[
            'services' => $services
        ]);
    }

    /**
     * @Route("/company/services/delete/{id}", name="deleteService")
     */
    public function Delete ($id, AuthorizationCheckerInterface $authorizationChecker)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }
        $em = $this->getDoctrine()->getManager();
        $service = $em->getRepository(Job::class)->find($id);
        if ($service)
        {
            $em->remove($service);
            $em->flush();
        }
        $user = $this->getUser();
        $services = $this->getDoctrine()->getManager()->getRepository(Job::class)->findByCompanyId($user->getId());
        return $this->render('serviceList.html.twig',[
            'services' => $services
        ]);
    }

    /**
     * @Route("/company/services/edit/{id}", name="editService")
     */
    public function Edit (int $id, AuthorizationCheckerInterface $authorizationChecker, Request $request)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }
        $em = $this->getDoctrine()->getManager();
        $service = $em->getRepository(Job::class)->find($id);

        $form = $this->createForm(ServiceForm::class, $service);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($service);
            $em->flush();
            $user = $this->getUser();
            $services = $this->getDoctrine()->getManager()->getRepository(Job::class)->findByCompanyId($user->getId());
            return $this->render('serviceList.html.twig',[
            'services' => $services
            ]);
        }

        $user = $this->getUser();
        $services = $this->getDoctrine()->getManager()->getRepository(Job::class)->findByCompanyId($user->getId());
        return $this->render('ServiceRegistration/serviceRegistration.html.twig', [
            'services' =>$form->createView()
        ]);
    }
}
