CREATE TABLE usuarios(
    nickname VARCHAR(25) NOT NULL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    type VARCHAR(10) NOT NULL DEFAULT "Regular"
)ENGINE = INNODB;

CREATE TABLE album(
    name VARCHAR(25) NOT NULL,
    description VARCHAR(255),
    privacy BIT DEFAULT 0, /*0: Público, 1: Privado*/
    nickname VARCHAR(25) NOT NULL,
    FOREIGN KEY (nickname) REFERENCES usuarios(nickname),
    PRIMARY KEY (name, nickname)
)ENGINE = INNODB;

CREATE TABLE image(
    id INT AUTO_INCREMENT NOT NULL,
    photo VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    title VARCHAR(50) NOT NULL,
    nickname VARCHAR(25) NOT NULL,
    privacy BIT DEFAULT 0, /*0: Público, 1: Privado*/
    FOREIGN KEY (nickname) REFERENCES usuarios(nickname),
    PRIMARY KEY (id, nickname)
)ENGINE = INNODB;

CREATE TABLE imagexalbum(
    order_number INT NOT NULL,
    album_name VARCHAR(25) NOT NULL,
    image_id INT NOT NULL,
    nickname VARCHAR(25) NOT NULL,
    FOREIGN KEY(album_name) REFERENCES album(name),
    FOREIGN KEY(image_id, nickname) REFERENCES image(id, nickname),
    PRIMARY KEY(album_name, image_id)
)ENGINE = INNODB;

CREATE TABLE comment(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    comment varchar(255) NOT NULL,
    image_id INT NOT NULL,
    nickname_c VARCHAR(25) NOT NULL, /*Quien hace el comentario*/
    img_nick VARCHAR(25) NOT NULL, /*El dueño de la imagen*/
    FOREIGN KEY(img_nick) REFERENCES image(nickname),
    FOREIGN KEY(image_id) REFERENCES image(ID),
    FOREIGN KEY(nickname_c) REFERENCES usuarios(nickname)
)ENGINE = INNODB;