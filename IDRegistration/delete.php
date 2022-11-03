<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM IdRegistration WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $IdRegistration = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$IdRegistration) {
        exit('IdRegistration doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['IdRegistration'])) {
        if ($_GET['IdRegistration'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM IdRegistration WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the IdRegistration!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Delete')?>

<div class="content delete">
    <h2>Delete IdRegistration #<?=$IdRegistration['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
    <p>Are you sure you want to delete IdRegistration #<?=$IdRegistration['id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$IdRegistration['id']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$IdRegistration['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>