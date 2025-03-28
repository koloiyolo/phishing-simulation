<?php 
include 'functions.php';
include 'database.php';

insert_record($_SERVER['REMOTE_ADDR'], $_SERVER['REMOTE_HOST']);
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <br/>
        <h1> 
            <?php echo get_translation('index_title'); ?> 
        </h1>
        <br/>
        <p> 
            <?php echo get_translation('index_content'); ?> 
        </p>
        <p>
            <?php echo $_SERVER['REMOTE_ADDR']; ?>
        </p>
        <p> 
            <?php echo get_translation('index_footer'); ?> 
        </p>
        <p> 
            <?php echo $_ENV["SIMULATION_CONTACT_MAIL"] . " / " . $_ENV["SIMULATION_CONTACT_PHONE"]; ?> 
        </p>
    </body>
</html>




