<?php

namespace CursoSymfony\EventosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CursoSymfony\EventosBundle\Entity
 *
 * @ORM\Table(name="evento")
 * @ORM\Entity
 */
class Evento {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $titulo;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $slug;

    /**
     * @ORM\Column(type="text")
     */
    protected $descripcion;

    /**
     * @ORM\Column(type="date")
     */
    protected $fecha;

    /**
     * @ORM\Column(type="time")
     */
    protected $hora;

    /**
     * @ORM\Column(type="integer")
     */
    protected $duracion;

    /**
     * @ORM\Column(type="string")
     */
    protected $idioma;

    /**
     * @ORM\ManyToOne(targetEntity="Disertante", inversedBy="eventos")
     * @ORM\JoinColumn(name="disertante_id", referencedColumnName="id")
     */
    protected $disertante;

    /**
     * @ORM\ManyToMany(targetEntity="Usuario", inversedBy="eventos")
     * @ORM\JoinTable(name="evento_usuario",
     * joinColumns={@ORM\JoinColumn(name="evento_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="usuario_id", referencedColumnName="id")}
     * )
     */
    protected $usuarios;

}
