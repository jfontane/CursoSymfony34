<?php

namespace CursoSymfony\EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CursoSymfony\EventosBundle\Controller\AbstractBaseController;
use CursoSymfony\EventosBundle\Form\RegistroType;
use CursoSymfony\EventosBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class UsuarioController extends Controller {

    public function registroAction(Request $request) {
        $usuario = new Usuario();
        $form = $this->createForm(RegistroType::class, $usuario);

        $form->handleRequest($request);
        if ($form->isValid()) {
            // Obtenemos el usuario
            // $usuario = $form->getData();
            // Codificamos el password
            //$password = $usuario->getPassword();

            //$password = $this->get('security.password_encoder')->encodePassword($usuario, $usuario->getPassword()); // COMENTAR
            //dump($password);
            //die;
//$usuario->setPassword($password);
            // Guardamos el objeto en la base de datos
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();
            // Mensaje para notificar al usuario que todo ha salido bien
            AbstractBaseController::addInfoMessage('Gracias por registrarse, su cuenta ya ha ' . 'sido activada.');
            return $this->redirect($this->generateUrl('portada'));
        }
        return $this->render('@CursoSymfonyEventos/Usuario/registro.html.twig', array('form' => $form->createView(),
        ));
    }

}
