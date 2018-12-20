<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\Employee;
use App\Entity\User;
use App\Form\CompanyForm;
use App\Form\EmployeesForm;
use App\Form\UserForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Events;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserLoginController extends Controller
{
    /**
     * @Route("/loginUser", name="loginUser")
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
        return $this->render('Login/userLogin.html.twig', [
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

    /**
     * @Route("/{id}/edit", name="profile_edit")
     */
    public function edit(Request $request, User $user)
    {
        $form = $this->createForm(UserForm::class, $user);
        $form->remove('plainPassword');
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em ->flush();
            return $this->redirectToRoute('profile_index', ['id' => $user->getId()]);
        }
        return $this->render('profile/edit.html.twig', [
            'profile' => $user,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{id}/editC", name="profile_editC")
     */
    public function edit1(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $car = $em->getRepository(Company::class)->find($id);
        $form = $this->createForm(CompanyForm::class, $car);
        $form->remove('plainPassword');
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em ->flush();

        }
        return $this->render('profile/editC.html.twig', [
            'profile' => $car,
            'form' => $form->createView(),
        ]);
    }
}
