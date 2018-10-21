<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Employee;
use App\Entity\Orders;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class ClientListController extends Controller
{
    /**
     * @Route("/company/profile", name="companyProfile")
     */
    public function index(AuthorizationCheckerInterface $authorizationChecker)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }
        $user = $this->getUser();
        $users = $this->getDoctrine()->getManager()->getRepository(User::class)->findAll();
        $employee = $this->getDoctrine()->getManager()->getRepository(Employee::class)->findByCompany($user->getId());
//        $orders = $this->getDoctrine()->getManager()->getRepository(Orders::class)->findByCompany($user->getId());
        dump($employee);
        return $this->render('profile/clientList.html.twig', [
            'employees' => $employee,
        ]);
    }
    
}
