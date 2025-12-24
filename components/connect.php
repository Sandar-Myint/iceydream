<?php
$db_name = 'mysql:host=localhost;dbname=icecream_db';
$user_name = 'root';
$user_password = '';

// Attempt to establish PDO connection
$conn = new PDO($db_name, $user_name, $user_password);

// Simple connection check
if (!$conn) {
    echo "not connected"; // This check is simplistic; PDO throws an exception on failure by default
}


function unique_id() {
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLength = strlen($chars);
    $randomString = '';

    for ($i = 0; $i < 20; $i++) {
        // Concatenate a random character from the set
        $randomString .= $chars[mt_rand(0, $charLength - 1)];
    }

    return $randomString;
}

?>