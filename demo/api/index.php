<?php

/**
 * @file
 * Simple REST API implementation of LoremGutenberg.
 *
 * For demo purposes only.
 */

require '../../vendor/autoload.php';

use writecrow\LoremGutenberg\LoremGutenberg;

$authors = [
  'austen' => 'Jane Austen',
  'hardy' => 'Thomas Hardy',
  'lawrence' => 'D.H. Lawrence',
  'wharton' => 'Edith Wharton',
];

$options = [];
if (isset($_GET['sentences']) && is_numeric($_GET['sentences']) && $_GET['sentences'] < 11) {
  $options['sentences'] = $_GET['sentences'];
}
if (isset($_GET['author']) && in_array($_GET['author'], array_keys($authors))) {
  $options['author'] = $_GET['author'];
}
$text = LoremGutenberg::generate($options);
echo $text;
