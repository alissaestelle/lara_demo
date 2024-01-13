<!DOCTYPE html>
<html lang="en">
<?php
$title = $n['title'];
$body = $n['body']; ?>

<?php include 'partials/header.php'; ?>

<body class="h-full">
    <div class="min-h-full">
        <?php include 'partials/nav.php'; ?>
        <?php include 'partials/banner.php'; ?>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <?php if ($body) : ?>
                <p class="mb-6"><?= htmlspecialchars($body) ?></p>
                <p>
                    <a href="/notes"
                       class="text-blue-500 hover:underline">↳ Go Back to Notes</a>
                </p>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>

</html>