<?php

namespace App\DataFixtures;

use App\Entity\Sale;
use App\Entity\CommentThread;
use App\Repository\SaleRepository;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SaleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $comment_thread1 = new CommentThread();
            $comment_thread1->setComment("taille de l'annonce".$i)
                ->setAnswers(["30".$i, "merci".$i])
                ->setThreadId($i);

            $comment_thread2 = new CommentThread();
            $comment_thread2->setComment("taille de l'annonce".$i)
                ->setAnswers(["30".$i, "merci".$i])
                ->setThreadId($i);
            $manager->persist($comment_thread1);
            $manager->persist($comment_thread2);

            $annonces = new Sale();
            $annonces->setTitle('annonces-'. $i)
                ->setPrice('11'.$i)
                ->setImageUrl('image'.$i)
                ->setPublishDate('0'.$i.'/01/2022-16:50')
                ->setDescription("description de l'annonce". $i)
                ->setTag("etiquette".$i)
                ->setCommentThreadId($i);

            $manager->persist($annonces);
        }
        $manager->flush();
    }
}