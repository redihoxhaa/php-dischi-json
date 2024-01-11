<?php

require_once 'functions.php';

$database = file_get_contents(__DIR__ . '/discs.json');

$discs = json_decode($database, true);

$payload = json_decode(file_get_contents('php://input'), true);
$current_disc_id = $payload["currentDiscID"];

if (isset($current_disc_id)) {
    discAPIMaker($current_disc_id, $discs);
}
