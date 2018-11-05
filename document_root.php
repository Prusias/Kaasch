<?php
    define('RUN_MODE_PRODUCTION', false);

    function get_document_root() {
        if(RUN_MODE_PRODUCTION === true) {
            return $_SERVER["DOCUMENT_ROOT"];
        }
        return '/mnt/c/Users/Steven/Documents/webserver/kaasch';
    }
    function get_relative_root() {
        if(RUN_MODE_PRODUCTION === true) {
            return "";
        }
        return "/kaasch";
    }
?>
