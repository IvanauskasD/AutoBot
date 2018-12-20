<?php
namespace App\Controller;
use App\Entity\Car;
use App\Entity\Profile;
use App\Entity\User;
use App\Form\CarForm;
use App\Form\ProfileForm;
use App\Form\UserForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * @Route("/profile")
 */
class ProfileController extends Controller
{
    /**
     * @Route("/", name="profile_index")
     */
    public function index(AuthorizationCheckerInterface $authorizationChecker)
    {
        if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            return $this->redirectToRoute('homepage');
        }
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $cars = $em->getRepository(Car::class)->findAllByUserId($user->getId());

        return $this->render('profile/index.html.twig',
            ['error' => null,
            'cars' => $cars
            ]);
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
     * @Route("/{id}/editCar", name="editCar")
     */
    public function editCar($id, Request $request)
    {
        $car = $this->getDoctrine()->getRepository(Car::class)->find($id);
        $form = $this->createForm(CarForm::class, $car);
        $form->remove('city');
        $form->remove('serviceCategory');
        $form->remove('serviceName');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $user = $this->getUser();
            $cars = $em->getRepository(Car::class)->findAllByUserId($user->getId());
            return $this->render('profile/index.html.twig',
                ['error' => null,
                'cars' => $cars]);
        }

        return $this->render('profile/editCar.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/deleteCar", name="deleteCar")
     */
    public function deleteCar($id)
    {
        $car = $this->getDoctrine()->getRepository(Car::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($car);
        $em->flush();

        return $this->redirectToRoute('profile_index');
    }


}