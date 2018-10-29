<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\User;
use App\Entity\Employee;
use App\Entity\Orders;
use App\Form\JobForm;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Request;

class UsersListController extends Controller
{

    /**
     * @Route("/users/usersList", name="usersList")
     */
    public function index(AuthorizationCheckerInterface $authorizationChecker)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }
        $user = $this->getUser();
        return $this->render('Users/usersList.html.twig', [
            'employees' => $user,
        ]);
    }



}