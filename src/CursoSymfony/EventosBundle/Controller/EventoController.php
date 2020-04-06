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

    public function eventoAction($slug) {
        $em = $this->getDoctrine()->getManager();
        /*$evento = $em->getRepository('CursoSymfonyEventosBundle:Evento')->findOneBy(array('slug' =>
            $slug));*/
        $evento = $em->getRepository('CursoSymfonyEventosBundle:Evento')->findEventoConDisertantesPorSlug($slug);
         //var_dump($evento[0]->getDisertante()->getApellidos());die;
        if (!$evento) {
            throw $this->createNotFoundException("No existe el evento solicitado.");
        }
        return $this->render('@CursoSymfonyEventos/Evento/evento.html.twig', array(
                    'evento' => $evento[0]
        ));
    }

}
