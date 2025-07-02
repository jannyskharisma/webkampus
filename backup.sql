-- Membuat tabel admin
CREATE TABLE admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Tambahkan 1 user admin default:
INSERT INTO admin (username, password) VALUES
('admin', 'admin123');

-- keterangan: password = admin123

-----------------------------------------------------

-- Membuat tabel berita
CREATE TABLE berita (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul VARCHAR(200) NOT NULL,
  konten TEXT NOT NULL,
  link VARCHAR(255) NOT NULL,
  tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contoh data
INSERT INTO berita (judul, konten, link) VALUES
('Wisuda Juni', 'Selamat untuk para wisudawan...', 'https://undar.ac.id/berita/wisuda-juni'),
('Tech Festival 2023', 'Acara teknologi tahunan...', 'https://undar.ac.id/berita/tech-festival');

CREATE TABLE video (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul VARCHAR(200) NOT NULL,
  deskripsi TEXT NOT NULL,
  link VARCHAR(255) NOT NULL,
  thumbnail VARCHAR(255) DEFAULT NULL,
  tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contoh data
INSERT INTO video (judul, deskripsi, link, thumbnail) VALUES
('Virtual Tour Kampus', 'Jelajahi kampus secara virtual.', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'https://img.youtube.com/vi/dQw4w9WgXcQ/hqdefault.jpg');


CREATE TABLE berita (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul VARCHAR(200) NOT NULL,
  konten TEXT NOT NULL,
  link VARCHAR(255) DEFAULT NULL,
  thumbnail VARCHAR(255) DEFAULT NULL,
  tipe ENUM(text,video) NOT NULL DEFAULT text,
  tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
