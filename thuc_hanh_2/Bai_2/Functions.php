<?php

require_once "Movie.php";

function findMovieById(array $movies, int $id): ?Movie
{
    foreach ($movies as $movie) {

        if ($movie->getId() === $id) {
            return $movie;
        }
    }

    return null;
}


function getTotalRevenue(array $movies): float
{
    $total = 0;

    foreach ($movies as $movie) {
        $total += $movie->getRevenue();
    }

    return $total;
}


function getBestSellingMovie(array $movies): ?Movie
{
    if (empty($movies)) {
        return null;
    }

    $bestMovie = $movies[0];

    foreach ($movies as $movie) {

        if (
            $movie->getSoldSeats()
            > $bestMovie->getSoldSeats()
        ) {
            $bestMovie = $movie;
        }
    }

    return $bestMovie;
}