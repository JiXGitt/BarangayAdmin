<?php

// // Database credentials
// $config = [
//     'db' => [
//         'host' => 'localhost',
//         'dbname' => 'account',
//         'user' => 'root',
//         'password' => '',
//     ]
// ];



// added some comments to make it more readable and understandable
// ---------------------------WHITELIST----------------------------------------


// --------------------- PATHS --------------------------------------
// get the root directory of the project
const ROOT_DIR = __DIR__ . "/../..";


const ROOT_PATH = "/htdocs";
const VIEW_PATH = ROOT_DIR."/app/Views";
const TEMPLATE_PATH = ROOT_DIR."/app/Pages";
const LAYOUT_PATH = ROOT_DIR."/app/Pages/layouts";
const PUBLIC_PATH = ROOT_DIR."/public";

const LOGOUT = ROOT_PATH . "/auth/logout.php";
const LOGIN = ROOT_PATH . "/auth/login/index.php";

const PAGE3 = ROOT_PATH . "/page3";
const PAGE2 = ROOT_PATH . "/page2";
const LOGO = ROOT_PATH."/public/assets/img/Restaurant Food.png";

const ADMIN = ROOT_PATH . "/admin";

// ------------------ Accounts page PATHS ---------------------------------
const ACCOUNTS_PATH = [
    'index' => ROOT_PATH . "/admin/accounts/",
    'edit' => ROOT_PATH . "/admin/accounts/edit",
    'delete' => ROOT_PATH . "/admin/accounts/delete",
    'list' => ROOT_PATH . "/admin/accounts/list",
    'create' => ROOT_PATH . "/admin/accounts/create",
];


// --------------------- FORM CREDENTIALS --------------------------------------
const USERNAME = ['username', 'Username'];
const PASSWORD = ['password', 'Password'];

// add additional info here if you want to add more fields about the user login
