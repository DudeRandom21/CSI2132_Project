CREATE OR REPLACE FUNCTION increment_hotel_count() RETURNS trigger AS
$body$
BEGIN
	UPDATE hotel_chain SET number_of_hotels = number_of_hotels + 1
		WHERE hotel_chain_id = NEW.hotel_chain_id;
	RETURN NEW;
END;
$body$
language plpgsql;

CREATE OR REPLACE FUNCTION decrement_hotel_count() RETURNS trigger AS
$body$
BEGIN
	UPDATE hotel_chain SET number_of_hotels = number_of_hotels - 1
		WHERE hotel_chain_id = OLD.hotel_chain_id;
	RETURN NEW;
END;
$body$
language plpgsql;

CREATE OR REPLACE FUNCTION increment_room_count() RETURNS trigger AS
$body$
BEGIN
	UPDATE hotel SET number_of_rooms = number_of_rooms + 1
		WHERE hotel_id = NEW.hotel_id;
	RETURN NEW;
END;
$body$
language plpgsql;

CREATE OR REPLACE FUNCTION decrement_room_count() RETURNS trigger AS
$body$
BEGIN
	UPDATE hotel SET number_of_rooms = number_of_rooms - 1
		WHERE hotel_id = OLD.hotel_id;
	RETURN NEW;
END;
$body$
language plpgsql;

CREATE TRIGGER add_hotel AFTER INSERT ON hotel
	FOR EACH ROW EXECUTE PROCEDURE increment_hotel_count();

CREATE TRIGGER del_hotel AFTER DELETE ON hotel
	FOR EACH ROW EXECUTE PROCEDURE decrement_hotel_count();

CREATE TRIGGER add_room AFTER INSERT ON room
	FOR EACH ROW EXECUTE PROCEDURE increment_room_count();

CREATE TRIGGER del_room AFTER DELETE ON room
	FOR EACH ROW EXECUTE PROCEDURE decrement_room_count();


CREATE OR REPLACE FUNCTION insert_archive() RETURNS trigger AS
$body$
BEGIN
	INSERT INTO archive (Booking_ID, Time_Created, check_in_date, check_out_date, Is_Renting, username, Is_Paid, Room_Number, Hotel_ID) VALUES (NEW.Booking_ID, NEW.Time_Created, NEW.check_in_date, NEW.check_out_date, NEW.Is_Renting, NEW.username, NEW.Is_Paid, NEW.Room_Number, NEW.Hotel_ID);
	RETURN NEW;
END;
$body$
language plpgsql;

CREATE OR REPLACE FUNCTION update_archive() RETURNS trigger AS
$body$
BEGIN
	UPDATE archive SET Time_Created = NEW.Time_Created, check_in_date = NEW.check_in_date, check_out_date = NEW.check_out_date, Is_Renting = NEW.Is_Renting, username = NEW.username, Is_Paid = NEW.Is_Paid, Room_Number = NEW.Room_Number, Hotel_ID = NEW.Hotel_ID, Hotel_Chain_ID = NEW.Hotel_Chain_ID WHERE Booking_ID = NEW.Booking_ID;
	RETURN NEW;
END;
$body$
language plpgsql;



CREATE TRIGGER add_archive AFTER INSERT ON booking
	FOR EACH ROW EXECUTE PROCEDURE insert_archive();

CREATE TRIGGER update_archive AFTER UPDATE ON booking
	FOR EACH ROW EXECUTE PROCEDURE update_archive();
