<?php

namespace CursoSymfony\EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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

}
