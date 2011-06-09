<?php
    // Instantiate the FirstFriday object
    include('./FirstFriday.php'); $ff = new FirstFriday();
?>

<p>First Friday formatted: <?php echo($ff->firstFriday()); ?></p>

<p>First Friday timestamp: <?php echo($ff->firstFriday(false)); ?></p>