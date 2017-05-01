<?php

/**
 * @file
 * Demonstration file of using TagConverter library.
 */

require '../vendor/autoload.php';

use writecrow\LoremGutenberg\LoremGutenberg;

$authors = [
  'austen' => 'Jane Austen',
  'hardy' => 'Thomas Hardy',
  'lawrence' => 'D.H. Lawrence',
  'wharton' => 'Edith Wharton',
];

$sentences = 5;
if (isset($_POST['sentences']) && is_numeric($_POST['sentences'])) {
  $sentences = $_POST['sentences'];
}
$author = 'hardy';
if (isset($_POST['author']) && in_array($_POST['author'], array_keys($authors))) {
  $author = $_POST['author'];
}

echo '<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
</head>
<body>';

echo '
<div class="container">
  <form action="//' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '" method="POST">
    <div class="row"><div class="six columns">';

echo '<label for="sentences">Number of sentences to generate:</label>
<select name="sentences">';

for ($i = 1; $i <= 10; $i++) {
  echo '<option value="' . $i . '"';
  if ($i == 5) {
    echo ' selected ';
  }
  echo '>' . $i . '</option>';
}
echo '</select>';
echo '</div><div class="six_columns">';

echo '<label for="author">Author:</label>
<select name="author">';

foreach ($authors as $key => $value) {
  echo '<option value="' . $key . '">' . $value . '</option>';
}
echo '</select>';
echo '</div><div class="row">';
echo '<input type="submit" name="json" value="Generate Lorem Gutenberg" />';
echo '<div>';
$text = LoremGutenberg::generate(array('sentences' => $sentences, 'author' => $author));
echo $text;
echo '</div>';
echo '
      </div>
    </div>
  </form>
</div>
</body>
</html>';
