<?php
// src/Controller/HomeController.php
namespace App\Controller;


use App\Events;
use App\Entity\Orders;
use App\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;



class HomeController extends AbstractController
{
    /**
     * @Route("/homepage", name="homepage")
     */
    public function index(AuthorizationCheckerInterface $authChecker)
    {
        
        if ($authChecker->isGranted('ROLE_COMPANY'))
        {
            $user = $this->getUser();
            $em = $this->getDoctrine()->getManager();
            dump($user->getId());
//            $pendingOrders = $em->getRepository(Orders::class)->findWaitingByCompany($user->getId());
//            $acceptedOrders = $em->getRepository(Orders::class)->findCurrentByCompany($user->getId());
//            dump($pendingOrders);
            return $this->render('homepage.html.twig', [
//                'pendingOrders' => $pendingOrders,
//                'acceptedOrders' => $acceptedOrders
            ]);
        }
        else
        {
            return $this->render('homepage.html.twig', [
            ]);
        }
        
    }
}
