<?php

namespace App\Form;

use App\Entity\Maker;
use App\Entity\Model;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormInterface;

// ...

class CarForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('carId', TextType::class, array(
                'label' => 'carId'))
            ->add('maker', EntityType::class, array(
                'class'       => Maker::class,
                'placeholder' => '',
            ))
            ->add('carYear', ChoiceType::class, array(
                'choices' => array(
                    '2000' => '2000',
                    '2001' => '2001',
                    '2002' => '2002',
                    '2003' => '2003',
                    '2004' => '2004',
                    '2005' => '2005',
                    '2006' => '2006',
                    '2007' => '2007',
                    '2008' => '2008',
                    '2009' => '2009',
                    '2010' => '2010',
                    '2011' => '2011',
                    '2012' => '2012',
                    '2013' => '2013',
                    '2014' => '2014',
                    '2015' => '2015',
                    '2016' => '2016',
                    '2017' => '2017',
                    '2018' => '2018'
                ),
                'label' => 'carYear'
            ))
            ->add('carBody', ChoiceType::class, array(
                'choices' => array(
                    'Hecbekas' => 'Hecbekas',
                    'Sedanas' => 'Sedanas',
                    'Universalas' => 'Universalas',
                ),
                'label' => 'carBody'
            ))
            ->add('transmission', ChoiceType::class, array(
                'choices' => array(
                    'Mechanine' => 'Hecbekas',
                    'Automatine' => 'Sedanas'
                ),
                'label' => 'transmission'
            ))
            ->add('engineVolume', TextType::class, array(
                'label' => 'engineVolume'))
        ;

        $formModifier = function (FormInterface $form, Maker $sport = null) {
            $positions = null === $sport ? array() : $sport->getModel();

            $form->add('model', EntityType::class, array(
                'class'       => Model::class,
                'placeholder' => '',
                'choices'     => $positions,
            ));
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getMaker());
            }
        );

        $builder->get('maker')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $sport = $event->getForm()->getData();
                $formModifier($event->getForm()->getParent(), $sport);
            }
        );
    }

}