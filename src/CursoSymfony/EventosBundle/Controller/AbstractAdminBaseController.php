<?php

namespace CursoSymfony\EventosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractBaseController
 *
 * @author Alumno
 */
class AbstractAdminBaseController extends Controller {

    public function addInfoMessage($msg) {
        return $this->get('session')->getFlashBag()->add('info', $msg);
    }

    public function addWarnMessage($msg) {
        return $this->get('session')->getFlashBag()->add('warn', $msg);
    }

    public function addErrorMessage($msg) {
        return $this->get('session')->getFlashBag()->add('error', $msg);
    }

}
