<?php

namespace App\Repository;

use App\Entity\oeuvre_EXPOSEE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @method oeuvre_EXPOSEE|null find($id, $lockMode = null, $lockVersion = null)
 * @method oeuvre_EXPOSEE|null findOneBy(array $criteria, array $orderBy = null)
 * @method oeuvre_EXPOSEE[]    findAll()
 * @method oeuvre_EXPOSEE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class oeuvre_EXPOSEERepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, oeuvre_EXPOSEE::class);
    }
        // /**
        //  * @return oeuvre_EXPOSEE[] Returns an array of oeuvre_EXPOSEE objects
        //  */

    public function getOeuvreExpo($idExpo){
        $em = $this->getEntityManager();
        $sql = $em->createQuery('SELECT p FROM App\Entity\oeuvre_EXPOSEE o INNER JOIN App\Entity\Photo p WITH o.id_photo = p.id INNER JOIN App\Entity\EXPOSITION e WITH o.id_exposition = e.id WHERE e.id = :idExpo');
        $sql->setParameter('idExpo', $idExpo);
        
        return $sql->getResult();
    }

}