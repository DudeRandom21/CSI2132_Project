import random

Hotel_chains = ["Hilton", "Holiday Inn", "Marriot", "Best Western", "Wyndham"]
Hotels = ["Ottawa", "Toronto", "NYC", "Syracuse", "Montreal", "Detroit", "Los Angeles1", "Los Angeles2"]
Locations = ["Ottawa", "Toronto", "NYC", "Syracuse", "Montreal", "Detroit", "Los Angeles", "Los Angeles"]
Rooms = [num+floor for floor in range(100, 500, 100) for num in range(10)]

def underscore(str):
	return str.replace(" ", "_")

def create_hotels(file, hotel_chains, hotels, rooms, locations):
	for i, chain in enumerate(hotel_chains):
		file.write("INSERT INTO hotel_chain (hotel_chain_name, central_office, contact_email) VALUES ('%s', '%s', '%s@%s.com');\n" % (chain, "Washington", underscore(chain), underscore(chain)));
		for j, (hotel, location) in enumerate(zip(hotels, locations)):
			file.write("INSERT INTO hotel (hotel_chain_id, hotel_name, hotel_city, hotel_contact_email, rating) VALUES (%d, '%s', '%s', '%s@%s.com', %d);\n" % (i+1, chain + " " + hotel, location, underscore(hotel), underscore(chain), random.randint(1, 5)))
			for room in Rooms:
					file.write("INSERT INTO room (hotel_id, room_number, can_be_extended, has_sea_view, has_mountain_view, room_capacity, price) VALUES (%d, %d, %r, %r, %r, %d, %d);\n" % (j+i*len(hotels)+1, room, random.choice([True, False]), random.choice([True, False]), random.choice([True, False]), random.randint(2, 7), random.randint(10,20) * 10))

def create_managers(file, num_hotels):
	for i in range(num_hotels):
		file.write("INSERT INTO users (username, password, type) VALUES ('Jim%d', '%d', 'employee');\n" % (i, i))
		file.write("INSERT INTO employee (ssn, name, username, hotel_id) VALUES ('%d', 'Jim', 'Jim%d', %d);\n" % (100000000 + i, i, i+1))
		file.write("UPDATE hotel SET manager_ssn = '%d' WHERE hotel_id = %d;\n" % (100000000 + i, i+1))

if __name__ == "__main__":
	random.seed(314159)
	file = open("data.sql", "w")
	create_hotels(file, Hotel_chains, Hotels, Rooms, Locations)
	create_managers(file, len(Hotel_chains) * len(Hotels))
	file.close()
