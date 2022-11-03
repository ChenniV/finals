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
    $address = isset($_POST['address']) ? $_POST['adress'] : '';
    $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
    $course = isset($_POST['course']) ? $_POST['course'] : '';
    $emrgncycontact = isset($_POST['emrgncycontact']) ? $_POST['emrgncycontact'] : '';
    $emrgncynum = isset($_POST['emrgncynum']) ? $_POST['emrgncynum'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO IdRegistration VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $firstname, $lastname, $idNo, $address, $birthday, $course, $emrgncycontact, $emrgncynum, $created]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create')?>

<div class="content update">
    <h2>Create IdRegistration</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <label for="firstname">FirstName</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">
        <input type="text" name="firstname" placeholder="John" id="name">
        <label for="lastname">LastName</label>
        <label for="idNo">IDNo</label>
        <input type="text" name="lastname" placeholder="Doe" id="lastname">
        <input type="text" name="idNo" placeholder="2025550143" id="idNo">
        <label for="address">Adress</label>
        <label for="course">Course</label>
        <input type="text" name="address" placeholder="Mabayan st." id="address">
        <input type="text" name="course" placeholder="Information Technology" id="course">
        <label for="emrgncycontact">EmergencyContact</label>
        <label for="created">EmergencyNumber</label>
        <input type="text" name="emrgncycontact" placeholder="Mabayan st." id="emrgncycontact">
        <input type="text" name="emrgncynum" placeholder="Information Technology" id="emrgncynum">
        <label for="created">Created</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>