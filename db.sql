-- CREATE DATABASE Notes;

CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255),
    email VARCHAR(255),
    pass VARCHAR(255),
    registration_date DATE,
    profile VARCHAR(255),
    PRIMARY KEY(id)

);


CREATE TABLE details(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255),
    description TEXT,
    date_created DATE,
    PRIMARY KEY(id)

);

