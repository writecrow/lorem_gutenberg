<?php

namespace writecrow\LoremGutenberg;

/**
 * Class LoremGutenberg.
 *
 * A helper class to generate filler text.
 *
 * @author markfullmer <mfullmer@gmail.com>
 *
 * @link https://github.com/writecrow/lorem_gutenberg/
 *
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */
class LoremGutenberg {

  /**
   * The available texts, where the array key equals the filename in data/.
   *
   * @var str[]
   */
  public static $authors = [
    'austen' => 'Jane Austen',
    'hardy' => 'Thomas Hardy',
    'lawrence' => 'D.H. Lawrence',
    'wharton' => 'Edith Wharton',
  ];

  /**
   * Main generator method.
   *
   * @param mixed $options
   *   Options to be passed to the generator.
   */
  public static function generate($options = array()) {
    $sentencesToDisplay = isset($options['sentences']) ? $options['sentences'] : rand(1, 10);
    $author = isset($options['author']) ? $options['author'] : array_rand(self::$authors, 1);
    $path = __DIR__ . '/data/' . $author . '.txt';
    if (file_exists($path)) {
      $text = file_get_contents($path);
      $chars_in_text = strlen($text);
      $length = 10000;
      $start = rand(0, $chars_in_text - $length);
      $subsection = substr($text, $start, $length);
      return self::getSentences($subsection, $sentencesToDisplay);
    }
  }

  /**
   * Returns the first N sentences from a string of text.
   *
   * @param string $body
   *    The raw text.
   * @param int $sentencesToDisplay
   *    How many sentences to return.
   */
  protected static function getSentences($body, $sentencesToDisplay = 2) {
    $sentences = preg_split('/(\.|\?|\!)(\s)/', $body);
    array_shift($sentences);

    if (count($sentences) <= $sentencesToDisplay) {
      return $body;
    }
    else {
      $results = array_slice($sentences, 0, $sentencesToDisplay);
      return implode('. ', $results) . '.';
    }
  }

}
