CREATE DATABASE IF NOT EXISTS globetrek_db;
USE globetrek_db;

DROP TABLE IF EXISTS payments;
DROP TABLE IF EXISTS contact_messages;
DROP TABLE IF EXISTS custom_plans;
DROP TABLE IF EXISTS transport_bookings;
DROP TABLE IF EXISTS accommodation_bookings;
DROP TABLE IF EXISTS package_bookings;
DROP TABLE IF EXISTS travel_guides;
DROP TABLE IF EXISTS transport_services;
DROP TABLE IF EXISTS accommodations;
DROP TABLE IF EXISTS travel_packages;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  phone VARCHAR(30),
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','staff','customer') DEFAULT 'customer',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE travel_packages (
  package_id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  destination VARCHAR(100) NOT NULL,
  duration VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  image_url VARCHAR(255) NOT NULL
);

CREATE TABLE accommodations (
  accommodation_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  location VARCHAR(100) NOT NULL,
  type VARCHAR(70) NOT NULL,
  description TEXT NOT NULL,
  price_per_night DECIMAL(10,2) NOT NULL,
  image_url VARCHAR(255) NOT NULL
);

CREATE TABLE transport_services (
  transport_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  vehicle_type VARCHAR(80) NOT NULL,
  capacity INT NOT NULL,
  description TEXT NOT NULL,
  base_price DECIMAL(10,2) NOT NULL,
  image_url VARCHAR(255) NOT NULL
);

CREATE TABLE travel_guides (
  guide_id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  category VARCHAR(80) NOT NULL,
  summary TEXT NOT NULL,
  image_url VARCHAR(255) NOT NULL
);

CREATE TABLE package_bookings (
  booking_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  package_id INT NOT NULL,
  travel_date DATE NOT NULL,
  travellers INT NOT NULL,
  notes TEXT,
  total_amount DECIMAL(10,2) NOT NULL,
  status VARCHAR(30) DEFAULT 'Pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (package_id) REFERENCES travel_packages(package_id)
);

CREATE TABLE accommodation_bookings (
  booking_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  accommodation_id INT NOT NULL,
  check_in DATE NOT NULL,
  check_out DATE NOT NULL,
  guests INT NOT NULL,
  status VARCHAR(30) DEFAULT 'Pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (accommodation_id) REFERENCES accommodations(accommodation_id)
);

CREATE TABLE transport_bookings (
  booking_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  transport_id INT NOT NULL,
  pickup_location VARCHAR(150) NOT NULL,
  dropoff_location VARCHAR(150) NOT NULL,
  trip_date DATE NOT NULL,
  passengers INT NOT NULL,
  status VARCHAR(30) DEFAULT 'Pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (transport_id) REFERENCES transport_services(transport_id)
);

CREATE TABLE custom_plans (
  plan_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  destination VARCHAR(150) NOT NULL,
  budget DECIMAL(10,2) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  preferences TEXT NOT NULL,
  status VARCHAR(30) DEFAULT 'Pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE contact_messages (
  message_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(120) NOT NULL,
  subject VARCHAR(150) NOT NULL,
  message TEXT NOT NULL,
  status VARCHAR(30) DEFAULT 'New',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE payments (
  payment_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  booking_type VARCHAR(50) NOT NULL,
  booking_reference INT NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  payment_status VARCHAR(30) DEFAULT 'Pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);

INSERT INTO users (name, email, phone, password, role) VALUES
('Admin User', 'admin@globetrek.local', '0700000001', '$2y$12$TMe5OL5UlFttifEKIo6eDu/0Qve31Vuh25DnXq3qt.vir5ELnTbk6', 'admin'),
('Staff User', 'staff@globetrek.local', '0700000002', '$2y$12$qZqcFMQaBWU62HXf9K3EzuGWfn3LSc3gfUfbrgIdGh3J2VSqTg3kW', 'staff'),
('Customer User', 'customer@globetrek.local', '0700000003', '$2y$12$PrF5T11pDcyXu479wOHnQej7lygSOkBxDNBi0DlHRXiuuE5qwmcKq', 'customer');

INSERT INTO travel_packages (title, destination, duration, description, price, image_url) VALUES
('Ella Nature Escape', 'Ella', '3 Days / 2 Nights', 'Explore tea estates, waterfalls, mountain views, and scenic train routes in Ella.', 45000.00, 'assets/images/packages/ella.svg'),
('Kandy Heritage Tour', 'Kandy', '2 Days / 1 Night', 'Visit the Temple of the Tooth, Kandy Lake, botanical gardens, and cultural attractions.', 32000.00, 'assets/images/packages/kandy.svg'),
('Mirissa Beach Holiday', 'Mirissa', '3 Days / 2 Nights', 'Enjoy beach relaxation, whale watching, seafood, and sunset views on the south coast.', 52000.00, 'assets/images/packages/mirissa.svg'),
('Yala Safari Adventure', 'Yala', '2 Days / 1 Night', 'Experience wildlife safari, nature trails, and camping-style adventure near Yala National Park.', 58000.00, 'assets/images/packages/yala.svg');

INSERT INTO accommodations (name, location, type, description, price_per_night, image_url) VALUES
('Ocean Pearl Beach Resort', 'Mirissa', 'Resort', 'Beachfront resort with comfortable rooms and sea views.', 18000.00, 'assets/images/accommodation/beach-resort.svg'),
('Kandy City Hotel', 'Kandy', 'Hotel', 'Convenient city hotel close to main attractions.', 12000.00, 'assets/images/accommodation/city-hotel.svg'),
('Ella Eco Lodge', 'Ella', 'Eco Lodge', 'Nature-friendly stay surrounded by hills and greenery.', 15000.00, 'assets/images/accommodation/eco-lodge.svg'),
('Hill View Villa', 'Nuwara Eliya', 'Villa', 'Private villa with mountain views and calm surroundings.', 22000.00, 'assets/images/accommodation/hill-villa.svg');

INSERT INTO transport_services (name, vehicle_type, capacity, description, base_price, image_url) VALUES
('Airport Transfer', 'Car', 3, 'Comfortable airport pickup and drop-off service.', 9500.00, 'assets/images/transport/airport-transfer.svg'),
('Private Tour Car', 'Car', 4, 'Private car for city tours and short trips.', 12000.00, 'assets/images/transport/private-car.svg'),
('Group Tour Van', 'Van', 10, 'Spacious van for family and group travel.', 25000.00, 'assets/images/transport/tour-van.svg'),
('Safari Jeep', 'Jeep', 6, 'Jeep service for safari and off-road travel.', 18000.00, 'assets/images/transport/safari-jeep.svg');

INSERT INTO travel_guides (title, category, summary, image_url) VALUES
('Best Time to Visit Sri Lanka', 'Planning', 'A quick guide to choosing the best travel season based on destination and weather.', 'assets/images/guides/best-time.svg'),
('Sri Lankan Culture Tips', 'Culture', 'Helpful tips for respecting local traditions, temples, and cultural spaces.', 'assets/images/guides/culture.svg'),
('Beach Travel Guide', 'Beach', 'Simple guidance for planning a relaxing beach holiday in Sri Lanka.', 'assets/images/guides/beach.svg'),
('Wildlife Safari Tips', 'Wildlife', 'What to know before visiting national parks and safari destinations.', 'assets/images/guides/wildlife.svg'),
('Packing Guide', 'Travel Tips', 'Essential items to pack for a comfortable Sri Lankan trip.', 'assets/images/guides/packing.svg'),
('Suggested Travel Route', 'Route', 'A beginner-friendly route covering culture, hills, wildlife, and beaches.', 'assets/images/guides/route.svg');
