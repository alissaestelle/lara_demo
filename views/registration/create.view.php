<!DOCTYPE html>
<html lang="en"
      class="h-full bg-white">
<?php include basePath('views/partials/header.php'); ?>

<body class="h-full">
    <?php include basePath('views/partials/nav.php'); ?>

    <div class="flex flex-col justify-center px-6 py-8 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto"
                 src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                 alt="Your Company">
            <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create New Entry
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-4"
                  action="/register"
                  method="POST">
                <div>
                    <label for="firstName"
                           class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                    <div class="mt-2">
                        <input id="firstName"
                               name="firstName"
                               autocomplete="firstName"
                               required
                               value="<?= old('FNAME') ?? '' ?>"
                               placeholder="First Name"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="lastName"
                           class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
                    <div class="mt-2">
                        <input id="lastName"
                               name="lastName"
                               autocomplete="lastName"
                               required
                               value="<?= old('LNAME') ?? '' ?>"
                               placeholder="Last Name"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <label for="email"
                           class="block text-sm font-medium leading-6 text-gray-900">Email Address</label>
                    <div class="mt-2">
                        <!-- <input id="email"
                               name="email"
                               type="email"
                               autocomplete="email"
                               required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"> -->
                        <input id="email"
                               name="email"
                               autocomplete="email"
                               value="<?= old('EMAIL') ?>"
                               placeholder="Email Address"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <p class="<?= toggleColor() ?> mt-2"><?= filterErr($errors, 'email') ?></p>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password"
                               class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#"
                               class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <!-- <input id="password"
                               name="password"
                               type="password"
                               autocomplete="current-password"
                               required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"> -->
                        <input id="password"
                               name="password"
                               type="password"
                               autocomplete="current-password"
                               placeholder="Password"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <p class="<?= toggleColor() ?> mt-2"><?= filterErr($errors, 'password') ?></p>
                    </div>
                </div>
                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 mt-10 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
                    <p class="<?= toggleColor() ?> mt-2"><?= filterErr($errors, 'auth') ?>
                </div>
            </form>
        </div>
    </div>

</body>

</html>