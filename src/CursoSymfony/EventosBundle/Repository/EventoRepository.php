<?php

namespace CursoSymfony\EventosBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EventoRepository extends EntityRepository {

    public function queryEventosAlfabeticamente() {
        $em = $this->getEntityManager();
        $dql = "SELECT e FROM CursoSymfonyEventosBundle:Evento e ORDER BY e.titulo ASC";
        return $em->createQuery($dql);
    }

    public function findEventosAlfabeticamente() {
        return $this->queryEventosAlfabeticamente()->getResult();
    }

}
