CREATE DATABASE absen;

USE absen;

CREATE TABLE senin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50),
    j1 TINYINT DEFAULT 0,
    j2 TINYINT DEFAULT 0,
    j3 TINYINT DEFAULT 0,
    j4 TINYINT DEFAULT 0,
    j5 TINYINT DEFAULT 0,
    j6 TINYINT DEFAULT 0,
    j7 TINYINT DEFAULT 0,
    j8 TINYINT DEFAULT 0,
    j9 TINYINT DEFAULT 0,
    j10 TINYINT DEFAULT 0,
    j11 TINYINT DEFAULT 0
);

CREATE TABLE selasa LIKE senin;
CREATE TABLE rabu LIKE senin;
CREATE TABLE kamis LIKE senin;
CREATE TABLE jumat LIKE senin;

-- Menambahkan data awal
INSERT INTO senin (nama) VALUES ('Mochammad Haycal Akbar'), ('Achmad Adam Sajjad Arifin'), ('Adhitama Azar Wicaksono Zein'), ('Aishel Seva Oktavia'), ('Azzahra Cahya Desyienta'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa'), ('namasiswa');
INSERT INTO selasa (nama) VALUES ('udin'), ('ita'), ('el');
INSERT INTO rabu (nama) VALUES ('udin'), ('ita'), ('el');
INSERT INTO kamis (nama) VALUES ('udin'), ('ita'), ('el');
INSERT INTO jumat (nama) VALUES ('udin'), ('ita'), ('el');
