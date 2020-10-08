<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201008075640 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE album_spec (id INT AUTO_INCREMENT NOT NULL, song_number INT NOT NULL, duration INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE album_spec_type (album_spec_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_AE6EBCFAFF58F9E9 (album_spec_id), INDEX IDX_AE6EBCFAC54C8C93 (type_id), PRIMARY KEY(album_spec_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_spec (id INT AUTO_INCREMENT NOT NULL, publisher VARCHAR(255) NOT NULL, page_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book_spec_type (book_spec_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_D1EEA2F139AF8C6D (book_spec_id), INDEX IDX_D1EEA2F1C54C8C93 (type_id), PRIMARY KEY(book_spec_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, INDEX IDX_E00CEDDEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE booking_media (id INT AUTO_INCREMENT NOT NULL, media_id_id INT NOT NULL, booking_id_id INT NOT NULL, start_at DATETIME NOT NULL, end_at DATETIME NOT NULL, INDEX IDX_FB505CB9605D5AE6 (media_id_id), INDEX IDX_FB505CB9EE3863E2 (booking_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, movie_spec_id INT DEFAULT NULL, serie_spec_id INT DEFAULT NULL, book_spec_id INT DEFAULT NULL, album_spec_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, img_src VARCHAR(255) NOT NULL, quantity INT NOT NULL, UNIQUE INDEX UNIQ_6A2CA10C8A19E6D5 (movie_spec_id), UNIQUE INDEX UNIQ_6A2CA10C9E16D75C (serie_spec_id), UNIQUE INDEX UNIQ_6A2CA10C39AF8C6D (book_spec_id), UNIQUE INDEX UNIQ_6A2CA10CFF58F9E9 (album_spec_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_spec (id INT AUTO_INCREMENT NOT NULL, duration INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_spec_type (movie_spec_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_5095BDB18A19E6D5 (movie_spec_id), INDEX IDX_5095BDB1C54C8C93 (type_id), PRIMARY KEY(movie_spec_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie_spec (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, season INT NOT NULL, episode_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie_spec_type (serie_spec_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_EB0A8A869E16D75C (serie_spec_id), INDEX IDX_EB0A8A86C54C8C93 (type_id), PRIMARY KEY(serie_spec_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, age INT NOT NULL, customer_code INT NOT NULL, address VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE album_spec_type ADD CONSTRAINT FK_AE6EBCFAFF58F9E9 FOREIGN KEY (album_spec_id) REFERENCES album_spec (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE album_spec_type ADD CONSTRAINT FK_AE6EBCFAC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_spec_type ADD CONSTRAINT FK_D1EEA2F139AF8C6D FOREIGN KEY (book_spec_id) REFERENCES book_spec (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_spec_type ADD CONSTRAINT FK_D1EEA2F1C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE booking_media ADD CONSTRAINT FK_FB505CB9605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE booking_media ADD CONSTRAINT FK_FB505CB9EE3863E2 FOREIGN KEY (booking_id_id) REFERENCES booking (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C8A19E6D5 FOREIGN KEY (movie_spec_id) REFERENCES movie_spec (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C9E16D75C FOREIGN KEY (serie_spec_id) REFERENCES serie_spec (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C39AF8C6D FOREIGN KEY (book_spec_id) REFERENCES book_spec (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CFF58F9E9 FOREIGN KEY (album_spec_id) REFERENCES album_spec (id)');
        $this->addSql('ALTER TABLE movie_spec_type ADD CONSTRAINT FK_5095BDB18A19E6D5 FOREIGN KEY (movie_spec_id) REFERENCES movie_spec (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_spec_type ADD CONSTRAINT FK_5095BDB1C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_spec_type ADD CONSTRAINT FK_EB0A8A869E16D75C FOREIGN KEY (serie_spec_id) REFERENCES serie_spec (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_spec_type ADD CONSTRAINT FK_EB0A8A86C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album_spec_type DROP FOREIGN KEY FK_AE6EBCFAFF58F9E9');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CFF58F9E9');
        $this->addSql('ALTER TABLE book_spec_type DROP FOREIGN KEY FK_D1EEA2F139AF8C6D');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C39AF8C6D');
        $this->addSql('ALTER TABLE booking_media DROP FOREIGN KEY FK_FB505CB9EE3863E2');
        $this->addSql('ALTER TABLE booking_media DROP FOREIGN KEY FK_FB505CB9605D5AE6');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C8A19E6D5');
        $this->addSql('ALTER TABLE movie_spec_type DROP FOREIGN KEY FK_5095BDB18A19E6D5');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C9E16D75C');
        $this->addSql('ALTER TABLE serie_spec_type DROP FOREIGN KEY FK_EB0A8A869E16D75C');
        $this->addSql('ALTER TABLE album_spec_type DROP FOREIGN KEY FK_AE6EBCFAC54C8C93');
        $this->addSql('ALTER TABLE book_spec_type DROP FOREIGN KEY FK_D1EEA2F1C54C8C93');
        $this->addSql('ALTER TABLE movie_spec_type DROP FOREIGN KEY FK_5095BDB1C54C8C93');
        $this->addSql('ALTER TABLE serie_spec_type DROP FOREIGN KEY FK_EB0A8A86C54C8C93');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEA76ED395');
        $this->addSql('DROP TABLE album_spec');
        $this->addSql('DROP TABLE album_spec_type');
        $this->addSql('DROP TABLE book_spec');
        $this->addSql('DROP TABLE book_spec_type');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE booking_media');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE movie_spec');
        $this->addSql('DROP TABLE movie_spec_type');
        $this->addSql('DROP TABLE serie_spec');
        $this->addSql('DROP TABLE serie_spec_type');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user');
    }
}
