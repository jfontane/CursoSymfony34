<?php

namespace CursoSymfony\EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class EventoController extends Controller {

    public function eventosAction() {
        $em = $this->getDoctrine()->getManager();
        $eventos = $em->getRepository('CursoSymfonyEventosBundle:Evento')->findEventosAlfabeticamente();
        return $this->render('@CursoSymfonyEventos/Evento/eventos.html.twig', array(
                    'eventos' => $eventos
        ));
    }

}
