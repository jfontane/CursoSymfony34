<?php

namespace CursoSymfony\EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CursoSymfony\EventosBundle\Controller\AbstractBaseController;
use CursoSymfony\EventosBundle\Entity\Usuario;
use CursoSymfony\EventosBundle\Form\RegistroType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UsuarioController extends Controller {

    public function registroAction() {
        $form = $this->createForm(new RegistroType(), new Usuario())
                ->add('enviar', Submit::class, array('label' => 'Regístrate'));
        $form->handleRequest($this->getRequest());
        if ($form->isValid()) {
// Obtenemos el usuario
            $usuario = $form->getData();
// Codificamos el password
            $password = $usuario->getPassword();
//$factory = $this->get('security.encoder_factory'); // COMENTAR
//$codificador = $factory->getEncoder($usuario); // COMENTAR
//$password = $codificador->encodePassword($password, $usuario->getSalt()); // COMENTAR
            $usuario->setPassword($password);
// Guardamos el objeto en la base de datos
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();
// Mensaje para notificar al usuario que todo ha salido bien
            $this->addInfoMessage('Gracias por registrarse, su cuenta ya ha ' . 'sido activada.');
            return $this->redirect($this->generateUrl('portada'));
        }
        return $this->render('@CursoSymfonyEventos/Usuario/registro.html.twig', array('form' => $form->createView(),
        ));
    }

}
