<?php

/**
 * @file
 * Demonstration file of using LoremGutenberg library.
 */

require 'vendor/autoload.php';

use writecrow\LoremGutenberg\LoremGutenberg;

$authors = LoremGutenberg::$authors;
$authors['random'] = 'Surprise me';

$options = [];
if (isset($_POST['sentences']) && is_numeric($_POST['sentences']) && $_POST['sentences'] < 11) {
  $options['sentences'] = $_POST['sentences'];
}
if (isset($_POST['author']) && in_array($_POST['author'], array_keys($authors)) && $_POST['author'] != 'random') {
  $options['author'] = $_POST['author'];
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
  <form action="" method="POST">
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
$text = LoremGutenberg::generate($options);
echo $text;
echo '</div>';
echo '
      </div>
    </div>
  </form>
  <div class="row">
    <div class="six twelve columns"><hr />
    <span>Source code & documentation at <a href="https://github.com/writecrow/lorem_gutenberg">https://github.com/writecrow/lorem_gutenberg</a>.</span>
      <span class="u-pull-right">API version at <a href="/api">/api</a></span>
    </div>
  </div>
</div>
</body>
</html>';
