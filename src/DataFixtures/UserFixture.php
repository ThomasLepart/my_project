<?php

namespace App\DataFixtures;

use App\entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;




class UserFixture extends Fixture {
    public function load(ObjectManager $manager) {
      for($i=0; $i < 20; $i++) {
        $user = new User();
        $user->setUsername('user' .$i);
        $user->setEmail('user' .$i. '@mail.com');
        $user->setFirstname('user' .$i);
        $user->setLastname('Fake');
        $user->setPassword(password_hash('user' .$i, PASSWORD_BCRYPT));
        $user->SetBirthdate(
                \DateTime::createFromFormat('Y/m/d h:i:s', (2000 - $i).'/01/01 00:00:00')
                );
        // on demande au manager d'enrengistrer l'utilisateur en bas de données
        $manager->persist($user);
        
    }
      $manager->flush(); // les insert INTO ne sont efféctués qu'a ce moment là
    }
    
}


