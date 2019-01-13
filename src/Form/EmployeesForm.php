<?php
namespace App\Form;

use App\Entity\Employee;
use App\Repository\EmployeeRepository;
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
use Symfony\Bridge\Doctrine\RegistryInterface;
class EmployeesForm extends AbstractType
{
    private $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        // ...
        $resolver->setRequired('ids');
        // type validation - User instance or int, you can also pick just one.
        $resolver->setAllowedTypes('ids', array(Employee::class, 'int'));
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $id = $options['ids'];
        $builder
            ->add('id', EntityType::class, array(
                'class'        => Employee::class, //This existed usually in (AppBundle\Entity\Person)
                'query_builder' => function (EmployeeRepository $er) use($id) {
                    return $er->createQueryBuilder('c')
                        ->addSelect('r') // to make Doctrine actually use the join
                        ->leftJoin('c.orders', 'r')
                        ->addSelect('u') // to make Doctrine actually use the join
                        ->leftJoin('r.company', 'u')
                        ->andwhere('c.company = :id')->setParameter('id', $id);
                }
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Priskirti darbuotoją'))
        ;

    }

}