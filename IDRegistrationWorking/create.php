<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $idNo = isset($_POST['idNo']) ? $_POST['idNo'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
    $course = isset($_POST['course']) ? $_POST['course'] : '';
    $emrgncycontact = isset($_POST['emrgncycontact']) ? $_POST['emrgncycontact'] : '';
    $emrgncynum = isset($_POST['emrgncynum']) ? $_POST['emrgncynum'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO idregistration VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $firstname, $lastname, $idNo, $address, $birthday, $course, $emrgncycontact, $emrgncynum, $created]);
    // Output message
    $msg = 'Created Successfully!';
}

?>
<? header("Location: http://localhost/idregistration/idregistrationformfill.html") ?>
