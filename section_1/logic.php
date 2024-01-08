<?php
$title = 'Dark Matter';
$hasRead = false;

// if ($hasRead) {
//     $message = "You have read <em>$title</em>.";
// }

// In the conditional above (L:5), $message is only initialized if the statement is true. If the statement is false, the conditional is then skipped. This is a problem here since the browser will still try and display $message even though it hasn't been defined, resulting in an error. To avoid this, an else statement can be used, or a ternary within the variable itself:

$message = $hasRead
    ? "You have read <em>$title</em>."
    : "You haven’t read <em>$title</em>.";
// ↳ Smart Quote Shortcut: Shift + Option + ]

// Associative Arrays
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
        'url' => 'https://www.goodreads.com/book/show/102733.One_Past_Midnight'
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

// Anonymous (or Lambda) Functions

// No. 1
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

// The above example is the same function as the one on L:54, except this time, the function is set to a variable. The variable points to a function, but isn't a function itself.

// Refactoring Code for Versatility

// No. 1
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

// The above example is the same function as the one on L:54, except it's been generalized for more diverse use.

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

// The above example is the same function as the one on L:107, except it's second parameter is now an anonymous function.

// Note: PHP has an in-built function called array_filter() that accepts the same arguments as filterFn() and could replace it and work just as easily.

?>
