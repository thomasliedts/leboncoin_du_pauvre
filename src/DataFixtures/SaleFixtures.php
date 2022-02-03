<?php

namespace App\DataFixtures;

use App\Entity\Sale;
use App\Entity\CommentThread;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SaleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $annonces = new Sale();
            $annonces->setTitle('annonces-'. $i);
            $annonces->setPrice('11'.$i);
            $annonces->setImageUrl('image '.$i);
            $today = date('d/m/y-h:m');
            $annonces->setPublishDate(DateTime::createFromFormat($today, '03/02/2022-16:54:00'));
            $annonces->setDescription("description de l'annonce". $i);
            $annonces->setTag("etiquette".$i);
            $comment_thread = new CommentThread();
            $comment_thread->setComment("taille de l'annonce".$i);
            $comment_thread->setAnswers(["30".$i, "merci".$i]);
            $annonces->setCommentThreads([$comment_thread]);
        }
        $manager->flush();
    }
}