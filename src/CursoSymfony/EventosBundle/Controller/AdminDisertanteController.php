<?php

namespace CursoSymfony\EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use CursoSymfony\EventosBundle\Controller\AbstractAdminBaseController;
use CursoSymfony\EventosBundle\Entity\Disertante;
use CursoSymfony\EventosBundle\Form\DisertanteType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AdminDisertanteController extends Controller {

    public function listarAction() {
        $em = $this->getDoctrine()->getManager();
        return $this->render('@CursoSymfonyEventos/AdminDisertante/listar.html.twig', array(
                    'disertantes' => $em->getRepository('CursoSymfonyEventosBundle:Disertante')->findDisertantesAlfabeticamente()
        ));
    }

    public function disertanteAction($id) {
        $em = $this->getDoctrine()->getManager();
        $d = $em->getRepository('CursoSymfonyEventosBundle:Disertante')->findDisertantesConEventosPorId($id);
        return $this->render('@CursoSymfonyEventos/AdminDisertante/disertante.html.twig', array(
                    'disertante' => $d[0]
        ));
    }

    public function borrarAction($id) {
        $em = $this->getDoctrine()->getManager();
        $disertante = $em->getRepository('CursoSymfonyEventosBundle:Disertante')->find($id);
        if (null == $disertante) {
            throw $this->createNotFoundException('No existe el Disertante solicitado.');
        }
        $em->remove($disertante);
        $em->flush();
        AbstractAdminBaseController::addWarnMessage('El disertante ' . $disertante . ' se ha borrado correctamente.');
        return $this->redirect($this->generateUrl('admin_disertante_listar'));
    }

    public function nuevoAction(Request $request) {
        $disertante = new Disertante();
        $form = $this->createForm(DisertanteType::class, $disertante)
                ->add('Guardar', SubmitType::class);
// AGREGAR AL FORM BOTÓN DE SUBMIT CON ETIQUETA “Guardar”
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($disertante);
            $em->flush();
            AbstractAdminBaseController::addWarnMessage("El disertante '" . $disertante
                    . "' se ha creado correctamente.");
            return $this->redirect($this->generateUrl('admin_disertante_listar'));
        }
// AGREGAR CÓDIGO FALTANTE
        return $this->render('@CursoSymfonyEventos/AdminDisertante/nuevo.html.twig', array('form' => $form->createView(),
        ));
    }

    public function editarAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        if (null == $disertante = $em->find('CursoSymfonyEventosBundle:Disertante', $id)) {
            throw $this->createNotFoundException('No existe el disertante solicitado.');
        }
        $form = $this->createForm(DisertanteType::class, $disertante)
                ->add('Guardar', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //$evento->setDescripcion($this->getUtil()->autoLinkText($evento->getDescripcion()));
            $em->persist($disertante);
            $em->flush();
            AbstractAdminBaseController::addWarnMessage('El disertante "' . $disertante
                    . '" se ha modificado correctamente.');
            return $this->redirect($this->generateUrl('admin_disertante_listar'));
        }
        return $this->render('@CursoSymfonyEventos/AdminDisertante/editar.html.twig'
                        , array('form' => $form->createView(), 'disertante' => $disertante
        ));
    }

}
