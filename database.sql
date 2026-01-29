CREATE DATABASE resin_store;
USE resin_store;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price INT,
    image VARCHAR(255)
);

INSERT INTO products (name, price, image) VALUES
('Resin Name Keychain', 299, 'img1.jpg'),
('Photo Resin Keychain', 399, 'img2.jpg'),
('Alphabet Resin Keychain', 249, 'img3.jpg');

CREATE TABLE coupons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50),
    discount INT
);

INSERT INTO coupons (code, discount) VALUES
('SAVE10', 10),
('RESIN20', 20);
