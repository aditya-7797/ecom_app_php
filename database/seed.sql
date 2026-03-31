CREATE DATABASE IF NOT EXISTS ecom_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ecom_app;

CREATE TABLE IF NOT EXISTS products (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, price, description) VALUES
('Laptop', 899.99, 'High-performance laptop for work and gaming'),
('Wireless Mouse', 29.99, 'Ergonomic wireless mouse with 2.4GHz connection'),
('USB-C Cable', 12.99, 'Durable USB-C charging and data cable'),
('Monitor 27"', 299.99, '4K Ultra HD IPS display with HDR support'),
('Mechanical Keyboard', 149.99, 'RGB backlit mechanical keyboard with Cherry switches');
