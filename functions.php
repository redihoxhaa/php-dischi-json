<?php

function discAPIMaker($id, $array)
{
    $single_disc = array_filter($array, fn ($disc) => $disc["id"] === $id);
    $first_disc = reset($single_disc);;
    header('Content-Type: application/json');
    file_put_contents('currentDisc.json', json_encode($first_disc));
    echo $id;
}
