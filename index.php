<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Demo</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300;1,300&display=swap" rel="stylesheet">

  <style>
    <?php include './style.css'; ?>
  </style>
</head>

<body>
  <h1 id="ex-1" class="hide">
    <!-- PHP Syntax -->

    <!-- No. 1 -->
    <?php echo 'Hello, World'; ?>

    <!-- No. 2 -->
    <?php print 'Hello, Universe'; ?>
  </h1>
  <h1 id="ex-2" class="hide">
    <!-- Concatenation Methods w/ Variables -->

    <!-- No. 1 -->
    <?php
    $hello = 'Hello';
    echo $hello . ',' . ' ' . 'World';
    ?>

    <!-- No. 2 -->
    <?php
    $hello = 'Hello';
    echo "$hello, Universe";
    ?>
    <!-- Note: Variables must be placed inside double quotes in order to be evaluated, otherwise PHP will print the text itself. -->
  </h1>

  <div id="dark-matter">
    <h1 class="hide">You have read <em>Dark Matter</em>.</h1>

    <?php $title = 'Dark Matter'; ?>
    <h1 class="hide">You have read <em><?php echo $title; ?></em>.</h1>
    <!-- In this example, a PHP variable is nested within surrounding H1 text. This differs from the previous example, where all of the text was bundled inside an echo statement. -->

    <?php
    $title = 'Dark Matter';
    $hasRead = false;

    // if ($hasRead) {
    //     $message = "You have read <em>$title</em>.";
    // }

    // In the conditional above, $message is only initialized if the statement is true.
    // If the statement is false, the conditional is then skipped. However, this is a problem since the browser will still try and display $message even though it hasn't been defined, resulting in an error. To avoid this, an else statement can be used, or a ternary within the variable itself:

    $message = $hasRead
        ? "You have read <em>$title</em>."
        : "You haven’t read <em>$title</em>.";
    ?>
    <!-- ↳ Smart Quote Shortcut: Shift + Option + ] -->

    <h1 class="hide">
      <?php echo $message; ?>
      <!-- Note: The em tags within $message were accurately evaluated (very cool). -->
    </h1>

    <!-- Shorthand for Echo Statements -->
    <h1>
      <?= $message ?>
    </h1>
  </div>

  <div>
    <!-- Displaying Data w/ Arrays -->
    <h2 class="hide">Recommended Books</h2>

    <!-- No. 1 (w/o Array)-->
    <ul class="hide">
      <li>Do Androids Dream of Electric Sheep</li>
      <li>The Langoliers</li>
      <li>Project Hail Mary</li>
    </ul>

    <!-- No. 2 (w/ Array)-->
    <?php $books = [
        'Do Androids Dream of Electric Sheep',
        'The Langoliers',
        'Project Hail Mary'
    ]; ?>

    <ul class="hide">
      <?php foreach ($books as $book) {
          echo "<li>$book</li>";
      } ?>
    </ul>
    <!-- This loop renders each book to the browser just like it should, but what if each book required a trademark symbol? -->
    <!-- ↳ No. 3 -->
    <ul class="hide">
      <?php foreach ($books as $book) {
          echo "<li>{$book}™️</li>";
      } ?>
    </ul>
    <!-- Note: Enclosing variables in curly braces is the cleanest way to concatenate strings. -->

    <!-- Alternate Loop Syntax (Best) -->
    <ul class="hide">
      <?php foreach ($books as $book): ?>
      <li><?= $book ?></li>
      <?php endforeach; ?>
    </ul>

    <!-- Associative Arrays -->
    <?php
    $books = [
        [
            'title' => 'Naked Lunch',
            'author' => 'William S. Burroughs',
            'publishYear' => '1959',
            'url' => 'https://www.goodreads.com/book/show/7437.Naked_Lunch'
        ],
        [
            'title' => 'Do Androids Dream of Electric Sheep',
            'author' => 'Philip K. Dick',
            'publishYear' => '1968',
            'url' =>
                'https://www.goodreads.com/book/show/36402034-do-androids-dream-of-electric-sheep'
        ],
        [
            'title' => 'One Past Midnight: The Langoliers',
            'author' => 'Stephen King',
            'publishYear' => '1990',
            'url' =>
                'https://www.goodreads.com/book/show/102733.One_Past_Midnight'
        ],
        [
            'title' => 'The Martian',
            'author' => 'Andy Weir',
            'publishYear' => '2011',
            'url' => 'https://www.goodreads.com/book/show/18007564-the-martian'
        ],
        [
            'title' => 'Project Hail Mary',
            'author' => 'Andy Weir',
            'publishYear' => '2021',
            'url' =>
                'https://www.goodreads.com/book/show/54493401-project-hail-mary'
        ]
    ];

    // Functions && Logic
    function filterAuthors($books, $author)
    {
        $collection = [];

        foreach ($books as $book) {
            if ($book['author'] == $author) {
                $collection[] = $book;
            }
        }

        return $collection;
    }

    $andyWeir = filterAuthors($books, 'Andy Weir');

    function filterDates($books)
    {
        $collection = [];

        foreach ($books as $book) {
            $publishYear = intval($book['publishYear']);
            if ($publishYear >= 1989) {
                $collection[] = $book;
            }
        }

        return $collection;
    }

    $post1989 = filterDates($books);
    ?>
  
    <h2>Recommended Books</h2>
    <ul>
      <?php foreach ($books as $book): ?>
      <li>
        <a href=<?= $book['url'] ?> target="_blank">
        <?= $book['title'] ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <div>
    <h2 class="hide">Books by Andy Weir</h2>
    <ul class="hide">
      <?php foreach (filterAuthors($books, 'Andy Weir') as $book): ?>
          <li>
            <a href=<?= $book['url'] ?> target="_blank">
            <?= $book['title'] ?></a>
          </li>
      <?php endforeach; ?>
    </ul>

    <h2 class="hide">Books Published After 1989</h2>
    <ul class="hide">
      <?php foreach (filterDates($books) as $book): ?>
          <li>
            <a href=<?= $book['url'] ?> target="_blank">
            <?= $book['title'] ?></a> (<?= $book['publishYear'] ?>)
          </li>
      <?php endforeach; ?>
    </ul>

    <!-- Instead of calling functions directly inside forEach loops (like in those shown above), it's preferable to assign functions to variables first (see L:164 && L:180). -->

    <!-- No. 1 -->
    <h2>Books by Andy Weir</h2>
    <ul>
      <?php foreach ($andyWeir as $a): ?>
          <li>
            <a href=<?= $a['url'] ?> target="_blank">
            <?= $a['title'] ?></a>
          </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <!-- This code block is the same as the one starting on L:195, only a variable that represents the function (L:218) is being used in place of the function itself. -->

  <!-- No. 2 -->
  <div>
    <h2>Books Published After 1989</h2>
    <ul>
      <?php foreach ($post1989 as $y): ?>
          <li>
            <a href=<?= $y['url'] ?> target="_blank">
            <?= $y['title'] ?></a> (<?= $y['publishYear'] ?>)
          </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <!-- This code block is the same as the one starting on L:205, only a variable that represents the function (L:231) is being used in place of the function itself. -->

  <!-- It's important to note that each of these functions triggers their own forEach loop and returns the filtered results in a new array. The filtered results are then passed to more forEach loops——this process creates a pattern of nested loops. Since nested loops easily become hard to trace, variables are used here the same way that trail markers are used on a hiking path. -->

  <!-- Anonymous (or Lambda) Functions -->

  <!-- No. 1 -->
  <?php
  $filterAuthors = function ($books, $author) {
      $collection = [];

      foreach ($books as $book) {
          if ($book['author'] == $author) {
              $collection[] = $book;
          }
      }

      return $collection;
  };

  $anonAuthors = $filterAuthors($books, 'Philip K. Dick');
  ?>

  <!-- The above example is the same function as the one on L:151, except this time, the function is set to a variable. The variable points to a function, but isn't a function itself. -->

  <div>
    <h2>Books by Philip K. Dick</h2>
    <ul>
      <?php foreach ($anonAuthors as $a): ?>
          <li>
            <a href=<?= $a['url'] ?> target="_blank">
            <?= $a['title'] ?></a>
          </li>
      <?php endforeach; ?>
    </ul>
  </div>

    <!-- Refactoring Code for Versatility -->

    <?php
    function filter($data, $key, $value)
    {
        $collection = [];

        foreach ($data as $d) {
            if ($d[$key] == $value) {
                $collection[] = $d;
            }
        }

        return $collection;
    }

    $flexFilter = filter($books, 'author', 'Stephen King');
    ?>

  <div>
    <h2>Books by Stephen King</h2>
    <ul>
      <?php foreach ($flexFilter as $f): ?>
          <li>
            <a href=<?= $f['url'] ?> target="_blank">
            <?= $f['title'] ?></a>
          </li>
      <?php endforeach; ?>
    </ul>
  </div>
    
  <!-- The above example is the same function as the one on L:151, except it's been generalized for more diverse use. -->

  <?php
  function filterFn($data, $fn)
  {
      $collection = [];

      foreach ($data as $d) {
          if ($fn($d)) {
              $collection[] = $d;
          }
      }

      return $collection;
  }

  $flexFilter = filterFn($books, function ($book) {
      $publishYear = intval($book['publishYear']);
      return $publishYear <= 1970;
  });
  ?>

  <!-- The above example is the same function as the one on L:276, except it's second parameter is now an anonymous function. -->

  <!-- Note: PHP has an in-built function called array_filter() that accepts the same arguments as filterFn() and could replace it and work just as easily. -->

  <div>
    <h2>Books Published Before 1970</h2>
    <ul>
      <?php foreach ($flexFilter as $f): ?>
          <li>
            <a href=<?= $f['url'] ?> target="_blank">
            <?= $f['title'] ?></a> (<?= $f['publishYear'] ?>)
          </li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>

</html>