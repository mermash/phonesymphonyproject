<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\PhoneNumber;
use App\Entity\PhoneOperator;
use App\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PhoneNumberFixtures extends BaseFixture implements DependentFixtureInterface
{
    const MIN_PHONE_PER_USER = 1;
    const MAX_PHONE_PER_USER = 3;

    protected function loadData(ObjectManager $manager)
    {
//        for ($i = UserFixtures::USER_MIN_KEY; $i <= UserFixtures::USER_COUNT; $i++) {
//            $phoneNumber = new PhoneNumber();
//            $phoneNumber->setPhoneNumber('333');
//            $num = $this->faker->numberBetween(UserFixtures::USER_MIN_KEY, UserFixtures::USER_COUNT);
//            $user = $this->getReference(User::class . '_' . $num);
//            $phoneNumber->setPhoneUser($user);
//
//            $operatorCode = $this->faker->randomElement(PhoneOperatorFixtures::$phoneOperators);
//            $operator = $this->getReference(PhoneOperator::class . '_' . $operatorCode);
//            $phoneNumber->setOperator($operator);
//
//            $manager->persist($phoneNumber);
//
//            $this->addReference(PhoneNumber::class . '_' . $i, $phoneNumber);
//        }
//
//        $manager->flush();



        for ($i = 1; $i <= UserFixtures::USER_COUNT; $i++) {
            $user = $this->getReference(User::class . '_' . $i);
            $num = $this->faker->numberBetween(self::MIN_PHONE_PER_USER, self::MAX_PHONE_PER_USER);
            for($j = self::MIN_PHONE_PER_USER; $j <= $num; $j++) {
                $phoneNumber = new PhoneNumber();
                $phoneNumber->setPhoneNumber($this->faker->numerify('#######'));
                $phoneNumber->setPhoneUser($user);
                $phoneNumber->setBalance($this->faker->randomFloat(null, -50, 150));

                $operatorCode = $this->faker->randomElement(PhoneOperatorFixtures::$phoneOperators);
                $operator = $this->getReference(PhoneOperator::class . '_' . $operatorCode);
                $phoneNumber->setOperator($operator);

                $manager->persist($phoneNumber);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            PhoneOperatorFixtures::class,
        ];
    }
}
