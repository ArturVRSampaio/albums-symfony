<?php

namespace App\Repository;

use App\Entity\Album;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AlbumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Album::class);
    }

    public function save(Album $album)
    {
        $em = $this->getEntityManager();
        $em->beginTransaction();
        $em->persist($album);
        $em->commit();  
        $em->flush();  
    }
}