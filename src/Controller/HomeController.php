<?php
// src/Controller/HomeController.php
namespace App\Controller;


use App\Events;
use App\Entity\Orders;
use App\Entity\Company;
use App\Form\JobForm;
use App\Entity\Job;
use App\Entity\AdminJob;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends AbstractController
{
    /**
     * @Route("/homepage", name="homepage")
     */
    public function index(AuthorizationCheckerInterface $authChecker, Request $request)
    {
        
        if ($authChecker->isGranted('ROLE_COMPANY'))
        {
            $user = $this->getUser();
            $em = $this->getDoctrine()->getManager();

//            $pendingOrders = $em->getRepository(Orders::class)->findWaitingByCompany($user->getId());
//            $acceptedOrders = $em->getRepository(Orders::class)->findCurrentByCompany($user->getId());
//            dump($pendingOrders);
            return $this->render('homepage.html.twig', [
//                'pendingOrders' => $pendingOrders,
//                'acceptedOrders' => $acceptedOrders
            ]);
        }
        else if($authChecker->isGranted('ROLE_ADMIN')){
            $em = $this->getDoctrine()->getManager();
            $jobs = $em->getRepository(AdminJob::class)->findAll();

            return $this->render('homepage.html.twig', [
                'job' => $jobs,
            ]);
        }
        else
        {
            return $this->render('homepage.html.twig', [
            ]);
        }
        
    }


    public function searchBar(){
        $form = $this->createFormBuilder(null)
            ->add('query', TextType::class)
            ->add('search', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-primary'
            ]
        ])
        ->getForm();

        return $this->render('homepage.html.twig', [
            'form' => $form -> createView()
        ]);
    }
}
