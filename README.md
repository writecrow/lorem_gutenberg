# Lorem Gutenberg

[![Circle CI](https://circleci.com/gh/writecrow/lorem_gutenberg.svg?style=shield)](https://circleci.com/gh/writecrow/lorem_gutenberg)

A PHP library for generating random text, sourced from various authors in
Project Gutenberg.

![Screenshot of Text Generation](https://raw.githubusercontent.com/writecrow/lorem_gutenberg/master/demo/screenshot.png)

## Basic Usage
The included `/demo/index.php` file contains a generation form demo.

Make your code aware of the LoremGutenberg class via your favorite method (e.g.,
`use` or `require`)

Then pass a string of text into the class:
```php
$text = LoremGutenberg::generate();
echo $text;
// Will return an excerpt of random length (1-10 sentences) from a random author.

$text = LoremGutenberg::generate(array('author' => 'austen'));
echo $text;
// Will return an excerpt of random length (1-10 sentences) from Jane Austen.

$text = LoremGutenberg::generate(array('author' => 'hardy', 'sentences' => 3));
echo $text;
// Will return an excerpt of 3 sentences from Thomas Hardy.
```

## What authors are available?
As of this writing, LoremGutenberg references texts from the following authors:
```php
public static $authors = [
  'austen' => 'Jane Austen',
  'hardy' => 'Thomas Hardy',
  'lawrence' => 'D.H. Lawrence',
  'wharton' => 'Edith Wharton',
];
```

## Testing
Unit Tests can be run (after ```composer install```) by executing ```vendor/bin/phpunit```
