<?php

require_once 'functions.php';

$database = file_get_contents(__DIR__ . '/discs.json');
$fav_database = file_get_contents(__DIR__ . '/favDiscs.json');

$discs = json_decode($database, true);
$fav_discs = json_decode($fav_database, true);

$payload = json_decode(file_get_contents('php://input'), true);
$current_disc_id = $payload["currentDiscID"];
$target_disc = $payload["targetDiscID"];

if (isset($current_disc_id)) {
    discAPIMaker($current_disc_id, $discs);
}

if (isset($payload['CDTitle'])) {
    makeNewCD($discs);
}

if (isset($target_disc)) {
    removeCD($discs, $target_disc);
}

addFavs($fav_discs, $id);



header('Content-Type: application/json');
echo json_encode($discs);
