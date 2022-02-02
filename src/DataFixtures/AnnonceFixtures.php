<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use App\Entity\CommentThread;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnnonceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $annonces = new Annonce();
            $annonces->setAnnonceId($i);
            $annonces->setTitre('annonces-'. $i);
            $annonces->setPrix('11'.$i);
            $annonces->setImageUrl('image '.$i);
            $annonces->setPublicationDate(('UTC'));
            $annonces->setDescription("description de l'annonce". $i);
            $annonces->setEtiquette("etiquette".$i);
            $comment_thread = new CommentThread();
            $comment_thread->setComment("taille de l'annonce".$i);
            $comment_thread->setAnswers(["30".$i, "merci".$i]);
            $annonces->setCommentThreads([$comment_thread]);
        }
        $manager->flush();
    }
}