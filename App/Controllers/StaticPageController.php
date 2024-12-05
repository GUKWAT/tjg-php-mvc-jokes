<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        StaticPageController.php
 * Location:
 * Project:         tjg-PHP-MVC-Jokes
 * Date Created:    DD/MM/YYYY
 *
 * Author:          YOUR NAME <STUDENT_ID@tafe.wa.edu.au>
 *
 */

namespace App\Controllers;


use Framework\Database;

class StaticPageController
{
    protected $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /*
     * Show the home page
     *
     * @return void
     */
    public function index()
    {
        // TODO: Crete the method code for the home page
<<<<<<< HEAD
        $jokes = $this->db->query('SELECT * FROM jokes ORDER BY created_at DESC LIMIT 6')->fetchAll();

        $jokeCount = $this->db->query('SELECT count(id) as total FROM jokes ')->fetch();

        $randomJoke = $this->db->query('SELECT * FROM jokes ORDER BY RAND() LIMIT 1')->fetch();

        $userCount = $this->db->query('SELECT count(id) as total FROM users')->fetch();

        $categoryCount = $this->db->query('SELECT count(id) as total FROM categories')->fetch();

        loadView('home', [
            'jokes' => $jokes,
            'jokeCount' => $jokeCount,
            'randomJoke' => $randomJoke,
            'categoryCount' => $categoryCount,
            'userCount' => $userCount,
        ]);
=======
        echo"<h1>CODE INSTALLED CORRECTLY</h1>";
        echo"<p>Time to work on the rest of the application</p>";

        $joke = $db->query("SELECT * FROM jokes ORDER BY RAND() LIMIT 1");









>>>>>>> 497d26a37712ea2a2074bd1f5c05cd6ffa35d61b

    }

    /*
     * Show the about static page
     *
     * @return void
     */
    public function about()
    {
        loadView('about');
    }
}