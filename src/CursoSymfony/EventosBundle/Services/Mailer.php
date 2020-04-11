<?php

namespace CursoSymfony\EventosBundle\Services;

//use Symfony\Component\DependencyInjection\ContainerBuilder;


class Mailer {

    private $transport;

    public function __construct($transport) {
        $this->transport = 'sendmail';
    }

    // ...
}
