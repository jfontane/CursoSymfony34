<?php

namespace CursoSymfony\EventosBundle\Repository;

use Doctrine\ORM\EntityRepository;

class DisertanteRepository extends EntityRepository {

    public function findDisertantesAlfabeticamenteConEventos() {
        return $this->getEntityManager()->createQuery(
                        'SELECT d,e 
                         FROM CursoSymfonyEventosBundle:Disertante d
                         JOIN d.eventos e
                         ORDER BY d.nombre ASC')->getResult();
    }
    
    public function findDisertantesAlfabeticamente() {
        return $this->getEntityManager()->createQuery(
                        'SELECT d 
                         FROM CursoSymfonyEventosBundle:Disertante d
                         ORDER BY d.nombre ASC')->getResult();
    }
    
    public function findDisertantesConEventosPorId($id) {
        return $this->getEntityManager()->createQuery(
                        'SELECT d,e 
                         FROM CursoSymfonyEventosBundle:Disertante d
                         JOIN d.eventos e
                         WHERE d.id = :id
                         ORDER BY d.nombre ASC')->setParameter('id',$id)->getOneOrNullResult();
    }

}
