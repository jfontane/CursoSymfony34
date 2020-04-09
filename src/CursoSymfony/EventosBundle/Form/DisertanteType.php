<?php

namespace CursoSymfony\EventosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;


class DisertanteType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre', TextType::class)
                ->add('apellidos', TextType::class)
                ->add('biografia', TextareaType::class)
                ->add('telefono', TextType::class)
                ->add('direccion', TextType::class)
                ->add('url', TextType::class)
                ->add('email', EmailType::class)
                ->add('twitter', TextType::class)
                ->add('linkedin', TextType::class);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        // CONFIGURAR EL DATA_CLASS CORRECTO
        $resolver->setDefaults(array('data_class' => 'CursoSymfony\EventosBundle\Entity\Disertante'));
    }

    public function getName() {
        return 'disertante';
    }

}
