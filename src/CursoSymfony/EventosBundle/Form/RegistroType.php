<?php

namespace CursoSymfony\EventosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistroType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre', TextType::class);
        $builder->add('apellidos', TextType::class);
        $builder->add('dni', TextType::class, array('label' => 'DNI'));
        $builder->add('telefono', TextType::class);
        $builder->add('direccion', TextType::class);
        $builder->add('email', EmailType::class);
        $builder->add('password', PasswordType::class, array('type' => 'password'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array('data_class' => 'CursoSymfony\EventosBundle\Entity\Usuario',));
    }

    public function getName() {
        return 'registro';
    }

}
