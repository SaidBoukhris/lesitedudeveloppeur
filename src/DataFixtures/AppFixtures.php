<?php

namespace App\DataFixtures;

use App\Entity\Users;
use App\Entity\Article;
use App\Entity\Youtube;
use App\Entity\Categories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {   
        for($i = 1 ; $i <= 1 ; $i++) {
            $user = new Users();
            $user   -> setName("Said")
                    -> setFirstname("Boukhris")
                    -> setPseudo("Le S")
                    -> setEmail("said@gmail.com")
                    -> setPassword('$argon2id$v=19$m=65536,t=4,p=1$1pSOJqtthbU19n4gTPlAHw$FVRRRtJuhHzy7jCHLeNrVoi4X/vjWAqHQF4eC6x2BYA')
                    -> setAvatar("https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVyc29ufGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=60")
                    -> setBanner("https://images.unsplash.com/photo-1497091071254-cc9b2ba7c48a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1053&q=80");
        $manager    -> persist($user);   
        }
        for($j = 1 ; $j <= 3 ; $j++) {
            $categorie = new Categories();
            $categorie  -> setName("categorie ".$j);
            $manager    -> persist($categorie);
            for($k = 1 ; $k <= 12 ; $k++) {
                $article = new Article();
                $article -> setTitle("Titre article 0".$k)
                        -> setContent("Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni ut doloribus repudiandae pariatur quam nemo maiores obcaecati, velit corporis iste laboriosam saepe, ipsum totam voluptas facilis eos fugit in deleniti!
                            Quam voluptatum nam nisi accusamus alias nulla, amet eum ea harum quas, quidem molestias perferendis exercitationem quod, est similique. Qui ducimus nam fuga magni odit possimus quis repellat atque animi.
                            Deleniti corrupti labore dolorum, ipsa ea fugit commodi ipsum blanditiis sint quo iste soluta dolore nesciunt? Iure, quae totam possimus sint assumenda odio illo enim, incidunt quam consequatur voluptate aliquid!
                            Nobis animi suscipit error, quae illo similique nihil earum, incidunt magnam perferendis debitis, consequuntur reiciendis doloribus veniam placeat. Earum maiores quisquam itaque illum id iure dolor corrupti amet nulla. Alias!
                            Quis suscipit deleniti voluptates blanditiis possimus minima non. Porro veritatis perferendis voluptas illum similique fugit quibusdam cumque ipsum rem aspernatur aut, unde ad? Similique officiis, aut sunt iusto voluptatibus doloribus?")
                        -> setThumb("https://images.unsplash.com/photo-1523726491678-bf852e717f6a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80")
                        -> setActive(false)
                        -> setLikes(100)
                        -> setDislikes(3)
                        -> setCategories($categorie)
                        -> setUsers($user);
                $manager-> persist($article);
            }
        }
        for($l = 1 ; $l <= 100 ; $l++) {
            $yt = new Youtube();
            $yt         -> setUrl("https://www.youtube.com/watch?v=lTRiuFIWV54")
                        -> setName("v".$l);
            $manager    -> persist($yt);
        }
        $manager->flush();
    }
}
