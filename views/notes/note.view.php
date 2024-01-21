<!DOCTYPE html>
<html lang="en">
<?php include basePath('views/partials/header.php'); ?>
<?php
$nID = $n['id'] ?? '';
$title = $n['title'] ?? '';
$body = $n['body'] ?? '';
?>

<body class="h-full">
    <div class="min-h-full">
        <?php include basePath('views/partials/nav.php'); ?>
        <?php include basePath('views/partials/banner.php'); ?>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <?php if ($body): ?>
                <p class="mb-6"><?= htmlspecialchars($body) ?></p>
                <p>
                    <a href="/notes"
                       class="text-blue-500 hover:underline">↳ Go Back to Notes</a>
                </p>
                <form class="mt-6"
                      method="POST">
                    <input type="hidden"
                           name="_METHOD"
                           value="DELETE">
                    <input type="hidden"
                           name="id"
                           value="<?= $nID ?>">
                    <button class="text-blue-500 hover:underline">↳ Delete</button>
                </form>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>

</html>