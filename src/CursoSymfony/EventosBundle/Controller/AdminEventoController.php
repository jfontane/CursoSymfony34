<?php

namespace CursoSymfony\EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use CursoSymfony\EventosBundle\Controller\AbstractAdminBaseController;

//use CursoSymfony\EventosBundle\Entity\Usuario;

class AdminEventoController extends Controller {

    public function listarAction() {
        $em = $this->getDoctrine()->getManager();
        return $this->render('@CursoSymfonyEventos/AdminEvento/listar.html.twig', array('eventos' => $em->getRepository('CursoSymfonyEventosBundle:Evento')->findEventosAlfabeticamente()
        ));
    }

    public function inscriptosAction($id) {
        $em = $this->getDoctrine()->getManager();
        //$d = $em->getRepository('CursoSymfonyEventosBundle:Disertante')->find($id);
        $e = $em->getRepository('CursoSymfonyEventosBundle:Evento')->findEventoConUsuariosPorId($id);
        //var_dump($d->getNombre());die;
        return $this->render('@CursoSymfonyEventos/AdminEvento/inscriptos.html.twig', array(
                    'evento' => $e[0]
        ));
    }

    public function borrarAction($id) {
        $em = $this->getDoctrine()->getManager();
        $evento = $em->getRepository('CursoSymfonyEventosBundle:Evento')->find($id);
        if (null == $evento) {
            throw $this->createNotFoundException('No existe el evento solicitado.');
        }
        $em->remove($evento);
        $em->flush();
        AbstractAdminBaseController::addWarnMessage('El evento ' . $evento->getTitulo() . ' se ha borrado correctamente.');
        return $this->redirect($this->generateUrl('admin_evento_listar'));
    }

}
