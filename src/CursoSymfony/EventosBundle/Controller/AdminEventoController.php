<?php

namespace CursoSymfony\EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use CursoSymfony\EventosBundle\Controller\AbstractAdminBaseController;
use CursoSymfony\EventosBundle\Entity\Evento;
use CursoSymfony\EventosBundle\Form\EventoType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AdminEventoController extends Controller {

    public function listarAction() {
        $em = $this->getDoctrine()->getManager();
        return $this->render('@CursoSymfonyEventos/AdminEvento/listar.html.twig', array(
                    'eventos' => $em->getRepository('CursoSymfonyEventosBundle:Evento')->findEventos()
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

    public function nuevoAction(Request $request) {
        $evento = new Evento();
        $evento->setFecha(new \DateTime('now'));
        $evento->setHora(new \DateTime('now'));
        $evento->setDuracion(2);
        $form = $this->createForm(EventoType::class, $evento)
                ->add('Guardar', SubmitType::class);
// AGREGAR AL FORM BOTÓN DE SUBMIT CON ETIQUETA “Guardar”
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $evento->setDescripcion($this->get('eventos.util')->autoLinkText($evento->getDescripcion()));
            $em = $this->getDoctrine()->getManager();
            $em->persist($evento);
            $em->flush();
            AbstractAdminBaseController::addWarnMessage("El evento '" . $evento->getTitulo()
                    . "' se ha creado correctamente.");
            return $this->redirect($this->generateUrl('admin_evento_listar'));
        }
// AGREGAR CÓDIGO FALTANTE
        return $this->render('@CursoSymfonyEventos/AdminEvento/nuevo.html.twig', array('form' => $form->createView(),
        ));
    }

    public function editarAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        if (null == $evento = $em->find('CursoSymfonyEventosBundle:Evento', $id)) {
            throw $this->createNotFoundException('No existe el evento solicitado.');
        }
        $form = $this->createForm(EventoType::class, $evento)
                ->add('Guardar', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $evento->setDescripcion($this->get('eventos.util')->autoLinkText($evento->getDescripcion()));
            $em->persist($evento);
            $em->flush();
            AbstractAdminBaseController::addWarnMessage('El evento "' . $evento->getTitulo()
                    . '" se ha modificado correctamente.');
            return $this->redirect($this->generateUrl('admin_evento_listar'));
        }
        return $this->render('@CursoSymfonyEventos/AdminEvento/editar.html.twig'
                        , array('form' => $form->createView(), 'evento' => $evento
        ));
    }

}
