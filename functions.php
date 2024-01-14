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
    $payload = json_decode(file_get_contents('php://input'), true);
    $new_disc = [
        "id" => (string) rand(1000, 9999),
        "title" => $payload['CDTitle'],
        "author" => $payload['CDAuthor'],
        "year" => $payload['CDYear'],
        "genre" => $payload['CDGenre'],
        "cover" => $payload['CDCoverURL'],
        "streams" => $payload['CDStreams']
    ];
    array_unshift($array, $new_disc);
    header('Content-Type: application/json');
    file_put_contents(__DIR__ . '/discs.json', json_encode($array));
}

function removeCD($array, $id)
{
    $target_disc_key = array_search($id, array_column($array, 'id'));
    unset($array[$target_disc_key]);
    $array = array_values($array);
    header('Content-Type: application/json');
    file_put_contents(__DIR__ . '/discs.json', json_encode($array));
}

function addFavs($array, $id)
{
    $payload = json_decode(file_get_contents('php://input'), true);
    // todo
    header('Content-Type: application/json');
    file_put_contents(__DIR__ . '/favDiscs.json', json_encode($array));
}
