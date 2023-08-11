<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\PhoneOperator;
use App\Exception\PhoneOperatorNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PhoneOperator>
 *
 * @method PhoneOperator|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhoneOperator|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhoneOperator[]    findAll()
 * @method PhoneOperator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhoneOperatorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhoneOperator::class);
    }

    //    /**
    //     * @return PhoneOperator[] Returns an array of PhoneOperator objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?PhoneOperator
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function getByCode(string $code): PhoneOperator
    {
        $operator = $this->findOneby(["code" => $code]);
        if (null === $operator) {
            throw new PhoneOperatorNotFoundException();
        }
        return $operator;
    }
}
