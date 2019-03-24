CREATE TABLE Hotel_Chain (
	Hotel_Chain_ID INTEGER,
	Central_Office VARCHAR(50),
	Number_Of_Hotels INTEGER,
	Contact_Email VARCHAR(50),

	PRIMARY KEY (Hotel_Chain_ID)
);

CREATE TABLE Parent_Chain (
	Hotel_Chain_ID INTEGER,
	Hotel_ID INTEGER,
	Hotel_Address VARCHAR(50),

	PRIMARY KEY (Hotel_Chain_ID, Hotel_ID),
	FOREIGN KEY (Hotel_Chain_ID) REFERENCES Hotel_Chain(Hotel_Chain_ID),
	FOREIGN KEY (Hotel_ID) REFERENCES Hotel(Hotel_ID)
);

CREATE TABLE Hotel (
	Hotel_Chain_ID INTEGER,
	Hotel_ID INTEGER,
	 -- Hotel_Address VARCHAR(50),  TODO: How to handle multi variate
	Contact_Email VARCHAR(50),
	Number_Of_Rooms INTEGER,
	Rating INTEGER, -- TODO: Make this 1 - 5
	-- Phone Numbers -- TODO: Make this support many phone numbers

	PRIMARY KEY (Hotel_Chain_ID, Hotel_ID),
	FOREIGN KEY (Hotel_Chain_ID) REFERENCES Hotel_Chain(Hotel_Chain_ID)
);

CREATE TABLE Has_A (
	Hotel_Chain_ID INTEGER,
	Hotel_ID INTEGER,
	Room_Number INTEGER,

	PRIMARY KEY (Hotel_Chain_ID, Hotel_ID, Room_Number),
	FOREIGN KEY (Hotel_Chain_ID) REFERENCES Hotel_Chain(Hotel_Chain_ID),
	FOREIGN KEY (Hotel_ID) REFERENCES Hotel(Hotel_ID),
	FOREIGN KEY (Room_Number) REFERENCES Room(Room_Number)
);

CREATE TABLE Room (
	Room_Number INTEGER,
	Can_Be_Extended BOOLEAN,
	Has_Sea_View BOOLEAN,
	Has_Mountain_View BOOLEAN,
	Room_Capacity INTEGER,
	Price INTEGER,
	-- Amenities add a list -- TODO
	-- List of problems adda list -- TODO

	PRIMARY KEY (Hotel_Chain_ID, Hotel_ID, Room_Number),
	FOREIGN KEY (Hotel_Chain_ID) REFERENCES Hotel_Chain(Hotel_Chain_ID),
	FOREIGN KEY (Hotel_Chain_ID) REFERENCES Hotel(Hotel_ID)
);

CREATE TABLE Belongs_To (
	Hotel_Chain_ID INTEGER,
	Hotel_ID INTEGER,
	Room_Number INTEGER,
	Booking_ID INTEGER,

	PRIMARY KEY (Hotel_Chain_ID, Hotel_ID, Room_Number, Booking_ID),
	FOREIGN KEY (Hotel_Chain_ID) REFERENCES Hotel_Chain(Hotel_Chain_ID),
	FOREIGN KEY (Hotel_ID) REFERENCES Hotel(Hotel_ID),
	FOREIGN KEY (Room_Number) REFERENCES Room(Room_Number)
);

CREATE TABLE Booking (
	Booking_ID INTEGER,
	Time_Created INTEGER,	-- TODO: Format as a time ??
	Renting_Time INTEGER, --- Format as time?? "TIME"
	Is_Renting BOOLEAN,
	Customer_Name VARCHAR(50),
	Is_Paid BOOLEAN,

	PRIMARY KEY (Booking_ID)
);

CREATE TABLE Owns_A (
	Hotel_Chain_ID INTEGER,
	Hotel_ID INTEGER,
	Booking_ID INTEGER,

	PRIMARY KEY (Hotel_Chain_ID, Hotel_ID, Booking_ID),
	FOREIGN KEY (Hotel_Chain_ID) REFERENCES Hotel_Chain(Hotel_Chain_ID),
	FOREIGN KEY (Hotel_ID) REFERENCES Hotel(Hotel_ID),
	FOREIGN KEY (Booking_ID) REFERENCES Booking(Booking_ID)
);

CREATE TABLE Works_For (
	Hotel_Chain_ID INTEGER,
	Hotel_ID INTEGER,
	SSN INTEGER,

	PRIMARY KEY (Hotel_Chain_ID, Hotel_ID, SSN),
	FOREIGN KEY (Hotel_Chain_ID) REFERENCES Hotel_Chain(Hotel_Chain_ID),
	FOREIGN KEY (Hotel_ID) REFERENCES Hotel(Hotel_ID),
	FOREIGN KEY (SSN) REFERENCES Employee(SSN)
);

CREATE TABLE Manages_A (
	Hotel_Chain_ID INTEGER,
	Hotel_ID INTEGER,
	SSN INTEGER,

	PRIMARY KEY (Hotel_Chain_ID, Hotel_ID, SSN),
	FOREIGN KEY (Hotel_Chain_ID) REFERENCES Hotel_Chain(Hotel_Chain_ID),
	FOREIGN KEY (Hotel_ID) REFERENCES Hotel(Hotel_ID),
	FOREIGN KEY (SSN) REFERENCES Employee(SSN)
);


CREATE TABLE Archive (
	Booking_ID INTEGER,
	Time_Created INTEGER, -- TODO: Make this "time" type
	Renting_Time INTEGER,
	Is_Renting BOOLEAN,
	Customer_Name VARCHAR(50),
	Is_Paid BOOLEAN,
	Room_Number INTEGER,
	Hotel_Address VARCHAR(100),
	Hotel_Chain_ID INTEGER,

	PRIMARY KEY (Booking_ID)
);

















