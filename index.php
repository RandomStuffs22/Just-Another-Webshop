<?php   session_start();
        if(isset($_GET['logout'])) { 
            session_unset();
        };
        require_once($_SERVER['DOCUMENT_ROOT']."/jaws-includes/indexer.php");
        indexer();
?>