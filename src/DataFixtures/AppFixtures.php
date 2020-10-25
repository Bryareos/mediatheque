<?php

namespace App\DataFixtures;

use App\Entity\AlbumSpec;
use App\Entity\BookSpec;
use App\Entity\Media;
use App\Entity\MovieSpec;
use App\Entity\SerieSpec;
use App\Entity\Type;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        //Génération d'un User Admin
        $admin = new User();
        $admin->setFirstname('David');
        $admin->setLastname('Ottaviani');
        $admin->setAddress($faker->streetAddress);
        $admin->setEmail('davidado13@gmail.com');
        $admin->setAge(24);
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setCustomerCode($faker->ean8);
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'Gprmpy13'
        ));
        $manager->persist($admin);

        //Génération de 4 type
        $fantasy = new Type();
        $fantasy->setName('Fantasy');
        $sf = new Type();
        $sf->setName('Science-fiction');
        $rock = new Type();
        $rock->setName('Rock');
        $horreur = new Type();
        $horreur->setName('Horreur');

        $manager->persist($fantasy);
        $manager->persist($sf);
        $manager->persist($rock);
        $manager->persist($horreur);

        //Génération de 15 livres
        for ($i = 0; $i < 15; $i++) {
            $book = new Media();
            $spec = new BookSpec();
            $spec->setPageNumber($faker->numberBetween(30, 300));
            $spec->setPublisher($faker->name);
            $spec->addType($fantasy);
            $book->setAuthor($faker->name);
            $book->setDescription($faker->realText());
            $book->setName($faker->domainWord);
            $book->setImgSrc('https://placeimg.com/640/480/any');
            $book->setQuantity($faker->numberBetween(0, 10));
            $book->setBookSpec($spec);
            $manager->persist($book);
        }

        //Génération de 15 films
        for ($j = 0; $j < 15; $j++)
        {
            $movie = new Media();
            $spec = new MovieSpec();
            $spec->setDuration($faker->numberBetween(90, 180));
            $spec->addType($sf);
            $movie->setName($faker->domainWord);
            $movie->setAuthor($faker->name);
            $movie->setDescription($faker->realText());
            $movie->setImgSrc('https://placeimg.com/640/480/any');
            $movie->setQuantity($faker->numberBetween(0,10));
            $movie->setMovieSpec($spec);
            $manager->persist($movie);
        }
        //Génération de 15 albums
        for ($k = 0; $k < 15; $k++)
        {
            $album = new Media();
            $spec = new AlbumSpec();
            $spec->setSongNumber($faker->numberBetween(10, 16));
            $spec->setDuration($faker->numberBetween(60, 120));
            $spec->addType($rock);
            $album->setName($faker->domainWord);
            $album->setAlbumSpec($spec);
            $album->setAuthor($faker->name);
            $album->setImgSrc('https://placeimg.com/640/480/any');
            $album->setQuantity($faker->numberBetween(0, 10));
            $album->setDescription($faker->realText());
            $manager->persist($album);
        }
        //Génération de 15 séries
        for ($l = 0; $l < 15; $l++)
        {
            $serie = new Media();
            $spec = new SerieSpec();
            $spec->setEpisodeNumber($faker->numberBetween(6, 30000));
            $spec->setSeason($faker->numberBetween(1, 40));
            $spec->addType($horreur);
            $serie->setName($faker->domainWord);
            $serie->setDescription($faker->realText());
            $serie->setQuantity($faker->numberBetween(0, 10));
            $serie->setImgSrc('https://placeimg.com/640/480/any');
            $serie->setAuthor($faker->name);
            $serie->setSerieSpec($spec);
            $manager->persist($serie);
        }

        $manager->flush();
    }
}
