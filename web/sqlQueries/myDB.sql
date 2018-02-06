CREATE  TABLE users
(
    id  SERIAL PRIMARY KEY,
    username VARCHAR(80) UNIQUE NOT NULL,
    password VARCHAR(20) NOT NULL,
    firstname VARCHAR(80),
    lastname VARCHAR(80),
    email VARCHAR(1000)
);

CREATE TABLE albums
(
      id SERIAL PRIMARY KEY,
      artist VARCHAR(80),
      date  DATE,
      album_art_url VARCHAR(1000) UNIQUE,
      genre VARCHAR(80),
      rating VARCHAR(3)
);

CREATE TABLE threads
(
     id SERIAL PRIMARY KEY,
     title VARCHAR(80) UNIQUE,
     author integer references users(id)
);

CREATE TABLE songs
(
     id SERIAL PRIMARY KEY,
     title VARCHAR(80),
     youtube_link VARCHAR(1000) UNIQUE,
     album integer references albums(id),
     duration integer,
     genre VARCHAR(80)
);

CREATE TABLE playlists
(
     id SERIAL PRIMARY KEY,
     title VARCHAR(80),
     date date,
     users integer references users(id)
);

CREATE TABLE songs_playlists
(
     s_id integer references songs(id),
     p_id integer references playlists(id),
     UNIQUE(s_id,p_id)
);

insert into albums (artist) values ('Alejandrofernandez');
