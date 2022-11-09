
<?=template_header('Create')?>

<div class="content update">
    <h2>Create IdRegistration</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">
        <label for="firstname">FirstName</label>
        <input type="text" name="firstname" placeholder="John" id="name">
        <label for="lastname">LastName</label>
        <input type="text" name="lastname" placeholder="Doe" id="lastname">
        <label for="idNo">IDNo</label>
        <input type="text" name="idNo" placeholder="2025550143" id="idNo">
        <label for="birthday">Birthday</label>
        <input type="date" name="birthday" placeholder="" id="birthday">
        <label for="address">Address</label>
        <input type="text" name="address" placeholder="Mabayan st." id="address">
        <label for="course">Course</label>
        <input type="text" name="course" placeholder="Information Technology" id="course">
        <label for="emrgncycontact">EmergencyContact</label>
        <input type="text" name="emrgncycontact" placeholder="Mabayan st." id="emrgncycontact">
        <label for="created">EmergencyNumber</label>
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