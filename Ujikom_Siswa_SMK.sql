CREATE DATABASE siswa_smk;

USE siswa_smk;

CREATE TABLE siswa_ujikom (
    nis INTEGER PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    tempat_lahir VARCHAR(50),
    tanggal_lahir DATE,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan'),
    kelas VARCHAR(10),
    alamat TEXT,
    kelurahan VARCHAR(50),
    kecamatan VARCHAR(50),
    kota_kabupaten VARCHAR(50),
    provinsi VARCHAR(50),
    foto VARCHAR(255)
);
