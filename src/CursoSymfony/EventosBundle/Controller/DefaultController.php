<?php

namespace CursoSymfony\EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return new Response("holaaaa");
    }
    
    public function estaticaAction($pagina)
    {
        return $this->render('@CursoSymfonyEventos/Default/'.$pagina.'.html.twig');

    }
}
