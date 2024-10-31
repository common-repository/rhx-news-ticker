<?php
/**
 * Plugin Name: RHX News Ticker
 * Description: News Headline Ticker is a wordpress plugin to display breaking or latest news in your website!  Use this shortcode <strong>[rhxnews-ticker]</strong> in the post/page" where you want to display latest or breaking news.
 * Plugin URI: https://wordpress.org/plugins/rhx-news-ticker/
 * Author: Rihan Habib
 * Author URI: https://www.facebook.com/rihan.zihad/
 * Version: 1.0
 * License: GPL2 or later
 * License URI: license.txt
 * Text Domain: rhxnews-ticker
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

require_once 'includes/frontend-control.php';

require_once 'includes/dynamic-style.php';


/**
 * The main plugin class
 */
final class RhxNews_Ticker {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0';

    /**
     * Class construcotr
     */
    private function __construct() {

        $this->define_constants();

        register_activation_hook( __FILE__, [ $this, 'activate' ] );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Initializes a singleton instance
     *
     * @return \RhxNews_Ticker
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'RHXN_TICKER_VERSION', self::version );
        define( 'RHXN_TICKER_FILE', __FILE__ );
        define( 'RHXN_TICKER_PATH', __DIR__ );
        define( 'RHXN_TICKER_URL', plugins_url( '', RHXN_TICKER_FILE ) );
        define( 'RHXN_TICKER_ASSETS', RHXN_TICKER_URL . '/assets' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {

        new RhxNews\Ticker\Assets();

        if ( is_admin() ) {
            new RhxNews\Ticker\Admin();
        } else {
            new RhxNews\Ticker\Frontend();
        }

    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installer = new RhxNews\Ticker\Installer();
        $installer->run();
    }
}

/**
 * Initializes the main plugin
 *
 * @return \RhxNews_Ticker
 */
function rhxnews_ticker() {
    return RhxNews_Ticker::init();
}

// kick-off the plugin
rhxnews_ticker();
