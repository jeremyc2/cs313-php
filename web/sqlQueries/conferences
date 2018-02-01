CREATE TABLE conferences (
     id SERIAL PRIMARY KEY,
     isOctober boolean NOT NULL

);

CREATE TABLE notes(
     id SERIAL PRIMARY KEY,
     content text,
     speaker integer references speakers(id),
     talk integer references talks(id),
     user integer references users(id)

);

CREATE TABLE speakers(
     id SERIAL PRIMARY KEY,
     firstname VARCHAR(80) NOT NULL,
     lastname VARCHAR(80) NOT NULL

);

CREATE TABLE users(
     id SERIAL PRIMARY KEY,
     birthdate date NOT NULL,
     firstname VARCHAR(80) NOT NULL,
     lastname VARCHAR(80) NOT NULL,
     gender boolean NOT NULL,
     profile_pic VARCHAR(80) UNIQUE

);

CREATE TABLE talks(
     speaker integer references speakers(id),
     conference integer references conferences(id),
     UNIQUE(speaker, conference)
);
