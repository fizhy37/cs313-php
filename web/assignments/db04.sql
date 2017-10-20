CREATE TABLE customer (

	id          	SERIAL PRIMARY KEY,

    	LastName    	varchar(255) NOT NULL,
    	FirstName   	varchar(255) NOT NULL,
    	Phone       	int NOT NULL,
    	AddressNum  	int NOT NULL,
    	AddressSt   	varchar(255) NOT NULL
);

CREATE TABLE package (

    	id           	SERIAL PRIMARY KEY,

    	PackageName  	varchar(255) NOT NULL,
	PackagePrice 	int NOT NULL,
	Description  	TEXT
);

CREATE TABLE sale (

	id           	SERIAL PRIMARY KEY,

	PackageID 	int REFERENCES package(id),
	CustomerID 	int REFERENCES customer(id),
	TotalCost 	int NOT NULL,
	Paid	 	bool
);

CREATE TABLE user_account (

	id          	SERIAL PRIMARY KEY,

    	username    	varchar(255) NOT NULL,
    	password   	varchar(255) NOT NULL,
    	is_admin 	bool
);




INSERT INTO customer 
VALUES (

	DEFAULT, 

    	'Fisher',
	'Ben',
	2087760707,
	'111 W 7 S APT 909'
);



INSERT INTO customer 
VALUES (

	DEFAULT, 

    	'Fisher',
	'Casslyn',
	2083137128,
	'111 W 7 S APT 909'
);


INSERT INTO customer 
VALUES (

	DEFAULT, 

    	'Nield',
	'Bryton',
	2082205015,
	'420 Callaway'
);



ALTER TABLE package
 	ADD num_songs int,
	ADD video_length TEXT;

INSERT INTO package 
VALUES (

    	DEFAULT, 

    	'Basic',
    	'429',
	1,
	'2.5-3.5 minutes',
	'This package includes up to 3 hours of coverage, and a discount at Destinations Inn.'
);


INSERT INTO package 
VALUES (

    	DEFAULT, 

    	'Standard',
    	'549',
	1,
	'2.5-3.5 minutes',
	'This package includes up to 6 hours of coverage, and a discount at Destinations Inn.'
);


INSERT INTO package 
VALUES (

    	DEFAULT, 

    	'Deluxe',
    	'649',
	2,
	'5-7 minutes',
	'This package includes up to 6 hours of coverage, and a discount at Destinations Inn.'
);


INSERT INTO package 
VALUES (

    	DEFAULT, 

    	'Super Deluxe',
    	'829',
	3,
	'10 minutes',
	'This package includes up to 9 hours of coverage for a Bridal Session, Wedding Ceremony, and Reception. It also includes a discount at Destinations Inn.'
);



INSERT INTO customer 
VALUES (

	DEFAULT, 

    	'Monson',
	'Bailee',
);


INSERT INTO customer VALUES (
	DEFAULT,
	'Whiting',
	'Ashley'
);

INSERT INTO customer VALUES (
	DEFAULT,
	'Hendricks',
	'Meghan'
);

INSERT INTO customer VALUES (
	DEFAULT,
	'Campbell',
	'Hanna',
	2082217080
);

INSERT INTO customer VALUES (
	DEFAULT,
	'Pahl',
	'Jantzen',
	2087054515
);

INSERT INTO customer VALUES (
	DEFAULT,
	'Judy',
	'Ashley',
	2083602010
);

INSERT INTO customer VALUES (
	DEFAULT,
	'Pahl',
	'Bayley',
	2087052746
);

INSERT INTO customer VALUES (
	DEFAULT,
	'Evans',
	'Shelby',
	2085300081
);

INSERT INTO customer VALUES (
	DEFAULT,
	'Bailey',
	'Hope',
	2087056119
);

INSERT INTO customer VALUES (
	DEFAULT,
	'Clark',
	'Michelle'
);

INSERT INTO customer VALUES (
	DEFAULT,
	'Landinez',
	'Jose'
);

INSERT INTO customer VALUES (
	DEFAULT,
	'Preston',
	'Christi'
);

INSERT INTO customer VALUES (
	DEFAULT,
	'Reese',
	'Emily',
	2083515844
);

INSERT INTO customer VALUES (
	DEFAULT,
	'Fisher',
	'Dallin',
	2083171623
);

INSERT INTO customer VALUES (
	DEFAULT,
	'Weston',
	'Kayla'
);

INSERT INTO sale VALUES (
	DEFAULT,
	3,
	( SELECT id
		FROM customer
		WHERE lastname = 'Whiting'
		AND firstname = 'Ashley'),
	250,
	true
);

INSERT INTO sale VALUES (
	DEFAULT,
	4,
	( SELECT id
		FROM customer
		WHERE lastname = 'Judy'
		AND firstname = 'Ashley'),
	300,
	true
);

INSERT INTO sale VALUES (
	DEFAULT,
	3,
	( SELECT id
		FROM customer
		WHERE lastname = 'Monson'
		AND firstname = 'Bailee'),
	450,
	true
);

INSERT INTO sale VALUES (
	DEFAULT,
	1,
	( SELECT id
		FROM customer
		WHERE lastname = 'Bailey'
		AND firstname = 'Hope'),
	200,
	false
);

INSERT INTO sale VALUES (
	DEFAULT,
	3,
	( SELECT id
		FROM customer
		WHERE lastname = 'Pahl'
		AND firstname = 'Jantzen'),
	450,
	true
);

INSERT INTO sale VALUES (
	DEFAULT,
	3,
	( SELECT id
		FROM customer
		WHERE lastname = 'Pahl'
		AND firstname = 'Bayley'),
	475,
	true
);

INSERT INTO sale VALUES (
	DEFAULT,
	3,
	( SELECT id
		FROM customer
		WHERE lastname = 'Hendricks'
		AND firstname = 'Meghan'),
	500,
	true
);

INSERT INTO sale VALUES (
	DEFAULT,
	3,
	( SELECT id
		FROM customer
		WHERE lastname = 'Evans'
		AND firstname = 'Shelby'),
	300,
	true
);

INSERT INTO sale VALUES (
	DEFAULT,
	2,
	( SELECT id
		FROM customer
		WHERE lastname = 'Campbell'
		AND firstname = 'Hanna'),
	400,
	true
);

INSERT INTO sale VALUES (
	DEFAULT,
	3,
	( SELECT id
		FROM customer
		WHERE lastname = 'Nield'
		AND firstname = 'Bryton'),
	0,
	true
);

INSERT INTO sale VALUES (
	DEFAULT,
	3,
	( SELECT id
		FROM customer
		WHERE lastname = 'Clark'
		AND firstname = 'Michelle'),
	500,
	true
);

INSERT INTO sale VALUES (
	DEFAULT,
	1,
	( SELECT id
		FROM customer
		WHERE lastname = 'Landinez'
		AND firstname = 'Jose'),
	200,
	true
);

INSERT INTO sale VALUES (
	DEFAULT,
	2,
	( SELECT id
		FROM customer
		WHERE lastname = 'Preston'
		AND firstname = 'Christi'),
	200,
	true
);

INSERT INTO sale VALUES (
	DEFAULT,
	3,
	( SELECT id
		FROM customer
		WHERE lastname = 'Reese'
		AND firstname = 'Emily'),
	250,
	false
);

INSERT INTO sale VALUES (
	DEFAULT,
	3,
	( SELECT id
		FROM customer
		WHERE lastname = 'Fisher'
		AND firstname = 'Dallin'),
	0,
	true
);

INSERT INTO sale VALUES (
	DEFAULT,
	2,
	( SELECT id
		FROM customer
		WHERE lastname = 'Weston'
		AND firstname = 'Kayla'),
	150,
	true
);

Basic Package 