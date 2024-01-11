<?php

require_once 'functions.php';

$database = file_get_contents(__DIR__ . '/discs.json');

$discs = json_decode($database, true);

$current_disc_id = file_get_contents('php://input');

if (isset($current_disc_id)) {
    discAPIMaker($current_disc_id, $discs);
}
