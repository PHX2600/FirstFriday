<?php
    // Instantiate the FirstFriday object
    include('./FirstFriday.php'); $ff = new FirstFriday();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>FirstFriday Example Page</title>
    <style type="text/css">
        html { font-size: 100%; }
        body { color: #333; font-family:  Arial, Helvetica, Verdana, sans-serif; font-size: .8em; }
        h3 { font-size: 1em; font-weight: normal; text-transform: uppercase; }
        p { font-size: 1.25em; margin: 1em 2em 2em; }
    </style>
</head>

<body>
    
    <h3>Default Format</h3>
    <p><?php echo($ff->firstFriday()); ?></p>
    
    <h3>Custom Format</h3>
    <p><?php echo($ff->firstFriday(true, "Y-m-d")); ?></p>
    
    <h3>Timestamp</h3>
    <p><?php echo($ff->firstFriday(false)); ?></p>

</body>

</html>