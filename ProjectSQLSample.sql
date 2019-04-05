DROP SCHEMA public CASCADE;
CREATE SCHEMA public;

CREATE TABLE Hotel_Chain (
	Hotel_Chain_ID SERIAL,
	hotel_chain_name VARCHAR(20) NOT NULL,
	Central_Office VARCHAR(50) NOT NULL,
	Number_Of_Hotels INTEGER DEFAULT 0,
	Contact_Email VARCHAR(50) NOT NULL,

	PRIMARY KEY (Hotel_Chain_ID)
);

CREATE TABLE HotelChain_PhoneNumbers (
	Hotel_Chain_ID INTEGER,
	Phone_Number NUMERIC(10),

	PRIMARY KEY (Hotel_Chain_ID, Phone_Number),
	FOREIGN KEY (Hotel_Chain_ID) REFERENCES hotel_chain (Hotel_Chain_ID) ON DELETE CASCADE
);

CREATE TABLE Hotel (
	Hotel_Chain_ID INTEGER NOT NULL,
	Hotel_ID SERIAL,
	Hotel_name VARCHAR(50) NOT NULL,
	Hotel_City VARCHAR(50) NOT NULL,
	Hotel_Contact_Email VARCHAR(50) NOT NULL,
	Number_Of_Rooms INTEGER DEFAULT 0 NOT NULL,
	Rating INTEGER CHECK (Rating BETWEEN 1 AND 5),
	manager_ssn NUMERIC(9) NOT NULL,

	PRIMARY KEY (Hotel_ID),
	FOREIGN KEY (Hotel_Chain_ID) REFERENCES Hotel_Chain(Hotel_Chain_ID) ON DELETE CASCADE
);

CREATE TABLE Hotel_PhoneNumbers (
	Hotel_ID INTEGER,
	Phone_Number NUMERIC(10),

	PRIMARY KEY (Hotel_ID, Phone_Number),
	FOREIGN KEY (Hotel_ID) REFERENCES hotel(Hotel_ID) ON DELETE CASCADE
);

CREATE TABLE Room (
	Hotel_ID INTEGER,
	Room_Number INTEGER,
	Can_Be_Extended BOOLEAN NOT NULL,
	Has_Sea_View BOOLEAN NOT NULL,
	Has_Mountain_View BOOLEAN NOT NULL,
	Room_Capacity INTEGER NOT NULL,
	Price INTEGER NOT NULL,

	PRIMARY KEY (Hotel_ID, Room_Number),
	FOREIGN KEY (Hotel_ID) REFERENCES Hotel(Hotel_ID) ON DELETE CASCADE
);

CREATE TABLE Room_Amenities (
	hotel_id INTEGER,
	Room_Number INTEGER,
	Amenity VARCHAR(100),

	PRIMARY KEY (Hotel_ID, Room_Number, Amenity),
	FOREIGN KEY (hotel_id) REFERENCES Hotel(Hotel_ID) ON DELETE CASCADE,
	FOREIGN KEY (hotel_id, Room_Number) REFERENCES Room(hotel_id, Room_Number) ON DELETE CASCADE
);

CREATE TABLE Room_List_of_Problems (
	hotel_id INTEGER,
	Room_Number INTEGER,
	Problem VARCHAR(100),

	PRIMARY KEY (Hotel_ID, Room_Number, Problem),
	FOREIGN KEY (Hotel_ID) REFERENCES Hotel(Hotel_ID) ON DELETE CASCADE,
	FOREIGN KEY (hotel_id, Room_Number) REFERENCES Room(hotel_id, Room_Number) ON DELETE CASCADE
);

CREATE TABLE users (
	username VARCHAR(20),
	password VARCHAR(20) NOT NULL,
	type VARCHAR(10) DEFAULT 'user' CHECK (type IN ('user', 'employee', 'admin')),
	PRIMARY KEY (username)
);

CREATE TABLE Booking (
	Booking_ID SERIAL,
	Time_Created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	check_in_date DATE NOT NULL,
	check_out_date DATE NOT NULL,
	Is_Renting BOOLEAN DEFAULT false,
	username VARCHAR(20),
	Is_Paid BOOLEAN DEFAULT false,
	Hotel_ID INTEGER NOT NULL,
	Room_Number INTEGER NOT NULL,

	FOREIGN KEY (username) REFERENCES users(username) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (Hotel_ID) REFERENCES Hotel(Hotel_ID) ON DELETE CASCADE,
	FOREIGN KEY (hotel_id, Room_Number) REFERENCES Room(hotel_id, Room_Number) ON DELETE CASCADE,
	PRIMARY KEY (Booking_ID)
);

CREATE TABLE Employee (
	SSN NUMERIC(9) NOT NULL,
	Name VARCHAR(20) NOT NULL,
	username VARCHAR(20) NOT NULL,
	Hotel_ID INTEGER NOT NULL,

	FOREIGN KEY (Hotel_ID) REFERENCES Hotel(Hotel_ID) ON DELETE SET NULL, --supposing we don't fire them if the hotel closes
	FOREIGN KEY (username) REFERENCES users(username) ON UPDATE CASCADE ON DELETE CASCADE,
	PRIMARY KEY (SSN)
);
ALTER TABLE hotel ADD CONSTRAINT manages_a FOREIGN KEY (manager_ssn) REFERENCES employee(ssn) ON DELETE SET NULL;


CREATE TABLE Archive (
	Booking_ID INTEGER,
	Time_Created TIME,
	check_in_date DATE,
	check_out_date DATE,
	Is_Renting BOOLEAN,
	username VARCHAR(20),
	Is_Paid BOOLEAN,
	Room_Number INTEGER,
	Hotel_ID INTEGER,

	PRIMARY KEY (Booking_ID)
);

CREATE VIEW rooms_by_area AS SELECT hotel_city, count(*) FROM hotel JOIN room ON hotel.hotel_id = room.hotel_id GROUP BY hotel_city;
CREATE VIEW hotel_room_capacity AS SELECT room_number, room_capacity FROM room WHERE hotel_id = 1;

GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO web;
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO postgres;
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO web;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public TO postgres;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public TO web;