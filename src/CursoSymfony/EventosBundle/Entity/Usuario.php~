<?php

namespace CursoSymfony\EventosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CursoSymfony\EventosBundle\Entity\Evento;

/**
 * CursoSymfony\EventosBundle\Entity;
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity()
 */
class Usuario {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string")
     */
    protected $apellidos;

    /**
     * @ORM\Column(type="string")
     */
    protected $dni;

    /**
     * @ORM\Column(type="string")
     */
    protected $direccion;

    /**
     * @ORM\Column(type="string")
     */
    protected $telefono;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\ManyToMany(targetEntity="Evento", mappedBy="usuarios")
     */
    protected $eventos;

}
