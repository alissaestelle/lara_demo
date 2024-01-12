<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0" />
    <title>Demo</title>
    <link rel="preconnect"
          href="https://fonts.googleapis.com">
    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300;1,300&display=swap"
          rel="stylesheet">

    <style>
    <?php include './style.css';
    ?>
    </style>
</head>

<body>
    <?php include './logic.php'; ?>

    <h1 id="ex-1"
        class="hide">
        <!-- PHP Syntax -->

        <!-- No. 1 -->
        <?php echo 'Hello, World'; ?>

        <!-- No. 2 -->
        <?php print 'Hello, Universe'; ?>
    </h1>

    <h1 id="ex-2"
        class="hide">
        <!-- Concatenation Methods w/ Variables -->

        <!-- No. 1 (Periods) -->
        <?php
        $hello = 'Hello';
        echo $hello . ',' . ' ' . 'World';
        ?>

        <!-- No. 2 (Double Quotes) -->
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

        <!-- No. 1 (w/ Array)-->
        <ul class="hide">
            <?php foreach ($books as $book) {
                echo "<li>{$book['title']}</li>";
            } ?>
        </ul>
        <!-- This loop renders each book title to the browser just like it should, but what if each book required a trademark symbol? -->

        <!-- No. 3 -->
        <ul class="hide">
            <?php foreach ($books as $book) {
                echo "<li>{$book['title']}™️</li>";
            } ?>
        </ul>
        <!-- Note: Enclosing variables in curly braces is the cleanest way to concatenate strings. -->

        <!-- Alternate Loop Syntax (Best) -->
        <ul class="hide">
            <?php foreach ($books as $book) : ?>
            <li><?= $book['title'] ?></li>
            <?php endforeach; ?>
        </ul>

        <h2>Recommended Books</h2>
        <ul>
            <?php foreach ($books as $book) : ?>
            <li>
                <a href=<?= $book['url'] ?>
                   target="_blank">
                    <?= $book['title'] ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div>
        <h2 class="hide">Books by Andy Weir</h2>
        <ul class="hide">
            <?php foreach (filterAuthors($books, 'Andy Weir') as $book) : ?>
            <li>
                <a href=<?= $book['url'] ?>
                   target="_blank">
                    <?= $book['title'] ?></a>
            </li>
            <?php endforeach; ?>
        </ul>

        <h2 class="hide">Books Published After 1989</h2>
        <ul class="hide">
            <?php foreach (filterDates($books) as $book) : ?>
            <li>
                <a href=<?= $book['url'] ?>
                   target="_blank">
                    <?= $book['title'] ?></a> (<?= $book['publishYear'] ?>)
            </li>
            <?php endforeach; ?>
        </ul>

        <!-- Instead of calling functions directly inside forEach loops (like in those shown above), it's preferable to assign functions to variables first (see logic.php > L:68 && L:84). -->

        <!-- No. 1 -->
        <h2>Books by Andy Weir</h2>
        <ul>
            <?php foreach ($andyWeir as $a) : ?>
            <li>
                <a href=<?= $a['url'] ?>
                   target="_blank">
                    <?= $a['title'] ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- In the example above, a variable that represents the function (L:140) is being used in place of the function itself. -->

    <!-- No. 2 -->
    <div>
        <h2>Books Published After 1989</h2>
        <ul>
            <?php foreach ($post1989 as $y) : ?>
            <li>
                <a href=<?= $y['url'] ?>
                   target="_blank">
                    <?= $y['title'] ?></a> (<?= $y['publishYear'] ?>)
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- In the example above, a variable that represents the function (L:155) is being used in place of the function itself. -->

    <!-- It's important to note that each of these functions triggers their own forEach loop and returns the filtered results in a new array. The filtered results are then passed to more forEach loops, and through this process creates a pattern of nested loops. Since nested loops easily become hard to trace, variables are used here the same way that trail markers are used on a hiking path. -->

    <div>
        <h2>Books by Philip K. Dick</h2>
        <ul>
            <?php foreach ($anonAuthors as $a) : ?>
            <li>
                <a href=<?= $a['url'] ?>
                   target="_blank">
                    <?= $a['title'] ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div>
        <h2>Books by Stephen King</h2>
        <ul>
            <?php foreach ($flexFilter as $f) : ?>
            <li>
                <a href=<?= $f['url'] ?>
                   target="_blank">
                    <?= $f['title'] ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div>
        <h2>Books Published Before 1970</h2>
        <ul>
            <?php foreach ($flexFilter as $f) : ?>
            <li>
                <a href=<?= $f['url'] ?>
                   target="_blank">
                    <?= $f['title'] ?></a> (<?= $f['publishYear'] ?>)
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>