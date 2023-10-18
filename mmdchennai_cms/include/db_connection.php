<?php
date_default_timezone_set('Asia/Calcutta');
error_reporting(0);
// define("DB_HOST", "localhost:3307");
// define("DB_USER", "root");
// define("DB_PASSWORD", "");
// define("DB_DATABASE", "niot");

$host        = "host=localhost";
// $host        = "host=10.163.0.195";
$port        = "port=5432";
$dbname      = "dbname=mmdchennai";
$credentials = "user=postgres password='postgres'";

$db = pg_connect("$host $port $dbname $credentials");


if (!$db) {
    die("Connection failed: ");
}



// session_start();

// ini_set('session.cookie_httponly', 1);

// ini_set('session.use_only_cookies', 1);

// ini_set('session.cookie_secure', 1);
// header("Set-Cookie: niotadmin ; expires=Tue, 17-May-12 14:39:58 GMT;path=/; domain=164.100.167.195");



// header('X-Content-Type-Options: nosniff');

// header("X-XSS-Protection: 1; mode=block");

// header('Strict-Transport-Security: max-age=7776000 includeSubDomains');

// header("X-Frame-Options: SAMEORIGIN");

// header("Cross-Origin-Embedder-Policy: require-corp");

// header("Cross-Origin-Opener-Policy: same-origin");

// header("Cross-Origin-Resource-Policy: same-origin");


// header("Content-Security-Policy: default-src 'self';object-src 'none';frame-ancestors 'none';upgrade-insecure-requests;block-all-mixed-content");

// header("Content-Security-Policy: frame-src https://164.100.167.195/");

// header("Content-Security-Policy: manifest-src https://164.100.167.195/");

// header("Content-Security-Policy: connect-src https://164.100.167.195/");

// header("Content-Security-Policy: font-src https://164.100.167.195/");

// header("Content-Security-Policy: img-src https://164.100.167.195/");

// header("Content-Security-Policy: media-src https://164.100.167.195/");

// header("Referrer-Policy: strict-origin-when-cross-origin");

// $allowed_host = array('164.100.167.195');

// if (!isset($_SERVER['HTTP_HOST']) || !in_array($_SERVER['HTTP_HOST'], $allowed_host)) {
//   header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request');
//   exit;
// }
