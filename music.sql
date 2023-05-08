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
INSERT INTO users(user_name, password, role_id) VALUES ('khoi', '123456', 2);
INSERT INTO users(user_name, password, role_id) VALUES ('huy', '123456', 2);
INSERT INTO users(user_name, password, role_id) VALUES ('kiet', '123456', 2);
INSERT INTO users(user_name, password, role_id) VALUES ('nam', '123456', 2);
INSERT INTO users(user_name, password, role_id) VALUES ('hung', '123456', 2);
INSERT INTO users(user_name, password, role_id) VALUES ('hai', '123456', 2);
INSERT INTO users(user_name, password, role_id) VALUES ('son', '123456', 2);
INSERT INTO users(user_name, password, role_id) VALUES ('phu', '123456', 2);
CREATE TABLE genres (
  genre_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  image_url VARCHAR(255)
);

INSERT INTO genres(name, image_url) VALUES
(N'Nhạc Trẻ', N'https://photo-resize-zmp3.zmdcdn.me/w240_r1x1_jpeg/cover/0/9/5/4/09542fd83e019d4734587f836bc9bbc0.jpg'),
(N'Nhạc Hàn', N'https://avatar-ex-swe.nixcdn.com/playlist/share/2019/08/07/3/8/6/9/1565154123269.jpg');

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

INSERT INTO songs(title, artist, genre_id, audio_url, image_url, rating, lyric) VALUES
(N'Chắc ai đó sẽ về', N'Sơn tùng', 1, 'assets/song/chacaidoseve.mp3', 'assets/img/chacaidoseve.jpg', 5, N'Anh tìm nỗi nhớ anh tìm quá khứ
Nhớ lắm kí ức anh và em
Trả lại anh yêu thương ấy
Xin người hãy về nơi đây
Bàn tay yếu ớt cố níu em ở lại
Những giọt nước mắt lăn dài trên mi
Cứ thế anh biết phải làm sao
Tình yêu trong em đã mất
Phai dần đi theo gió bay
Còn lại chi nơi đây cô đơn riêng anh...'),
(N'Là anh', N'Phạm Lịch, BMZ', 1, 'assets/song/lanh.mp3', 'assets/img/laanh.jpg', 5, N'Cùng bên nhau mai sau
Là điều ước muốn lớn nhất
Bàn tay anh đưa ra
Tựa là nắng ấm lấp lánh
Này không gian bao la
Thuộc về cho riêng hai ta
Cho tình yêu trăm năm nở hoa
Biết bao giấc mơ ngọt ngào
Đã từng khóc xuyên qua đêm
Tỉnh mộng gối đã ướt đẫm
Chợt anh như hè qua
Ngập tràn ấm áp nắng sớm
Dù hai ta già đi
Và dù hai ta già đi'),
(N'Lửng lơ', N'B Ray và Masew', 1, 'assets/song/lunglo.mp3', 'assets/img/lunglo.jpg', 5, N'Ngày trôi dài hơn đêm
Đôi ta chỉ mong yên bình
Đừng theo làn mây trôi
Buông lơi niềm tin quá vội
Lưng chừng giữa bao hạnh phúc mới
Lửng lơ tình yêu cũ
Chạy theo ngàn đau thương
Con tim này đã héo mòn
Chẳng nguyên vẹn như xưa
Nước mắt giờ trôi theo vết mưa
Đốt sạch hết những tháng ngày đã có nhau
Giờ đã chết'),
(N'Mượn rượu tỏ tình', N'Emily & BigDady', 1, 'assets/song/muonruoutotinh.mp3', 'assets/img/muonruoutotinh.jpg', 5, N'Oh-h-h, sự chú ý của ta lỡ va phải vào ánh mắt của nàng
Rồi bùng lên trong tim ta như một đốm lửa vàng
Act cool đứng hình mất năm giây
Nhìn em bên ngoài có lẽ ăn đứt mấy tấm hình đăng face
Hey
Em ăn tối chưa nhở?
Nếu rồi thì làm một ly
Anh chỉ muốn cởi mở hơn, đừng lo mình sẽ dại dột đi
Em là cô gái đẹp, phải nói với em bằng những lời hay ho
Được ngồi cùng em khiến anh cảm thấy mình cũng rất gì và này nọ
Em đang thôi miên anh bằng nụ cười thật duyên
Cho anh cảm giác này, em là người đầu tiên
Ngồi đây uống ly whisky này nhưng lại say em là chính'),
(N'Não cá vàng', N'Lou Hoàng và Only C', 1, 'assets/song/naocavang.mp3', 'assets/img/naocavang.jpg', 5, N'Chợt nhìn quanh bỗng chẳng thấy em kề cạnh
Chạy thật nhanh tránh cơn gió đêm về lạnh
Ùa về đây nỗi cô đơn thường trực nơi tim mình
Kí ức mong manh còn lại trong anh
Là cảm xúc mỗi khi gió đêm về lạnh
Là hạnh phúc mỗi khi có em gần cạnh
Chợt nhận ra những yêu thương
Vừa là hôm qua mà
Những nỗi cô đơn lại là hôm nay
Sau này sẽ không thấy em đang ôm chặt bờ vai anh
Chẳng còn những lúc mình nắm tay bước đi
Chỉ còn những nỗi buồn vương trên mi');


INSERT INTO songs(title, artist, genre_id, audio_url, image_url, rating, lyric) VALUES
(N'BANG BANG BANG', N'Big Bang', 2, 'assets/song/bangbangbang.mp3', 'assets/img/bangbangbang.jpg', 5, N'난 깨어나 까만 밤과 함께
다 들어와 담엔 누구 차례
한 치 앞도 볼 수 없는 막장 게릴라
경배하라 목청이 터지게
찌질한 분위기를 전환해
광기를 감추지 못하게 해
남자들의 품위 여자들의 가식
이유 모를 자신감이 볼만해
난 보란 듯이 너무나도 뻔뻔히
니 몸속에 파고드는 알러지
이상한 정신의 술렁이는 천지
오늘 여기 무법지'),
(N'Gangnam Style', N'Psy', 2, 'assets/song/gangnamstyle.mp3', 'assets/img/gangnamstyle.jpg', 5, N'Oppan gang-namseutayil
Kan g-namseutayil
Naje- neun ttasaroun inkanjeo-gin yeoja
Keopi hanjanye yeoyureuraneun pumkyeok i-nneun yeoja
Bami omyeon shimjangi tteugeowojineun yeoja
Keureon banjeon i-nneun yeoja'),
(N'One Of A Kind', N'G-Dragon', 1, 'assets/song/oneofakind.mp3', 'assets/img/oneofakind.jpg', 5, N'Just wild and young
I’m just wild and young
Do it just for fun
(Hello) ladies, me and choice
Yes sir, one of a kind nan jaejumanheun gom, (no) gombodan yeou
(Hello hello hello) yes sir, one of a kind nan jaesueomneun nom');




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