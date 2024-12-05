<?php
// Include the helper file where loadPartial function is defined
include_once __DIR__ . '/../helpers.php'; // Adjusted path

/**
 * Home Page View
 *
 * Filename:        home.view.php
 * Location:        /App/views
 * Project:         tjg-PHP-MVC-Jokes
 * Date Created:    23/08/2024
 *
 * Author:          Tadiwanashe Gukwa <20095319@tafe.wa.edu.au>
 */

// Load header and navigation partials
loadPartial('header');
loadPartial('navigation');
?>

<main>S
    <section class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg">
        <article>
            <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 text-2xl font-bold mb-8">
                <h1>Tadiwanashe's Joke DB</h1>
            </header>
        </article>
        <section class="my-8 flex flex-wrap gap-8 justify-center">
            <article class="max-w-96 min-w-64 bg-white shadow rounded p-2 flex flex-col">
                <header class="-mx-2 bg-zinc-700 text-zinc-200 text-lg p-4 -mt-2 mb-4 rounded-t flex-0">
                    <p>This application shows a random joke to non-authentic who are not registered
                        and shows the list of all jokes to authenticated users.
                    </p>
                </header>
            </article>
        </section>

        <section class="my-8 flex flex-wrap gap-8 justify-center">
            <article class="max-w-96 min-w-64 bg-white shadow rounded p-2 flex flex-col">
                <header class="-mx-2 bg-zinc-700 text-zinc-200 text-lg p-4 -mt-2 mb-4 rounded-t flex-0">
                    <h2>Programming Languages</h2>
                    <p>PHP, HTML, CSS, JavaScript</p>
                    <h2>Servers</h2>
                    <p>Apache HTTP Server, Nginx, Laragon</p>
                    <h2>Supporting Systems</h2>
                    <p>MySQL, PHP</p>
                </header>
            </article>
        </section>
    </section>
</main>

<?php
// Load footer partial
loadPartial('footer');
?>
