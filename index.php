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

  <div>
    <!-- Displaying Data w/ Arrays -->
    <h2>Recommended Books</h2>

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
    <?php $books = [
        [
            'title' => 'Do Androids Dream of Electric Sheep',
            'author' => 'Philip K. Dick',
            'url' =>
                'https://www.goodreads.com/book/show/36402034-do-androids-dream-of-electric-sheep'
        ],
        [
            'title' => 'Project Hail Mary',
            'author' => 'Andy Weir',
            'url' =>
                'https://www.goodreads.com/book/show/54493401-project-hail-mary'
        ],
        [
            'title' => 'One Past Midnight: The Langoliers',
            'author' => 'Stephen King',
            'url' =>
                'https://www.goodreads.com/book/show/102733.One_Past_Midnight'
        ]
    ]; ?>

    <ul>
      <?php foreach ($books as $book): ?>
      <!-- <li><?= $book['title'] ?></li> -->
      <li>
        <a href=<?= $book['url'] ?> target="_blank">
        <?= $book['title'] ?></a> (<?= $book['author'] ?>)
      </li>
      <?php endforeach; ?>
    </ul>

  </div>

</body>

</html>