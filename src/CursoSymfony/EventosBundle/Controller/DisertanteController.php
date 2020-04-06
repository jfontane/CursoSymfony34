<?php

namespace CursoSymfony\EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DisertanteController extends Controller {

    public function disertantesAction() {
        $em = $this->getDoctrine()->getManager();
        $d = $em->getRepository('CursoSymfonyEventosBundle:Disertante')->findDisertantesAlfabeticamente();
        return $this->render('@CursoSymfonyEventos/Disertante/disertantes.html.twig', array(
                    'disertantes' => $d
        ));
    }
    
    public function disertanteAction($id) {
        $em = $this->getDoctrine()->getManager();
        //$d = $em->getRepository('CursoSymfonyEventosBundle:Disertante')->find($id);
        $d = $em->getRepository('CursoSymfonyEventosBundle:Disertante')->findDisertantesConEventosPorId($id);
        //var_dump($d->getNombre());die;
        return $this->render('@CursoSymfonyEventos/Disertante/disertante.html.twig', array(
                    'disertante' => $d[0]
        ));
    }

}
