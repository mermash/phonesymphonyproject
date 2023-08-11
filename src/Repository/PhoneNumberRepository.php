<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\PhoneNumber;
use App\Exception\PhoneNumberAlreadyExistsException;
use App\Exception\PhoneNumberNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PhoneNumber>
 *
 * @method PhoneNumber|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhoneNumber|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhoneNumber[]    findAll()
 * @method PhoneNumber[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhoneNumberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhoneNumber::class);
    }

    //    /**
    //     * @return PhoneNumber[] Returns an array of PhoneNumber objects
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

    //    public function findOneBySomeField($value): ?PhoneNumber
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function getUserPhoneByPhoneNumber(int $userId, string $codeCountry, string $operator, string $number): ?PhoneNumber
    {

        $phoneNumbers = $this->findBy(['phoneUser' => $userId]);
        foreach ($phoneNumbers as $phoneNumber) {
            if ($phoneNumber->getOperator()->getCode() == $operator && $phoneNumber->getPhoneNumber() == $number) {
                return $phoneNumber;
            }
        }

        return null;
    }

    public function exists(int $userId, string $codeCountry, string $operator, string $number): bool
    {
        return null !== $this->getUserPhoneByPhoneNumber($userId, $codeCountry, $operator, $number);
    }
}
