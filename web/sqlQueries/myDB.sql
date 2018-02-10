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
insert into albums (artist) values ('alejandrosanz');
insert into albums (artist) values ('almafuerte');
insert into albums (artist) values ('andrescepeda');
insert into albums (artist) values ('axel');
insert into albums (artist) values ('bacilos');
insert into albums (artist) values ('camila');
insert into albums (artist) values ('carlosbuate');
insert into albums (artist) values ('carlosvives');
insert into albums (artist) values ('carnecruda');
insert into albums (artist) values ('charlygarcia');
insert into albums (artist) values ('chayanne');

     INSERT INTO albums(artist, genre, rating) VALUES
     ('ciro', 'pop', '100'),
     ('cnco', 'latin', '50'),
     ('danielsantacruz','latin', '25');

     INSERT INTO songs_playlists(s_id, p_id) VALUES
       (
        (SELECT id FROM songs WHERE album = (SELECT id FROM albums WHERE artist = 'cnco') limit 1),
        (SELECT id FROM playlists WHERE title = 'now playing' LIMIT 1)
       );

       INSERT INTO songs_playlists(s_id, p_id) VALUES
         (
          (SELECT id FROM songs WHERE album = (SELECT id FROM albums WHERE artist = 'cnco') limit 1 offset 1),
          (SELECT id FROM playlists WHERE title = 'now playing' LIMIT 1)
         );

       INSERT INTO playlists(title) VALUES ('now playing');

       INSERT INTO songs(title, youtube_link,album, duration,genre) VALUES
       ('Reggaeton Lento', 'https://www.youtube.com/watch?v=7jpqqBX-Myw',(SELECT id FROM albums WHERE artist = 'cnco') ,90, 'latin pop'),
       ('Mamita', 'https://www.youtube.com/watch?v=OHELU6I10wQ', (SELECT id FROM albums WHERE artist = 'cnco'), 120, 'latin pop'),
       ('La Rosa', 'https://www.youtube.com/watch?v=7t3ICrmBxxM', (SELECT id FROM albums WHERE artist = 'ciro'), 121, 'latin ballad');
