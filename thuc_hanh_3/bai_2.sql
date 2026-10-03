CREATE TABLE movies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    total_seats INT NOT NULL,
    available_seats INT NOT NULL
);

INSERT INTO movies
(title, price, total_seats, available_seats)
VALUES
('Avengers', 100000, 100, 60),
('Avatar', 120000, 80, 30),
('Batman', 90000, 120, 100),
('Spider-Man', 110000, 150, 70),
('Iron Man', 95000, 100, 90);

SELECT * FROM movies;

SELECT *
FROM movies
WHERE price > 100000;

SELECT *
FROM movies
WHERE available_seats > 50;

SELECT *
FROM movies
ORDER BY price DESC;

UPDATE movies
SET available_seats = 50
WHERE title = 'Avengers';

DELETE FROM movies
WHERE title = 'Iron Man';

SELECT
    title,
    total_seats - available_seats AS ve_da_ban
FROM movies;

SELECT
    title,
    (total_seats - available_seats) * price AS doanh_thu
FROM movies;

SELECT
    SUM((total_seats - available_seats) * price) AS tong_doanh_thu
FROM movies;

SELECT
    title,
    total_seats - available_seats AS ve_da_ban
FROM movies
ORDER BY ve_da_ban DESC
LIMIT 1;