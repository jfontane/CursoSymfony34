<?php

namespace CursoSymfony\EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CursoSymfony\EventosBundle\Controller\AbstractBaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class EventoController extends Controller {

    public function eventosAction() {
        $em = $this->getDoctrine()->getManager();
        $eventos = $em->getRepository('CursoSymfonyEventosBundle:Evento')->findEventosAlfabeticamente();
        return $this->render('@CursoSymfonyEventos/Evento/eventos.html.twig', array(
                    'eventos' => $eventos
        ));
    }

    public function eventoAction(Request $peticion) {
        //$peticion = $this->getRequest();
        $slug = $peticion->get('slug');
        $em = $this->getDoctrine()->getManager();
        /* $evento = $em->getRepository('CursoSymfonyEventosBundle:Evento')->findOneBy(array('slug' =>
          $slug)); */
        $evento = $em->getRepository('CursoSymfonyEventosBundle:Evento')->findEventoConDisertantesPorSlug($slug);
        //var_dump($evento[0]->getDisertante()->getApellidos());die;
        //$this->get('session')->getFlashBag()->add('info','Has leído sobre el evento '.$evento[0]->getTitulo().' a las '.date('H:i:s').'.');
        AbstractBaseController::addInfoMessage('Has leído sobre el evento ' . $evento->getTitulo() . ' a las ' . date('H:i:s') . '.');
        if (!$evento) {
            throw $this->createNotFoundException("No existe el evento solicitado.");
        }
        return $this->render('@CursoSymfonyEventos/Evento/evento.html.twig', array(
                    'evento' => $evento
        ));
    }

}
