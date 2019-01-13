<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\Employee;
use App\Form\UserTypeForm;
use App\Entity\User;
use App\Entity\Car;
use App\Entity\Orders;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UsersListController extends Controller
{

    /**
     * @Route("/users/usersList", name="usersList")
     */
    public function index(Request $request, AuthorizationCheckerInterface $authorizationChecker)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('homepage');
        }


        return $this->render('Users/usersList.html.twig', [
        ]);
    }

    /**
     * @Route("showUsers", name="showUsers")
     */
    public function showUsers()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class)->findAll();

        return $this->render('Users/users.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("showCompanies", name="showCompanies")
     */
    public function showCompanies()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(Company::class)->findAll();

        return $this->render('Users/companies.html.twig', [
            'companies' => $users,
        ]);
    }

    /**
     * @Route("showEmployees", name="showEmployees")
     */
    public function showEmployees()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(Employee::class)->findAll();

        return $this->render('Users/employees.html.twig', [
            'employees' => $users,
        ]);
    }


    /*
     * cia reiktu prie trynimu sutikrint priklausomybes, nes bus errorai ten kur prikausomybes manytoone (userio trynimas veikiantis,
     * paziurekit i ji i suprasit kaip reik kitus tikrint kad padaryt)
     */


    /**
     * @Route("/{id}/deleteUser", name="deleteUser")
     */
    public function deleteUser($id)
    {
        $em = $this->getDoctrine()->getManager();
                $car = $this->getDoctrine()->getRepository(User::class)->find($id);
                $cars = $this->getDoctrine()->getRepository(Car::class)->findAllByUserId($id);
                foreach($cars as $carz) {
                    if ($carz != null)
                        $em->remove($carz);
                    else break;
                }
                $em->remove($car);
                $em->flush();
                return $this->redirectToRoute('showUsers');
    }





    /**
     * @Route("/{id}/deleteCompany", name="deleteCompany")
     */
    public function deleteCompany($id)
    {
        $em = $this->getDoctrine()->getManager();
        $car = $this->getDoctrine()->getRepository(Company::class)->find($id);
        $em->remove($car);
        $em->flush();
        return $this->redirectToRoute('showCompanies');
    }

    /**
     * @Route("/{id}/deleteEmployee", name="deleteEmployee")
     */
    public function deleteEmployee($id)
    {
        $em = $this->getDoctrine()->getManager();
        $car = $this->getDoctrine()->getRepository(Employee::class)->find($id);
        $em->remove($car);
        $em->flush();
        return $this->redirectToRoute('showEmployees');
    }


    /**
     * @Route("/{id}/banUser", name="banUser")
     */
    public function banUser($id)
    {
        $car = $this->getDoctrine()->getRepository(User::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $car->setIsActive(false);
        $em->flush();
        return $this->redirectToRoute('showUsers');
    }



    /**
     * @Route("/{id}/banCompany", name="banCompany")
     */
    public function banCompany($id)
    {
        $car = $this->getDoctrine()->getRepository(Company::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $car->setIsActive(false);
        $em->flush();
        return $this->redirectToRoute('showCompanies');
    }

    /**
     * @Route("/{id}/banEmployee", name="banEmployee")
     */
    public function banEmployee($id)
    {
        $car = $this->getDoctrine()->getRepository(Employee::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $car->setIsActive(false);
        $em->flush();
        return $this->redirectToRoute('showEmployees');
    }




}