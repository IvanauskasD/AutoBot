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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
class FinishForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('defectDescription', TextareaType::class, [
                'label' => 'Defektų aprašymas'
            ])
            ->add('workComments', TextareaType::class, [
                'label' => 'Komentarai'
            ])
            ->add('diagnosticResults', TextareaType::class, [
                'label' => 'Diagnostikos rezultatai'
            ])
            ->add('jobTime', TextType::class, [
                'label' => 'Darbo laikas'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Išsaugoti'
            ])
        ;
        ;
    }
}