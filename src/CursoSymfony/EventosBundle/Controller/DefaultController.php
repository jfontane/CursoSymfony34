<?php

namespace CursoSymfony\EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use CursoSymfony\EventosBundle\Controller\AbstractBaseController;


class DefaultController extends Controller {

    public function indexAction() {
        //return new Response("holaaaa");
    }

    public function estaticaAction($pagina) {
        return $this->render('@CursoSymfonyEventos/Default/' . $pagina . '.html.twig');
    }

    public function portadaAction() {
        $em = $this->getDoctrine()->getManager();
        $eventos = $em->getRepository('CursoSymfonyEventosBundle:Evento')->findAll();
        $total = count($eventos);
        $n = ($total >= 8) ? 8 : ($total < 8 && $total > 0) ? $total : 0;
        $eventosCol = $eventosCol1 = $eventosCol2 = array();
        for ($i = 0; $i < $n; $i++) {
            $evento = $eventos[\rand(0, $total - 1)];
            while (in_array($evento, $eventosCol)) {
                $evento = $eventos[\rand(0, $total - 1)];
            }
            $eventosCol[] = $evento;
        }
        return $this->render('@CursoSymfonyEventos/Default/portada.html.twig', array(
                    'eventosCol1' => array_slice($eventosCol, 0, 4),
                    'eventosCol2' => array_slice($eventosCol, 4, 4)
        ));
    }

    public function consultaAction(Request $request) {
        $defaultData = array('consulta' => 'Escriba aquí su consulta ...');
        $form = $this->createFormBuilder($defaultData)
                ->add('nombre', TextType::class, array(
                    'constraints' => new Length(array('min' => 3)),
                ))
                ->add('email', EmailType::class)
                ->add('consulta', TextareaType::class)
                ->add('Enviar', SubmitType::class)
                ->getForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            // Se obtiene un arreglo con claves "nombre", "email" y "consulta"
            $data = $form->getData();
            // En este punto del código se podría hacer algo con esta 
            // información, como enviar un correo a los responsables del 
            // evento o guardar la consulta en la base de datos o cualquier
            // otra cosa.
            AbstractBaseController::addInfoMessage('¡Gracias por su consulta! en breve nos podremos en contacto usted.');
            return $this->redirect($this->generateUrl('portada'));
        }
        return $this->render('@CursoSymfonyEventos/Default/consulta.html.twig'
                        , array('form' => $form->createView(),
        ));
    }

}
