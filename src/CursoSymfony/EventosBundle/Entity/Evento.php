<?php

namespace CursoSymfony\EventosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CursoSymfony\EventosBundle\Common\Util;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CursoSymfony\EventosBundle\Entity
 * 
 * @ORM\Table(name="evento")
 * @ORM\Entity(repositoryClass="CursoSymfony\EventosBundle\Repository\EventoRepository")
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
     * @Assert\NotBlank()
     * @Assert\Length(max="255")
     */
    protected $titulo;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $slug;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     * @Assert\Length(min="50")
     */
    protected $descripcion;

    /**
     * @ORM\Column(type="date")
     * @Assert\Date()
     */
    protected $fecha;

    /**
     * @ORM\Column(type="time")
     * @Assert\Time() 
     */
    protected $hora;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min=0,max=300)
     */
    protected $duracion;

    /**
     * @ORM\Column(type="string")
     * @Assert\Choice({"es","en"})
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

    /**
     * Constructor
     */
    public function __construct() {
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Evento
     */
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
        $this->setSlug(Util::slugify($this->titulo));
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo() {
        return $this->titulo;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Evento
     */
    public function setSlug($slug) {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Evento
     */
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Evento
     */
    public function setFecha($fecha) {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha() {
        return $this->fecha;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     *
     * @return Evento
     */
    public function setHora($hora) {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime
     */
    public function getHora() {
        return $this->hora;
    }

    /**
     * Set duracion
     *
     * @param integer $duracion
     *
     * @return Evento
     */
    public function setDuracion($duracion) {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get duracion
     *
     * @return integer
     */
    public function getDuracion() {
        return $this->duracion;
    }

    /**
     * Set idioma
     *
     * @param string $idioma
     *
     * @return Evento
     */
    public function setIdioma($idioma) {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get idioma
     *
     * @return string
     */
    public function getIdioma() {
        return $this->idioma;
    }

    /**
     * Set disertante
     *
     * @param \CursoSymfony\EventosBundle\Entity\Disertante $disertante
     *
     * @return Evento
     */
    public function setDisertante(\CursoSymfony\EventosBundle\Entity\Disertante $disertante = null) {
        $this->disertante = $disertante;

        return $this;
    }

    /**
     * Get disertante
     *
     * @return \CursoSymfony\EventosBundle\Entity\Disertante
     */
    public function getDisertante() {
        return $this->disertante;
    }

    /**
     * Add usuario
     *
     * @param \CursoSymfony\EventosBundle\Entity\Usuario $usuario
     *
     * @return Evento
     */
    public function addUsuario(\CursoSymfony\EventosBundle\Entity\Usuario $usuario) {
        $this->usuarios[] = $usuario;

        return $this;
    }

    /**
     * Remove usuario
     *
     * @param \CursoSymfony\EventosBundle\Entity\Usuario $usuario
     */
    public function removeUsuario(\CursoSymfony\EventosBundle\Entity\Usuario $usuario) {
        $this->usuarios->removeElement($usuario);
    }

    /**
     * Get usuarios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuarios() {
        return $this->usuarios;
    }

    /**
     * Get horaFinalizacion
     *
     * @return time $horafinalizacion
     */
    public function getHoraFinalizacion() {
        return $this->hora->add(new \DateInterval('PT' . $this->duracion . 'M'));
    }

}
