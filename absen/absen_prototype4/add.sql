    CREATE DATABASE absen;

    USE absen;

    CREATE TABLE senin (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(50),
        j1 INT DEFAULT 0,
        j2 INT DEFAULT 0,
        j3 INT DEFAULT 0,
        j4 INT DEFAULT 0,
        j5 INT DEFAULT 0,
        j6 INT DEFAULT 0,
        j7 INT DEFAULT 0,
        j8 INT DEFAULT 0,
        j9 INT DEFAULT 0,
        j10 INT DEFAULT 0,
        j11 INT DEFAULT 0
    );

    CREATE TABLE selasa LIKE senin;
    CREATE TABLE rabu LIKE senin;
    CREATE TABLE kamis LIKE senin;
    CREATE TABLE jumat LIKE senin;

    INSERT INTO senin (nama) VALUES ('Mochammad Haycal Akbar'), ('Achmad Adam Sajjad Arifin'), ('Adhitama Azar Wicaksono Zein'), ('Aishel Seva Oktavia'), ('Angel Veronika Meylania'), ('Azzahra Cahya Desyienta'), ('Bayu Satrya Putra Arema'), ('Buanga Kirana Eiffel Okafila'), ('Daivd Nafisy'), ('Evan Dwika Isfandra'), ('Fardhan Vaccari Pradiasyah'), ('Galang Ardiansah'), ('Hirzi Aqiilah Annafi Heva'), ('Jibreel Benjamin'), ('Keysha Azzahra Ulfitria'), ('Linda Angeliina'), ('Moch Daffa Athaillah Arifin'), ('Mochammad Satria Agung'), ('Muhammad Fadlur Rohman Thoriq'), ('Muhammad Fattah Giri Gharsina'), ('Muhammad Sajidan Fahri Junaidi'), ('Nelga Amanda Putri Adi Wibowo'), ('Raffi Gani Jabbaru'), ('Reza Eka Saputra'), ('Satria Annugrah Pratama'), ('Sely Aljaynnata'), ('Surya Adi Nugraha'), ('Triaji Mitramas Farelli'), ('Viona Septiasa Lailatul Ramadhani'), ('Zaki Adinata Putra Setiawan');
    INSERT INTO selasa (nama) VALUES ('Mochammad Haycal Akbar'), ('Achmad Adam Sajjad Arifin'), ('Adhitama Azar Wicaksono Zein'), ('Aishel Seva Oktavia'), ('Angel Veronika Meylania'), ('Azzahra Cahya Desyienta'), ('Bayu Satrya Putra Arema'), ('Buanga Kirana Eiffel Okafila'), ('Daivd Nafisy'), ('Evan Dwika Isfandra'), ('Fardhan Vaccari Pradiasyah'), ('Galang Ardiansah'), ('Hirzi Aqiilah Annafi Heva'), ('Jibreel Benjamin'), ('Keysha Azzahra Ulfitria'), ('Linda Angeliina'), ('Moch Daffa Athaillah Arifin'), ('Mochammad Satria Agung'), ('Muhammad Fadlur Rohman Thoriq'), ('Muhammad Fattah Giri Gharsina'), ('Muhammad Sajidan Fahri Junaidi'), ('Nelga Amanda Putri Adi Wibowo'), ('Raffi Gani Jabbaru'), ('Reza Eka Saputra'), ('Satria Annugrah Pratama'), ('Sely Aljaynnata'), ('Surya Adi Nugraha'), ('Triaji Mitramas Farelli'), ('Viona Septiasa Lailatul Ramadhani'), ('Zaki Adinata Putra Setiawan');
    INSERT INTO rabu (nama) VALUES ('Mochammad Haycal Akbar'), ('Achmad Adam Sajjad Arifin'), ('Adhitama Azar Wicaksono Zein'), ('Aishel Seva Oktavia'), ('Angel Veronika Meylania'), ('Azzahra Cahya Desyienta'), ('Bayu Satrya Putra Arema'), ('Buanga Kirana Eiffel Okafila'), ('Daivd Nafisy'), ('Evan Dwika Isfandra'), ('Fardhan Vaccari Pradiasyah'), ('Galang Ardiansah'), ('Hirzi Aqiilah Annafi Heva'), ('Jibreel Benjamin'), ('Keysha Azzahra Ulfitria'), ('Linda Angeliina'), ('Moch Daffa Athaillah Arifin'), ('Mochammad Satria Agung'), ('Muhammad Fadlur Rohman Thoriq'), ('Muhammad Fattah Giri Gharsina'), ('Muhammad Sajidan Fahri Junaidi'), ('Nelga Amanda Putri Adi Wibowo'), ('Raffi Gani Jabbaru'), ('Reza Eka Saputra'), ('Satria Annugrah Pratama'), ('Sely Aljaynnata'), ('Surya Adi Nugraha'), ('Triaji Mitramas Farelli'), ('Viona Septiasa Lailatul Ramadhani'), ('Zaki Adinata Putra Setiawan');
    INSERT INTO kamis (nama) VALUES ('Mochammad Haycal Akbar'), ('Achmad Adam Sajjad Arifin'), ('Adhitama Azar Wicaksono Zein'), ('Aishel Seva Oktavia'), ('Angel Veronika Meylania'), ('Azzahra Cahya Desyienta'), ('Bayu Satrya Putra Arema'), ('Buanga Kirana Eiffel Okafila'), ('Daivd Nafisy'), ('Evan Dwika Isfandra'), ('Fardhan Vaccari Pradiasyah'), ('Galang Ardiansah'), ('Hirzi Aqiilah Annafi Heva'), ('Jibreel Benjamin'), ('Keysha Azzahra Ulfitria'), ('Linda Angeliina'), ('Moch Daffa Athaillah Arifin'), ('Mochammad Satria Agung'), ('Muhammad Fadlur Rohman Thoriq'), ('Muhammad Fattah Giri Gharsina'), ('Muhammad Sajidan Fahri Junaidi'), ('Nelga Amanda Putri Adi Wibowo'), ('Raffi Gani Jabbaru'), ('Reza Eka Saputra'), ('Satria Annugrah Pratama'), ('Sely Aljaynnata'), ('Surya Adi Nugraha'), ('Triaji Mitramas Farelli'), ('Viona Septiasa Lailatul Ramadhani'), ('Zaki Adinata Putra Setiawan');
    INSERT INTO jumat (nama) VALUES ('Mochammad Haycal Akbar'), ('Achmad Adam Sajjad Arifin'), ('Adhitama Azar Wicaksono Zein'), ('Aishel Seva Oktavia'), ('Angel Veronika Meylania'), ('Azzahra Cahya Desyienta'), ('Bayu Satrya Putra Arema'), ('Buanga Kirana Eiffel Okafila'), ('Daivd Nafisy'), ('Evan Dwika Isfandra'), ('Fardhan Vaccari Pradiasyah'), ('Galang Ardiansah'), ('Hirzi Aqiilah Annafi Heva'), ('Jibreel Benjamin'), ('Keysha Azzahra Ulfitria'), ('Linda Angeliina'), ('Moch Daffa Athaillah Arifin'), ('Mochammad Satria Agung'), ('Muhammad Fadlur Rohman Thoriq'), ('Muhammad Fattah Giri Gharsina'), ('Muhammad Sajidan Fahri Junaidi'), ('Nelga Amanda Putri Adi Wibowo'), ('Raffi Gani Jabbaru'), ('Reza Eka Saputra'), ('Satria Annugrah Pratama'), ('Sely Aljaynnata'), ('Surya Adi Nugraha'), ('Triaji Mitramas Farelli'), ('Viona Septiasa Lailatul Ramadhani'), ('Zaki Adinata Putra Setiawan');
