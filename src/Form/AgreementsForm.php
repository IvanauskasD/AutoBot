<?php
namespace App\Form;

use App\Entity\Employee;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class AgreementsForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Customer First Name'
            ])
            ->add('lastname',TextType::class, [
                'label' => 'Customer Last Name'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Customer Email'
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'Customer Phone Number'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Company Email'
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'Company Phone Number'
            ])
        ;
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Employee::class,
        ));
    }
}