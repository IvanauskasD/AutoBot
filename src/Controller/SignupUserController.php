<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use App\Events;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use App\Form\UserForm;

class SignupUserController extends AbstractController
{

    /**
     * @Route("/signupUser", name="registrationUser")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $encoder, AuthorizationCheckerInterface $authChecker)
    {


        $user = new User();

        $form = $this->createForm(UserForm::class, $user);

        $form->handleRequest($request);

        $repository = $this->getDoctrine()->getRepository(Company::class);
        $companyExists = $repository->findBy(['email' => $user->getEmail()]);

        $repository = $this->getDoctrine()->getRepository(User::class);
        $userExists = $repository->findBy(['email' => $user->getEmail()]);

        if($form->isSubmitted() && $form->isValid() && !$companyExists && !$userExists)
        {
            $password = $encoder
                ->encodePassword(
                    $user,
                    $user->getPlainPassword()
                );

            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('login');
        }
        $error = '';
        $tried = false;
        if ($companyExists || $userExists)
        {
            $error = "This email is already taken";
            $tried = true;
        }
        return $this->render('Registration/registrationUsers.html.twig',
            array('error' => $error, 'tried' => $tried, 'success' => false, 'registration_form' => $form->createView(),
        ));
    }
}
