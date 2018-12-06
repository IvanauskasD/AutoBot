<?php
namespace App\Form;

use App\Entity\Employee;
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
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
class EmployeesForm extends AbstractType
{
    private $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kpr\CentarZdravljaBundle\Entity\Category',
            'catID' => null,
        ));
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', EntityType::class, array(
                'class'        => Employee::class, //This existed usually in (AppBundle\Entity\Person)
                'choice_label' => 'id'
            ))
        ;

    }

}