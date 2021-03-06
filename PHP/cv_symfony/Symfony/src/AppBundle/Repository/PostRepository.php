<?php

namespace AppBundle\Repository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllWithCategories(){
        return $this->createQueryBuilder("p") // permet de transformer la requete par le nom des champs quel soit plus simple
        ->leftJoin("p.category", "c")
        ->addSelect("c")
        ->orderBy("p.createdAt", "DESC")
        ->getQuery()
        ->getResult();
    }
}

// findBy
