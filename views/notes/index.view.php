<!DOCTYPE html>
<html lang="en">
<?php include basePath('views/partials/header.php'); ?>

<body class="h-full">
    <div class="min-h-full">
        <?php include basePath('views/partials/nav.php'); ?>
        <?php include basePath('views/partials/banner.php'); ?>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <!-- <p>This is the Notes Page.</p> -->
                <?php if (!empty($notes)): ?>
                <ul>
                    <?php foreach ($notes as $n): ?>
                    <?php
                    $noteID = $n['id'];
                    $title = $n['title'];
                    $body = $n['body'];
                    ?>
                    <li>
                        <a href="/note?id=<?= $noteID ?>"
                           class="text-blue-500 hover:underline">
                            <?= htmlspecialchars($title) ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <p class="mt-6">
                    <a href="/note/create"
                       class="text-blue-500 hover:underline">↳ Create Note</a>
                </p>
            </div>
        </main>
    </div>
</body>

</html>

<!-- Note: htmlspecialchars() converts HTML tags to string form. -->