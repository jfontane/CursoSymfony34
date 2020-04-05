<?php

namespace CursoSymfony\EventosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CursoSymfony\EventosBundle\Entity;
 *
 * @ORM\Table(name="disertante")
 * @ORM\Entity
 */
class Disertante {

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
     * @ORM\Column(type="text")
     */
    protected $biografia;

    /**
     * @ORM\Column(type="string")
     */
    protected $telefono;

    /**
     * @ORM\Column(type="string")
     */
    protected $url;

    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $twitter;

    /**
     * @ORM\Column(type="string")
     */
    protected $linkedin;

    /**
     * @ORM\OneToMany(targetEntity="Evento", mappedBy="disertante")
     */
    protected $eventos;

}
