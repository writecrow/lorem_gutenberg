<?php

/**
 * @file
 * Simple REST API implementation of LoremGutenberg.
 *
 * For demo purposes only.
 */

require '../vendor/autoload.php';

use writecrow\LoremGutenberg\LoremGutenberg;

$authors = LoremGutenberg::$authors;

$options = [];
if (isset($_GET['sentences']) && is_numeric($_GET['sentences']) && $_GET['sentences'] < 11) {
  $options['sentences'] = $_GET['sentences'];
}
if (isset($_GET['author']) && in_array($_GET['author'], array_keys($authors))) {
  $options['author'] = $_GET['author'];
}
$text = LoremGutenberg::generate($options);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, PATCH, DELETE');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With');
header('Content-Type: application/json');
echo json_encode(['data' => $text]);
