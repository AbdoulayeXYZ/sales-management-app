-- Création de la base de données
CREATE DATABASE IF NOT EXISTS coffee_store;
USE coffee_store;

-- Création de la table products
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    description VARCHAR(1000) NOT NULL
);

-- Insertion des produits
INSERT INTO products (name, price, image, description) VALUES
('Espresso Elegante', 4000, 'https://readymadeui.com/images/coffee1.webp', 'Un espresso riche et intense, avec des notes de chocolat noir et de noisettes grillées. Parfait pour les amateurs de café corsé.'),
('Mocha Madness', 5000, 'https://readymadeui.com/images/coffee8.webp', 'Une fusion délicieuse de café et de chocolat, topped avec une mousse de lait crémeuse. Un régal sucré pour les amoureux du mocha.'),
('Caramel Cream Delight', 4500, 'https://readymadeui.com/images/coffee3.webp', 'Un mélange onctueux de café doux et de caramel sucré, couronné une généreuse dose de crème fouettée.'),
('Hazelnut Heaven Blend', 4800, 'https://readymadeui.com/images/coffee4.webp', "Un café aromatique infusé avec la saveur riche et chaleureuse des noisettes. Une expérience gustative réconfortante."),
('Vanilla Velvet Brew', 4700, 'https://readymadeui.com/images/coffee5.webp', " Un café soyeux enrichi une touche de vanille douce et crémeuse. Une boisson élégante et raffinée."),
('Double Shot Symphony', 5200, 'https://readymadeui.com/images/coffee6.webp', " Pour les amateurs de café fort, ce double espresso offre une symphonie de saveurs intenses et un boost énergie.'),
('Irish Cream Dream', 5500, 'https://readymadeui.com/images/coffee7.webp', 'Un mélange harmonieux de café et de crème irlandaise, offrant une expérience gustative douce et légèrement alcoolisée.'),
('Coconut Bliss Coffee', 5300, 'https://readymadeui.com/images/coffee8.webp', 'Une création tropicale unique, combinant le goût riche du café avec la douceur exotique de la noix de coco.'),
('Espresso Elegante', 4000, 'https://readymadeui.com/images/coffee1.webp', 'Notre espresso signature, offrant une expérience gustative intense et raffinée avec des notes de chocolat noir et de noisettes grillées.');

-- Création de la table sales
CREATE TABLE IF NOT EXISTS sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    sale_date DATE NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Exempleinsertion de ventes
INSERT INTO sales (product_id, quantity, total, sale_date) VALUES
(1, 2, 8000, '2023-10-01'),
(2, 1, 5000, '2023-10-02'),
(3, 3, 13500, '2023-10-03');