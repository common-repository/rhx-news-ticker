<?php

namespace RhxNews\Ticker;
include('Frontend/Shortcode.php');
/**
 * Frontend handler class
 */
if (!class_exists('Frontend')){
class Frontend {

    /**
     * Initialize the class
     */
    function __construct() {
        new Frontend\Shortcode();
    }
}
}
