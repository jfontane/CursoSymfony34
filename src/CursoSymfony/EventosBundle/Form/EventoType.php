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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class EventoType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('titulo', TextType::class)
                ->add('descripcion', TextareaType::class)
                ->add('fecha', DateType::class, array('input' => 'datetime',
                    'format' => 'dd/MM/yy',
                    'widget' => 'choice',
                    'required' => true
                ))
                ->add('hora', TimeType::class, array(
                    'widget' => 'choice',
                    'required' => true
                ))
                ->add('duracion')
                ->add('idioma', ChoiceType::class, array(
                    'choices' => array('es' => 'es', 'en' => 'en')
                ))
                ->add('disertante', EntityType::class, array(
                    'class' => 'CursoSymfony\\EventosBundle\\Entity\\Disertante',
                    'query_builder' => function ($repositorio) {
                        return $repositorio->createQueryBuilder('d')->orderBy('d.nombre', 'ASC');
                    },
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        // CONFIGURAR EL DATA_CLASS CORRECTO
        $resolver->setDefaults(array('data_class' => 'CursoSymfony\EventosBundle\Entity\Evento'));
    }

    public function getName() {
        return 'evento';
    }

}
