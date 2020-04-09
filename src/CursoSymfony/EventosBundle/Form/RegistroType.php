<?php

namespace CursoSymfony\EventosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistroType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre', TextType::class)
                ->add('apellidos', TextType::class)
                ->add('email', TextType::class)
                ->add('dni', TextType::class, array('label' => 'DNI'))
                ->add('telefono', TextType::class)
                ->add('direccion', TextType::class)
                ->add('password', RepeatedType::class, array('type' => PasswordType::class,
                    'first_options' => array('label' => 'Contraseña'),
                    'second_options' => array('label' => 'Repite Contraseña')))
                ->add('Guardar', SubmitType::class);
        //->add('Guardar',SubmitType::class, array('label' => 'Nuevo Usuario'));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array('data_class' => 'CursoSymfony\EventosBundle\Entity\Usuario'));
    }

}
