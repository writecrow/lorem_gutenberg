# Lorem Gutenberg

[![Circle CI](https://circleci.com/gh/writecrow/lorem_gutenberg.svg?style=shield)](https://circleci.com/gh/writecrow/lorem_gutenberg)

A PHP library for generating random text, sourced from various authors in
Project Gutenberg.

![Screenshot of Text Generation](https://raw.githubusercontent.com/writecrow/lorem_gutenberg/master/demo/screenshot.png)

## Usage in an application
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

## Usage as an API
The file in `/demo/api` demonstrates how GET parameters in a URL can be passed to LoremGutenberg. For example, `https://my-api.org/api/?author=hardy&sentences=2` will return 2 sentences' worth of LoremGutenberg from Thomas Hardy.

### Parameters
| Name  | Description | Example |
| ------------- | ------------- | ------------- |
| `author`  | If absent, a random author will be used | hardy |
| `sentences`  | If absent, a number from 1-10 will be used | 2 |

### Sameple valid API queries
`/api/?author=hardy&sentences=2`
`/api/?author=hardy`
`/api/?sentences=2`
`/api/`

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
