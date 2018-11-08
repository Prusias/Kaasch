<?php
    define('RUN_MODE_PRODUCTION', false);

    function get_document_root() {
        if(RUN_MODE_PRODUCTION === true) {
            return $_SERVER["DOCUMENT_ROOT"];
        }
<<<<<<< Updated upstream
        return 'C:\xampp\htdocs\jaar1\project\Kaasch';
=======
        return 'C:\Xampp\htdocs\kaasch';
>>>>>>> Stashed changes
    }
    function get_relative_root() {
        if(RUN_MODE_PRODUCTION === true) {
            return "";
        }
<<<<<<< Updated upstream
        return "/jaar1/project/kaasch";
=======
        return "\kaasch";
>>>>>>> Stashed changes
    }
?>
