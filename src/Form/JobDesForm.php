<?php
namespace App\Form;

use App\Entity\Car;
use App\Entity\Job;
use App\Entity\Service;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobDesForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
        ->add('carId', EntityType::class, array(
            'class'        => Car::class, //This existed usually in (AppBundle\Entity\Person)
            'choice_label' => 'carId'
        ))
        ->add('jobName', EntityType::class, array(
            'class'        => Job::class, //This existed usually in (AppBundle\Entity\Person)
            'choice_label' => 'carId'
        ))
    ;

    }

}