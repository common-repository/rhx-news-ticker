<?php

namespace RhxNews\Ticker\Admin;


/**
 * The Menu handler class
 */
if (!class_exists('Menu'))
{
    class Menu
    {
        public $rhxmain_setting;

        /**
         * Initialize the class
         */
        function __construct($rhx_setting)
        {
            $this->rhxmain_setting = $rhx_setting;

            add_action("admin_menu", [$this, "admin_menu"]);
        }

        /**
         * Register admin menu
         *
         * @return void
         */
        public function admin_menu()
        {
            $parent_slug = "rhxnews-ticker";
            $capability = "manage_options";

            $hook = add_menu_page(__("RHX News Ticker", "rhxnews-ticker") , __("RHX News Ticker", "rhxnews-ticker") , $capability, $parent_slug, [$this->rhxmain_setting, "settings_page"], "dashicons-format-aside");


            add_action( 'admin_head-' . $hook, [ $this, 'enqueue_assets' ] );

        }


        /**
         * Enqueue scripts and styles
         *
         * @return void
         */
        public function enqueue_assets() {
            wp_enqueue_style( 'academy-admin-style' );
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
            wp_enqueue_script('academy-cpactive-script');
        }
    }
}

