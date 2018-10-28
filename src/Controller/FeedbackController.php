<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Events;

class FeedbackController extends Controller
{

    /**
     * @Route("/feedback", name="feedback")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \LogicException
     */
    public function feedbackAction()
    {

        return $this->render('Feedback/feedback.html.twig');
    }

}
