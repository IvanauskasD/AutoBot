<?php
namespace App\Form;

use App\Entity\Job;
use App\Entity\AdminJob;
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


class JobAddForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('jobName', EntityType::class, array(
                    'class' => AdminJob::class,
                    'label' => 'Job Name'
            ))
            ->add('description', TextType::class, array(
                'label' => 'Aprasymas'
            ))
            ->add('cost', TextType::class, array(
                'label' => 'Kaina'
            ))
            ->add('jobTime', TextType::class, array(
                'label' => 'Darbo laikas'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Job::class
        ));
    }
}