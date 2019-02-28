<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {

} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

} else {
    http_response_code(400);
}

?>