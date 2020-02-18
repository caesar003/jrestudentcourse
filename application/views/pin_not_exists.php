<?php include 'inc/header.php';?>
<div class="container">
    <h2>Oooops!</h2>
    <p>Not a single record in our database matches your request. You might want to :</p>
    <ol>
        <li>Check your spelling.</li>
        <li>Add the student with pin <em><?php echo $pin;?></em> into the database. </li>
    </ol>
</div>
<?php include 'inc/footer.php';?>
<?php include 'inc/chat_dialog.php';?>
<?php include 'inc/scripts.php';?>
<?php include 'inc/chat-script.php';?>