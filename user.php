<?php
    require_once('utility.php');
    construct("User");
    echo'<h2>Page for User '.$_GET['id'].'</h2>';
    build_user($_GET['id']);
    build_footer();
?>