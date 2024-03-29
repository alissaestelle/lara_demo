<!DOCTYPE html>
<html lang="en">
<?php include basePath('views/partials/header.php'); ?>

<body class="h-full">
    <?php include basePath('views/partials/nav.php'); ?>
    <?php include basePath('views/partials/banner.php'); ?>
    <div class="min-h-full">
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <!-- <p>This is the Notes Page.</p> -->
                <?php if (!empty($notes)): ?>
                <ul>
                    <?php foreach ($notes as $n): ?>
                    <?php
                    extract($n);
                    $noteID = $id;
                    ?>
                    <li>
                        <a href="/note?id=<?= $noteID ?>"
                           class="text-blue-500 hover:underline">
                            <?= htmlspecialchars($title) ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <div class="col-start-2 col-span-1 mt-6 flex items-center gap-x-4">
                    <button
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a
                           href="/note/create">Create Note</a></button>
                </div>
            </div>
        </main>
    </div>
</body>

</html>

<!-- Note: htmlspecialchars() converts HTML tags to string form. -->