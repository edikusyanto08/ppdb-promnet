create database tubes_promnet;
use tubes_promnet;

create table log(
	ID_log int primary key auto_increment,
	ID_akses int not null,
	Aksi varchar(50) not null,
	waktu timestamp not null
);

create table admin(
	ID int primary key auto_increment,
	nama_admin varchar(50) not null,
	username varchar(20) not null,
	password varchar(35) not null
);

create table status(
	ID_status int primary key auto_increment,
	nama_status varchar(100) not null,
	keterangan int default 1
);

create table siswa(
	ID_siswa int primary key auto_increment,
	NISN varchar(20) not null,
	nama_lengkap varchar(100) not null,
	username varchar(20) not null,
	password varchar(32) not null,
	email varchar(50) null,
	kontak varchar(15) null,
	ID_sekolah int not null,
	status_pendaftaran int not null,
	foreign key (status_pendaftaran) references status(ID_status),
	foreign key (ID_sekolah) references sekolah(ID_sekolah)
);

create table provinsi(
	ID_provinsi int primary key auto_increment,
	nama_provinsi varchar(50) not null
);

create table kota(
	ID_kota int primary key auto_increment,
	nama_kota varchar(50) not null,
	ID_provinsi int not null,
	foreign key (ID_provinsi) references provinsi(ID_provinsi)
);

create table kecamatan(
	ID_kecamatan int primary key auto_increment,
	nama_kecamatan varchar(50) not null,
	ID_kota int not null,
	foreign key (ID_kota) references kota(ID_kota)
);

create table alamat(
	ID_alamat int primary key auto_increment,
	ID_siswa int not null,
	provinsi int not null,
	kota int not null,
	kecamatan int not null,
	desa varchar(100) not null,
	detail longtext not null,
	foreign key (ID_siswa) references siswa(ID_siswa),
	foreign key (kecamatan) references kecamatan(ID_kecamatan)
);

create table orangtua(
	id_orangtua int primary key auto_increment,
	ID_siswa int not null,
	nama_ayah varchar(100) not null,
	nama_ibu varchar(100) not null,
	penghasilan_ayah int not null,
	penghasilan_ibu int  not null,
	umur_ayah int not null,
	umur_ibu int not null,
	foreign key (ID_siswa) references siswa(ID_siswa)
);
alter table orangtua add column (kontak_ayah varchar(15) not null);
alter table orangtua add column (kontak_ibu varchar(15) not null);

create table UN(
	ID_UN int primary key auto_increment,
	ID_siswa int not null,
	matematika int not null,
	bahasa_indonesia int not null,
	bahasa_inggris int not null,
	ipa int not null,
	ips int not null,
	foreign key (ID_siswa) references siswa(ID_siswa)
);

create table persyaratan(
	ID_persyaratan int primary key auto_increment,
	ID_siswa int not null,
	Ijazah varchar(100) not null,
	SKHUN varchar(100) not null,
	KK varchar(100) not null,
	SKKB varchar(100) not null,
	foreign key (ID_siswa) references siswa(ID_siswa)
);

create table jurusan(
	ID_jurusan int primary key auto_increment,
	kode_jurusan varchar(20) not null,
	nama_jurusan varchar(50) not null,
	kuota_jurusan int not null,
	KKM int not null,
	status int default 1
);

create table test(
	ID_test int primary key auto_increment,
	ID_siswa int not null,
	ID_jurusan int not null,
	nilai int not null,
	keterangan varchar(20) not null,
	foreign key (ID_siswa) references siswa(ID_siswa),
	foreign key (ID_jurusan) references jurusan(ID_jurusan)
);

create table pilihan(
	ID_pilihan int primary key auto_increment,
	ID_siswa int not null,
	pilihan1 int not null,
	pilihan2 int not null,
	foreign key (ID_siswa) references siswa(ID_siswa),
	foreign key (pilihan1) references jurusan(ID_jurusan),
	foreign key (pilihan2) references jurusan(ID_jurusan)
);

create table sekolah(
	ID_sekolah int primary key auto_increment,
	nama_sekelah varchar(100) not null,
	NPSN varchar(50) not null,
	Provinsi int not null,
	kota int not null,
	kecamatan int not null,
	detail longtext not null,
	kontak varchar(25) not null,
	daerah varchar(50) not null,
	status_sekolah varchar(20) not null,
	akreditasi varchar(5) not null,
	status int default 0,
	foreign key (kecamatan) references kecamatan(ID_kecamatan)
);

create table penerimaan(
	ID_penerimaan int primary key auto_increment,
	ID_siswa int not null,
	ID_jurusan int not null,
	foreign key (ID_siswa) references siswa(ID_siswa),
	foreign key (ID_jurusan) references jurusan(ID_jurusan)
);