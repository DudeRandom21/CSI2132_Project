CREATE TABLE Hotel_Chain (
	Hotel_Chain_ID INTEGER,
	Central_Office INTEGER,
	Number_of_Hotels INTEGER,
	Contact_Email VARCHAR(50),
	PRIMARY KEY (Hotel_Chain_ID)
);

CREATE TABLE HotelChain_PhoneNumbers (
	Hotel_Chain_ID INTEGER,
	Phone_Number NUMERIC(10)
);

CREATE TABLE Parent_Chain (
	Hotel_Chain_ID INTEGER,
	Hotel_ID INTEGER
);

CREATE TABLE Hotel (
	Hotel_Chain_ID INTEGER,
	Hotel_ID INTEGER,
	-- Hotel_Address Address,
	Contact_Email VARCHAR(50),
	Number_of_Rooms INTEGER,
	Rating INTEGER, --TODO: make this 1 to 5
	PRIMARY KEY (Hotel_ID) --TODO: make this include Hotel_Chain_ID (or not)
);

CREATE TABLE Hotel_PhoneNumbers (
	Hotel_ID INTEGER,
	Phone_Number NUMERIC(10)
);

CREATE TABLE WorksFor (
	Hotel_ID INTEGER,
	SIN NUMERIC(9)
);

CREATE TABLE ManagesA (
	Hotel_ID INTEGER,
	SIN NUMERIC(9)
);

CREATE TABLE Employee (
	SIN NUMERIC(9),
	Name VARCHAR(20)
	-- Address Address
);

CREATE TABLE Room (
	Hotel_Chain_ID INTEGER,
	Hotel_ID INTEGER,
	Room_Number INTEGER,
	Can_be_Extended BOOLEAN,
	has_Sea_View BOOLEAN,
	has_Mountain_View BOOLEAN,
	Room_Capacity INTEGER,
	Price INTEGER
);

CREATE TABLE Room_Amenities (
	Room_Number INTEGER,
	Amenity VARCHAR(100)
);

CREATE TABLE Room_List_of_Problems (
	Room_Number INTEGER,
	Problem VARCHAR(100)
);

CREATE TABLE HasA(
	Hotel_Chain_ID INTEGER,
	Hotel_ID INTEGER,
	Room_Number INTEGER
);

CREATE TABLE Booking (
	Booking_ID INTEGER,
	Time_Created TIME,
	Renting_Time TIME,
	Is_Renting BOOLEAN,
	Customer_Name VARCHAR(20),
	Is_Paid BOOLEAN
);

CREATE TABLE OwnsA (
	Hotel_ID INTEGER,
	Booking_ID INTEGER
);

CREATE TABLE Archive (
	Booking_ID INTEGER,
	Time_Created TIME,
	Renting_Time TIME,
	Is_Renting BOOLEAN,
	Customer_Name VARCHAR(20),
	Is_Paid BOOLEAN,
	Room_Number INTEGER,
	Hotel_ID INTEGER,
	Hotel_Chain_ID INTEGER
);