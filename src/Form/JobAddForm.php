<?php
namespace App\Form;

use App\Entity\AdminJobDes;
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
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;

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
            ->add('save', SubmitType::class)
        ;


    }
}