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
            ->add('jobsName', EntityType::class, array(
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

        $formModifier = function (FormInterface $form, AdminJob $sport = null) {
            $positions = null === $sport ? array() : $sport->getJobsName();

            $form->add('jobsDes', EntityType::class, array(
                'class'       => AdminJobDes::class,
                'placeholder' => '',
                'choices'     => $positions,
            ));
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getJobsName());
            }
        );

        $builder->get('jobsName')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $sport = $event->getForm()->getData();
                $formModifier($event->getForm()->getParent(), $sport);
            }
        );
    }
}