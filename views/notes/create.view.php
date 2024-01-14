<!DOCTYPE html>
<html lang="en">
<?php include 'views/partials/header.php'; ?>
<?php
$title = $_POST['title'] ?? '';
$body = $_POST['body'] ?? '';
?>


<body class="h-full">
    <div class="min-h-full">
        <?php include 'views/partials/nav.php'; ?>
        <?php include 'views/partials/banner.php'; ?>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <form method="POST">
                    <div class="space-y-12">
                        <div class="grid grid-cols-1 gap-x-8 gap-y-4 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                            <div>
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Create</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">
                                    New notes will be added to your notes index.</p>
                            </div>

                            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                                <div class="sm:col-span-4">
                                    <label for="title"
                                           class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                                    <div class="mt-2">
                                        <div
                                             class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <span
                                                  class="flex select-none items-center pl-3 text-gray-500 sm:text-sm"></span>
                                            <input type="text"
                                                   id="title"
                                                   name="title"
                                                   value="<?= $title ?>"
                                                   class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                   placeholder="Add Title Here">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-full">
                                    <label for="body"
                                           class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                    <div class="mt-2">
                                        <textarea id="body"
                                                  name="body"
                                                  rows="3"
                                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $body ?></textarea>
                                    </div>
                                    <?php if ($alert) : ?>
                                    <p class="<?= toggleColor($alert) ?> mt-4">
                                        <?= $alert ?></p>
                                    <?php endif; ?>
                                    <p class="mt-3 text-sm leading-6 text-gray-600">
                                        Shower thoughts, a long item list,
                                        daily reminders, etc.</p>
                                </div>
                            </div>
                            <div class="col-start-2 col-span-1 mt-6 flex items-center gap-x-6">
                                <button type="button"
                                        class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                                <button type="submit"
                                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>