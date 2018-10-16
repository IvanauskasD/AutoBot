<?php

namespace  App\Controller;

use App\Entity\User;
use App\Form\ChangePasswordForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ChangePasswordController extends Controller
{
    /**
     * @Route("/changePassword", name="changePassword")
     */
    public function changePassword(Request $request, AuthorizationCheckerInterface $authorizationChecker, UserPasswordEncoderInterface $encoder)
    {
        if(!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }

        $password = new User();
        $user = $this->getUser();

        $form = $this->createForm(ChangePasswordForm::class, $password);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
                $newPassword = $encoder->encodePassword($user, $password->getPlainPassword());
                $password->getPlainPassword();

                if($newPassword != $password)
                {
                    $user->setPassword($newPassword);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($user);
                    $em->flush();
                }

                return $this->redirectToRoute('profile_index');

        }
        return $this->render('profile\changePassword.html.twig', array(
           'form' => $form->createView(),
        ));
    }
}