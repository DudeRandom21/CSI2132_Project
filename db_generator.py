import random

Hotel_chains = ["Hilton", "Holiday Inn", "Marriot", "Best Western", "Wyndham"]
Hotels = ["Ottawa", "Toronto", "NYC", "Syracuse", "Montreal"]
Rooms = [num+floor for floor in range(100, 500, 100) for num in range(10)]

def create_hotels(file, hotel_chains, hotels, rooms):
	for i, chain in enumerate(hotel_chains):
		file.write("INSERT INTO hotel_chain (hotel_chain_id, hotel_chain_name, central_office, contact_email) VALUES (%d, '%s', '%s', '%s@%s.com');\n" % (i, chain, "Washington", chain, chain));
		for j, hotel in enumerate(hotels):
			file.write("INSERT INTO hotel (hotel_chain_id, hotel_id, hotel_address, contact_email, rating) VALUES (%d, %d, '%s', '%s@%s.com', %d);\n" % (i, j+i*len(hotel_chains), hotel, hotel, chain, random.randint(1, 5)))
			for room in Rooms:
					file.write("INSERT INTO room (hotel_id, room_number, can_be_extended, has_sea_view, has_mountain_view, room_capacity, price) VALUES (%d, %d, %r, %r, %r, %d, %d);\n" % (j+i*len(hotel_chains), room, random.choice([True, False]), random.choice([True, False]), random.choice([True, False]), random.randint(2, 6), random.randint(10,20) * 10))

if __name__ == "__main__":
	random.seed(314159)
	file = open("data.sql", "w")
	create_hotels(file, Hotel_chains, Hotels, Rooms)
	file.close()
