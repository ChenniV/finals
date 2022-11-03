<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $idNo = isset($_POST['idNo']) ? $_POST['idNo'] : '';
        $address = isset($_POST['address']) ? $_POST['adress'] : '';
        $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
        $course = isset($_POST['course']) ? $_POST['course'] : '';
        $emrgncycontact = isset($_POST['emrgncycontact']) ? $_POST['emrgncycontact'] : '';
        $emrgncynum = isset($_POST['emrgncynum']) ? $_POST['emrgncynum'] : '';
        $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
        // Update the record
        $stmt = $pdo->prepare('UPDATE contacts SET id = ?, firstname = ?, lastname = ?, idNo = ?, address = ?, birthday = ?, course = ?, emrgncycontact = ?, emrgncynum = ? WHERE id = ?');
        $stmt->execute([$id, $firstname, $lastname, $idNo, $address, $birthday, $course, $emrgncycontact, $emrgncynum, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM IdRegistration WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>

<div class="content update">
    <h2>Update IdRegistration #<?=$IdRegistrationt['id']?></h2>
    <form action="update.php?id=<?=$IdRegistration['id']?>" method="post">
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
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>