<?php
namespace App\Form;

use App\Entity\Car;
use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $this->serviceChoices = $options['service_choices'];
        $builder
            ->add('carId', TextType::class, array(
                'label' => 'carId'
            ))
            ->add('maker', ChoiceType::class, array(
                'choices' => array(
                    'BMW' => 'BMW',
                    'Ford' => 'Ford'),
                    'label' => 'maker'
            ))
            ->add('model', TextType::class, array(
                'label' => 'Model'
            ))
            ->add('carYear', ChoiceType::class, array(
                'choices' => array(
                    '2000' => '2000',
                    '2011' => '2011'),
                'label' => 'carYear'
            ))
            ->add('transmission', ChoiceType::class, array(
                'choices' => array(
                    'Manual' => 'Manual',
                    'Auto' => 'Auto'),
                'label' => 'transmission'
            ))
            ->add('engineVolume', TextType::class, array(
                'label' => 'engineVolume'
            ))
            ->add('city', TextType::class, array(
                'label' => 'city'
            ))
            ->add('comment', TextType::class, array(
                'label' => 'comment'
            ))
            ->add('serviceName', ChoiceType::class, array(
                'label' => 'serviceName',
                'choices' =>$this->serviceChoices,
                'choice_label' => function($service, $key, $index) {
                    /** @var Service $service */
                    return $service->getServiceName();
                },
                'group_by' => function($service, $key, $index) {
                    if ($service->getServiceCategory() == 'Varikliai')  return 'Varikliai';
                    if ($service->getServiceCategory() == 'Salonas')  return 'Salonas';
                    if ($service->getServiceCategory() == 'Padangos')  return 'Padangos';
                },
                
            ))
            
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Car::class,
            'service_choices' => null
        ));
    }
}