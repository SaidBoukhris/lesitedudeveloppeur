<?php

namespace App\DataFixtures;

use App\Entity\Youtube;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($k = 1 ; $k <= 100 ; $k++) {
            $yt = new Youtube();
            $yt         -> setUrl("https://www.youtube.com/watch?v=lTRiuFIWV54")
                        -> setName("v".$k);
            $manager    -> persist($yt);
        }
        $manager->flush();
    }
}
