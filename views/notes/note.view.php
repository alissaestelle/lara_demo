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
                <!-- <p>
                    <a href="/notes"
                       class="text-blue-400 hover:underline">↳ Go Back to Notes</a>
                </p> -->
                <!-- <div class="mt-6">
                    <a href="note/edit"
                       class="text-blue-700 hover:underline">↳ Edit</button>
                </div> -->
                <div class="col-start-2 col-span-1 mt-6 flex items-center gap-x-4">
                    <button
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a
                           href="note/edit?id=<?= $nID ?>">Edit</a></button>
                    <form method="POST">
                        <input type="hidden"
                               name="_METHOD"
                               value="DELETE">
                        <input type="hidden"
                               name="id"
                               value="<?= $nID ?>">
                        <button
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
                    </form>
                    <button
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a
                           href="/notes">Back to Notes</a></button>
                </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>

</html>