USE `netland`;
DROP TABLE IF EXISTS gebruikers;
CREATE TABLE `gebruikers`
    (
    `id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `gebruikersnaam` VARCHAR(50) NOT NULL UNIQUE KEY,
    `wachtwoord` VARCHAR(64) NOT NULL);

    INSERT INTO `gebruikers` (`id`, `gebruikersnaam`, `wachtwoord`)
    VALUES ('1', 'Admin', 'wachtwoord');