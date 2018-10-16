<?php

namespace App\Controller;

use App\Entity\ResetPassword;
use App\Entity\User;
use App\Form\ChangePasswordForm;
use App\Form\ResetPasswordForm;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Annotation\Route;

class ResetPasswordController extends Controller
{
    /**
     * @Route("/resetPassword", name="resetPassword")
     */
    public function resetPassword(Request $request, \Swift_Mailer $mailer)
    {
        $user = new ResetPassword();
        $form = $this->createForm(ResetPasswordForm::class, $user);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if($form->isSubmitted() && $form->isValid())
        {
            $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);
            if($user)
            {
                $passwordResetToken = base64_encode(random_bytes(20));
                $passwordResetToken = str_replace("/","", $passwordResetToken);

                $user->setPasswordResetToken($passwordResetToken);
                $em->flush();

                $message = (new \Swift_Message('Reset password'))
                    ->setFrom('admin@example.com')
                    ->setTo($user->getEmail())
                    ->setBody(
                        $this->renderView(
                            'email/resetPassword.html.twig',
                            array(
                                'token' => $passwordResetToken,
                                'firstname' => $user->getUsername()
                            )
                        ),
                        'text/html'
                    );

                $mailer->send($message);
                return $this->redirectToRoute('homepage');
            }
        }
        return $this->render('resetPassword.html.twig', [
            'form' => $form->createView(),
            'action' => "reset",
        ]);
    }

    /**
     * @Route("/resetPassword/{token}", name="newPassword")
     */
    public function newPassword(Request $request,$token, UserPasswordEncoderInterface $encoder)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['passwordResetToken' => $token]);
        if($user == null)
        {
            return $this->redirectToRoute('homepage');
        } else {
            $password = new User();

            $form = $this->createForm(ChangePasswordForm::class, $password);
            $form->remove('password');
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $newPassword = $encoder->encodePassword($user, $password->getPlainPassword());
                $user->setPassword($newPassword);

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                return $this->redirectToRoute('login');
            }
        }
        return $this->render('resetPassword.html.twig', [
            'form' => $form->createView(),
            'action' => "set",
        ]);
    }
}