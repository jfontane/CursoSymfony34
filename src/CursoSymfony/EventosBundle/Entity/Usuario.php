<?php

namespace CursoSymfony\EventosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CursoSymfony\EventosBundle\Entity\Evento;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CursoSymfony\EventosBundle\Entity;
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity()
 * @UniqueEntity(fields="email")
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
     * @Assert\NotBlank()
     * @Assert\Length(min="3", max="32")
     */
    protected $apellidos;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $dni;

    /**
     * @ORM\Column(type="string")
     */
    protected $direccion;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $telefono;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(min="3", max="32")
     */
    protected $password;

    /**
     * @ORM\Column(type="integer")
     */
    protected $notificaciones;

    /**
     * @ORM\ManyToMany(targetEntity="Evento", mappedBy="usuarios")
     */
    protected $eventos;

    /**
     * Constructor
     */
    public function __construct() {
        $this->eventos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Usuario
     */
    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos() {
        return $this->apellidos;
    }

    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return Usuario
     */
    public function setDni($dni) {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni() {
        return $this->dni;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Usuario
     */
    public function setDireccion($direccion) {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion() {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Usuario
     */
    public function setTelefono($telefono) {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono() {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Usuario
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Add evento
     *
     * @param \CursoSymfony\EventosBundle\Entity\Evento $evento
     *
     * @return Usuario
     */
    public function addEvento(\CursoSymfony\EventosBundle\Entity\Evento $evento) {
        $this->eventos[] = $evento;

        return $this;
    }

    /**
     * Remove evento
     *
     * @param \CursoSymfony\EventosBundle\Entity\Evento $evento
     */
    public function removeEvento(\CursoSymfony\EventosBundle\Entity\Evento $evento) {
        $this->eventos->removeElement($evento);
    }

    /**
     * Get eventos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEventos() {
        return $this->eventos;
    }

}
