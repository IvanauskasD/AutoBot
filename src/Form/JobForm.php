<?php
namespace App\Form;

use App\Entity\Job;
use App\Entity\Service;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('jobName', TextType::class, [
                'label' => 'Job Name'
            ])
            ->add('description', TextType::class, [
                'label' => 'Description'
            ])
            ->add('cost', TextType::class, [
                'label' => 'Cost'
            ])
            ->add('jobTime', TextType::class, [
                'label' => 'Job Time'
            ])
        ;
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Job::class
        ));
    }
}