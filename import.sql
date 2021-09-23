DROP DATABASE IF EXISTS netland;
CREATE DATABASE netland_users;
USE `netland_users`;


CREATE TABLE `gebruikers`
    (
    `id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `gebruikersnaam` VARCHAR(50) NOT NULL UNIQUE KEY,
    `wachtwoord` VARCHAR(64) NOT NULL,
    `email` VARCHAR(254) NULL,
    `laatst_ingelogd` TIMESTAMP);

    INSERT INTO `gebruikers` (`id`, `gebruikersnaam`, `wachtwoord`, `email`, `laatst_ingelogd`)
    VALUES ('1', 'Admin', 'wachtwoord', 'NULL', '');