<?php

namespace writecrow\LoremGutenberg;

use PHPUnit\Framework\TestCase;

/**
 * Test basic strings are converted correctly.
 */
class BasicTest extends TestCase {

  /**
   * Test assertions.
   */
  public function testBasic() {
    // Test that a string is returned by a basic call with no arguments.
    $this->assertTrue(is_string(LoremGutenberg::generate()));

    $authors = LoremGutenberg::$authors;
    foreach ($authors as $author => $name) {
      $excerpt = LoremGutenberg::generate(array('author' => $author, 'sentences' => 1));
      $path = 'src/data/' . $author . '.txt';
      $fulltext = file_get_contents($path);
      $this->assertTrue(strpos($fulltext, trim($excerpt)) !== FALSE);
    }
  }

}
