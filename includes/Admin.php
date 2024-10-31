<?php

namespace RhxNews\Ticker;

// Include Menu file
require_once __DIR__ . "/Admin/Settings.php";

if (!class_exists('Admin'))
{
    class Admin
    {
        /**
         * Initialize the class
         */
        function __construct()
        {
            $rhx_setting = new Admin\Setting();

            new Admin\Menu($rhx_setting);
        }
    }
}
