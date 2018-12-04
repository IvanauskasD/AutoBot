<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class UserTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,  array $options)
    {

        $defaultData = array('message' => 'Type your message here');
        $form = $this->createFormBuilder($defaultData)
            ->add('user', ChoiceType::class, array(
                'choices' => array(
                    'Darbuotojai' => 'Darbuotojai',
                    'Klientai' => 'Klientai',
                    'Admin' => 'Admin'),
                'label' => 'user'
            ))
            ->getForm();


    }
}