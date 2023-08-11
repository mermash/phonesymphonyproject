<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends BaseFixture
{
    CONST USER_MIN_KEY = 1;
    const USER_COUNT = 2000;

    protected function loadData(ObjectManager $manager)
    {
        for($i = self::USER_MIN_KEY; $i <= self::USER_COUNT; $i++) {
            $user = new User();
            $user->setName($this->faker->userName . $i);
            $user->setBirthDate($this->faker->dateTimeBetween('-120 years', '-7 years'));
            $manager->persist($user);
            $this->addReference(User::class . '_' . $i, $user);
        }
        $manager->flush();

    }
}
