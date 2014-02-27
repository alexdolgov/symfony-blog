<?php
namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('user', new UserType());
        $builder->add(
            'terms',
            'checkbox',
            array('property_path' => 'termsAccepted', 'label'  => 'Accept Terms')

        )
            ->add('save', 'submit')
            ->add('reset', 'reset');
    }

    public function getName()
    {
        return 'registration';
    }
}