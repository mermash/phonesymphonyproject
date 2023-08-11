<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\PhoneOperator;
use Doctrine\Persistence\ObjectManager;

class PhoneOperatorFixtures extends BaseFixture
{

    public static $phoneOperators = ['50', '67', '63', '68'];

    protected function loadData(ObjectManager $manager)
    {
        foreach (self::$phoneOperators as $operatorCode) {
            $operator = new PhoneOperator();
            $operator->setCode($operatorCode);

            $manager->persist($operator);

            $this->addReference(PhoneOperator::class . '_' . $operatorCode, $operator);
        }

        $manager->flush();
    }
}
