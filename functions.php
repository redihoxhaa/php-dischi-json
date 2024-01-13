<?php

// Funzione per creare json da array filtrato
function discAPIMaker($id, $array)
{
    $single_disc = array_filter($array, fn ($disc) => $disc["id"] === $id);
    $first_disc = reset($single_disc);;
    header('Content-Type: application/json');
    file_put_contents('currentDisc.json', json_encode($first_disc));
}

function makeNewCD($array)
{
    $new_disc = [
        "id" => (string) rand(1000, 9999),
        "title" => $_GET['CDTitle'],
        "author" => $_GET['CDAuthor'],
        "year" => $_GET['CDYear'],
        "genre" => $_GET['CDGenre'],
        "cover" => $_GET['CDCoverURL'],
        "streams" => $_GET['CDStreams']
    ];
    array_unshift($array, $new_disc);
    file_put_contents('discs.json', json_encode($array));
}
