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
        //return new Response("hola");
    }

    

}
