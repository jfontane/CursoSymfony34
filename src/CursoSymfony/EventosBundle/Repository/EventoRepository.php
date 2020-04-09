<?php

namespace CursoSymfony\EventosBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class EventoRepository extends EntityRepository {

    public function queryEventosAlfabeticamente() {
        $em = $this->getEntityManager();
        $dql = "SELECT e, d
                FROM CursoSymfonyEventosBundle:Evento e 
                JOIN e.disertante d
                ORDER BY e.titulo ASC";
        return $em->createQuery($dql);
    }
    
    
    public function findEventosAlfabeticamente() {
        return $this->queryEventosAlfabeticamente()->getResult();
    }
    
    public function findEventosAlfabeticamenteConUsuariosOptimizada() {
        $em = $this->getEntityManager();
        $dql = "SELECT e, d, u
                FROM CursoSymfonyEventosBundle:Evento e 
                JOIN e.disertante d
                JOIN e.usuarios u
                ORDER BY e.titulo ASC";
        return $em->createQuery($dql)->getResult();
    }
    
    public function findEventos() {
        $em = $this->getEntityManager();
        $dql = "SELECT e
                FROM CursoSymfonyEventosBundle:Evento e 
                ORDER BY e.titulo ASC";
        return $em->createQuery($dql)->getResult();
    }
    
    
    public function findEventoConDisertantesPorSlug($slug) {
        $em = $this->getEntityManager();
        $dql = "SELECT e, d
                FROM CursoSymfonyEventosBundle:Evento e 
                JOIN e.disertante d
                WHERE e.slug = :slug
                ORDER BY e.titulo ASC";
        return $em->createQuery($dql)->setParameter('slug',$slug)->getOneOrNullResult();
    }
    
    public function findEventoConUsuariosPorId($id) {
        $em = $this->getEntityManager();
        $dql = "SELECT e, u
                FROM CursoSymfonyEventosBundle:Evento e 
                JOIN e.usuarios u
                WHERE e.id = :id
                ORDER BY e.titulo ASC";
        return $em->createQuery($dql)->setParameter('id',$id)->getOneOrNullResult();
    }

    
}
