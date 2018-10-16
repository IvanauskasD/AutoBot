<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Events;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class CompanyLoginController extends Controller
{
    /**
     * @Route("/loginCompany", name="loginCompany")
     * @param AuthenticationUtils $authenticationUtils
     * @param AuthorizationCheckerInterface $authChecker
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function loginAction(AuthorizationCheckerInterface $authChecker, AuthenticationUtils $authenticationUtils)
    {

        if ($authChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('homepage');
        }

        $errors = $authenticationUtils->getLastAuthenticationError();

        $lastUserName=  $authenticationUtils->getLastUsername();
        if ($errors == true)
        {
            $errors = "Incorrect username and/or password";
        }
        return $this->render('Login/companyLogin.html.twig', [
            'errors'=>$errors,
            '$lastUserName' =>$lastUserName
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

    }
}
