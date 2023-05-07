CREATE DATABASE mp3;
USE mp3;
CREATE TABLE roles
(
  role_id INT AUTO_INCREMENT PRIMARY KEY,
  role_name VARCHAR(255)
);
INSERT INTO roles(role_name) VALUES(N'Admin'), (N'User');

CREATE TABLE users
(
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  user_name VARCHAR(255),
  password VARCHAR(255),
  email VARCHAR(255),
  role_id int,
  FOREIGN KEY (role_id) REFERENCES roles(role_id)
);
INSERT INTO users(user_name, password, role_id) VALUES ('admin', '123456', 1);

CREATE TABLE genres (
  genre_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  image_url VARCHAR(255)
);

INSERT INTO genres(name) VALUES
(N'Nhạc Trẻ'),
(N'Rap Việt'),
(N'Trữ Tình'),
(N'Nhạc Thiếu Nhi'),
(N'Nhạc Không Lời'),
(N'Nhạc Hàn'),
(N'Nhạc Âu Mỹ');

CREATE TABLE playlists (
  playlist_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  name VARCHAR(255),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);
CREATE TABLE songs (
  song_id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  artist VARCHAR(255),
  genre_id INT, 
  audio_url VARCHAR(255),
  image_url VARCHAR(255), 
  rating FLOAT,
  lyric VARCHAR(255),
  FOREIGN KEY (genre_id) REFERENCES genres(genre_id)
);
CREATE TABLE playlist_songs (
  playlist_song_id INT AUTO_INCREMENT PRIMARY KEY,
  playlist_id INT,
  song_id INT,
  FOREIGN KEY (playlist_id) REFERENCES playlists(playlist_id),
  FOREIGN KEY (song_id) REFERENCES songs(song_id)
);
CREATE TABLE comments
(
  comment_id INT AUTO_INCREMENT PRIMARY KEY,
  song_id INT,
  user_id INT,
  comment_text VARCHAR(255),
  created_at DATETIME,
  FOREIGN KEY (song_id) REFERENCES songs(song_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
)