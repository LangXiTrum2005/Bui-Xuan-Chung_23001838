<?php

require_once "Movie.php";
require_once "functions.php";

$movies = [
    new Movie(1, "Avengers", 100000, 100),
    new Movie(2, "Avatar", 120000, 80),
    new Movie(3, "Batman", 90000, 120)
];


//Avengers
$avengers = findMovieById($movies, 1);

if ($avengers !== null) {
    $avengers->bookTicket(30);
}


// Avatar
$avatar = findMovieById($movies, 2);

if ($avatar !== null) {
    $avatar->bookTicket(20);
}


//Cancel 5 ticket Avengers
if ($avengers !== null) {
    $avengers->cancelTicket(5);
}


//Show list movie
echo "<h2>Danh sách phim</h2>";

foreach ($movies as $movie) {
    $movie->displayInfo();
}


//Total sells
echo "<h2>Tổng doanh thu</h2>";

echo number_format(
    getTotalRevenue($movies),
    0,
    ',',
    '.'
) . " VND";


// Phim bán nhiều nhất
echo "<h2>Phim bán nhiều vé nhất</h2>";

$bestMovie = getBestSellingMovie($movies);

if ($bestMovie !== null) {

    echo $bestMovie->getTitle()
        . " - "
        . $bestMovie->getSoldSeats()
        . " vé";
}


// Test tìm phim không tồn tại
echo "<h2>Tìm phim ID 999</h2>";

$result = findMovieById($movies, 999);

if ($result === null) {
    echo "Không tìm thấy phim.";
}