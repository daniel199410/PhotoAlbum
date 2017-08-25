CREATE TABLE usuarios(
    nickname VARCHAR(25) NOT NULL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
)ENGINE = INNODB;

CREATE TABLE album(
    name VARCHAR(25) NOT NULL,
    description VARCHAR(255),
    nickname VARCHAR(25) NOT NULL,
    FOREIGN KEY (nickname) REFERENCES usuarios(nickname),
    PRIMARY KEY (name, nickname)
)ENGINE = INNODB;