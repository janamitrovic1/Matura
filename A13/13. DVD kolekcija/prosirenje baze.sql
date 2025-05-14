ALTER table GLUMAC ADD  
Nadimak varchar(30);

CREATE TABLE PRIMERAK(
PrimerakID int primary key,
FilmID int references FILM(filmid)
);
CREATE TABLE ZAPOSLENI(
ZaposleniID int primary key,
ime varchar(30) not null,
prezime varchar(30) not null,
telefon varchar(30) not null,
adresa varchar(30) not null
);
CREATE TABLE POZAJMICA(
PrimerakID int references PRIMERAK(PrimerakID),
ZaposleniID int references ZAPOSLENI(ZaposleniID),
Datum_pozajmice DATE not null,
Datum_vracanja DATE,
PRIMARY KEY(PrimerakID,ZaposleniID,Datum_pozajmice)
);