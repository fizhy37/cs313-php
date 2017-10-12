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




INSERT INTO customer 
VALUES (

	DEFAULT, 

    	'Fisher',
	'Ben',
	2087760707,
	1830,
	'Satterfield'
);



INSERT INTO customer 
VALUES (

	DEFAULT, 

    	'Fisher',
	'Casslyn',
	2083137128,
	111,
	'W 7 S APT 909'
);


ALTER TABLE package
 	ADD num_songs int,
	ADD video_length TEXT;

INSERT INTO package 
VALUES (

    	DEFAULT, 

    	'Basic',
    	'399',
	1,
	'2.5-3.5 minutes',
	'This package includes up to 3 hours of coverage, and a discount at Destinations Inn.'
);

