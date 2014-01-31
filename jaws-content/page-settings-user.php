<?php jaws_header(); 
if(isset($_POST['user-submit'])) {
    if (isset($_POST['user-ssn']) && preg_match("$\d{2,4}-?\d{2}-?\d{2}-?\d{4}$", $_POST['user-ssn']) &&
        isset($_POST['user-mail']) && preg_match("$[a-z0-9åäöÅÄÖ._%+-]+[a-zåäöÅÄÖ0-9]+@[a-z0-9.-]+\.[a-z]{2,4}$", $_POST['user-mail']) &&
        isset($_POST['user-first-name']) && preg_match("$\w+$", $_POST['user-first-name']) &&
        isset($_POST['user-last-name']) && preg_match("$\w+$", $_POST['user-last-name']) &&
        isset($_POST['user-phone']) && preg_match("$(46|\+46|0)(-?\s?[0-9]+)+$", $_POST['user-phone'])) {
        
        // Check if user is trying to save a new password
        if (isset($_POST['user-new-password']) && preg_match("$[a-zA-ZåäöÅÄÖ0-9]{6,30}$", $_POST['user-new-password']) &&
            isset($_POST['user-old-password']) && preg_match("$[a-zA-ZåäöÅÄÖ0-9]{6,30}$", $_POST['user-new-password'])){
            
            if (true) { //Match old password with database
                if(true) {// Save user with new password to db
                    registerError("Your profile with your new password has been saved.","success");
                    redirect();
                } else {
                    registerError("Error while saving profile.");
                    redirect();
                }
            } else {
                registerError("Your password didn't match the one stored in database");
                redirect();
            }
        } else { // When user didn't change password
            if (true) { // Save user to database, 
                registerError('Your profile has been saved','success');
                redirect(); 
            } else {
                registerError("Error while saving profile", "danger");
                redirect();
            }
        }
    } else {
        showError("Your inputs must match the specified format", "danger");
    }
}?>
    <?php
        listEditProfile();
    ?>

<?php jaws_footer(); ?>