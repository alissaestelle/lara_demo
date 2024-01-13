<!DOCTYPE html>
<html lang="en">
<?php include 'partials/header.php'; ?>

<body class="h-full">
    <div class="min-h-full">
        <?php include 'partials/nav.php'; ?>
        <?php include 'partials/banner.php'; ?>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <!-- <p>This is the Notes Page.</p> -->
                <?php if (!empty($notes)) : ?>
                <ul>
                    <?php foreach ($notes as $n) : ?>
                    <?php
                            $noteID = $n['id'];
                            $body = $n['body'];
                            ?>
                    <li>
                        <a href="/n?id=<?= $noteID ?>"
                           class="text-blue-500 hover:underline">
                            <?php // ↓ Converts HTML Tags to String Form 
                                    ?>
                            <?= htmlspecialchars($body) ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <p class="mt-6">
                    <a href="/notes/create"
                       class="text-blue-500 hover:underline">Create Note</a>
                </p>
            </div>
        </main>
    </div>
</body>

</html>