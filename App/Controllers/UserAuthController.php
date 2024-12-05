<?php
/**
 * UserAuth Controller
 *
 * Provides the Register, Login and Logout capabilities
 * of the application
 *
 * Filename:        UserAuthController.php
 * Location:        App/Controllers
 * Project:         tjg-PHP-MVC-Jokes
 * Date Created:    DD/MM/YYYY
 *
 * Author:          YOUR NAME <20095319@tafe.wa.edu.au>
 *
 */

namespace App\Controllers;

use Framework\Database;
use Framework\Session;
use Framework\Validation;

class UserAuthController
{

    /* Properties */

    /**
     * @var Database
     */
    protected $db;

    /**
     * UserAuthController Constructor
     *
     * Instantiate the database connection for use in this class
     * storing the connection in the protected <code>$db</code>
     * property.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Show the login page
     *
     * @return void
     */
    public function login()
    {
        loadView('usersAuth/login');
    }

    /**
     * Show the register page
     *
     * @return void
     */
    public function create()
    {
        loadView('usersAuth/create');
    }

    /**
     * Store user in database
     *
     * @return void
     */
    public function store()
    {
        $givenName = $_POST['given_name'] ?? null;
        $familyName = $_POST['family_name'] ?? null;
<<<<<<< HEAD
        $nickName = $_POST['nick_name'] ?? $givenName;
=======
        $nickName = $_POST['nickname'] ?? $givenName;
>>>>>>> 497d26a37712ea2a2074bd1f5c05cd6ffa35d61b
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $passwordConfirmation = $_POST['password_confirmation'] ?? null;
<<<<<<< HEAD
=======
        $createdAt = $_POST['created_at'] ?? null;
        $updatedAt = $_POST['updated_at'] ?? null;
        $userId = $_POST['user_id'] ?? null;

>>>>>>> 497d26a37712ea2a2074bd1f5c05cd6ffa35d61b
        $errors = [];

        // Validation
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email address';
        }

        if (!Validation::string($givenName, 2, 50)) {
            $errors['given_name'] = 'Given Name must be between 2 and 50 characters';
        }

        if (!Validation::string($familyName, 0, 50)) {
            $errors['family_name'] = 'Family Name is optional';
        }
        if (!Validation::string($nickName, 2, 50)) {
            $errors['nick_name'] = 'Nickname must be between 2 and 50 characters';
        }

        if (!Validation::string($password, 6, 50)) {
            $errors['password'] = 'Password must be at least 6 characters';
        }

        if (!Validation::match($password, $passwordConfirmation)) {
            $errors['password_confirmation'] = 'Passwords do not match';
        }



        if (!empty($errors)) {
            loadView('usersAuth/create', [
                'errors' => $errors,
                'user' => [
                    'given_name' => $givenName,
                    'family_name' => $familyName,
                    'email' => $email,
<<<<<<< HEAD
                    'nick_name' => $nickName,
=======
                    'nickname' => $nickName,
>>>>>>> 497d26a37712ea2a2074bd1f5c05cd6ffa35d61b
                    'password' => $password,

                ]
            ]);
            exit;
        }

        // Check if email exists
        $params = [
            'email' => $email
        ];

        $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();


        if ($user) {
            $errors['email'] = 'That email already exists';
            loadView('usersAuth/create', [
                'errors' => $errors
            ]);
            exit;
        }

        // Create user account
        $params = [
<<<<<<< HEAD

=======
            'nickname' => $nickName,
>>>>>>> 497d26a37712ea2a2074bd1f5c05cd6ffa35d61b
            'given_name' => $givenName,
            'family_name' => $familyName,
            'nick_name' => $nickName,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
<<<<<<< HEAD

        ];

        $this->db->query('INSERT INTO users (given_name, family_name, nick_name, email, user_password) VALUES (:given_name, :family_name, :nick_name, :email, :password)', $params);
=======
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
            'user_id' => $userId
        ];

        $this->db->query('INSERT INTO users (nick_name, given_name, family_name, email, user_password, created_at, updated_at, user_id) VALUES (:nick_name, :given_name, :family_name, :email, :password, :created_at, :updated_at, :user_id)', $params);
>>>>>>> 497d26a37712ea2a2074bd1f5c05cd6ffa35d61b

        // Get new user ID
        $userId = $this->db->conn->lastInsertId();

        // Set user session
        Session::set('user', [
            'id' => $userId,
            'given_name' => $givenName,
            'family_name' => $familyName,
            'email' => $email,
        ]);

        redirect('/');
    }

    /**
     * Logout a user and kill session
     *
     * @return void
     */
    public function logout()
    {
        Session::clearAll();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 86400, $params['path'], $params['domain']);

        redirect('/');
    }

    /**
     * Authenticate a user with email and password
     *
     * @return void
     */
    public function authenticate()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = [];

        // Validation
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email';
        }

        if (!Validation::string($password, 6, 255)) {
            $errors['password'] = 'Password must be at least 6 characters';
        }

        // Check for errors
        if (!empty($errors)) {
            loadView('usersAuth/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // Check for email
        $params = [
            'email' => $email
        ];

        $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();

        if (!$user) {
            $errors['email'] = 'Incorrect credentials';
            loadView('usersAuth/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // Check if password is correct

        if (!password_verify($password, $user->user_password)) {
            $errors['email'] = 'Incorrect credentials *';
            loadView('usersAuth/login', [
                'errors' => $errors
            ]);
            exit;
        }

        // Set user session
        Session::set('user', [
            'id' => $user->id,
            'given_name' => $user->given_name,
            'family_name' => $user->family_name,
            'email' => $user->email,
        ]);

        redirect('/');
    }
}