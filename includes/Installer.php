<?php

namespace RhxNews\Ticker;

/**
 * Installer class
 */
if (!class_exists('Installer')){
class Installer {

    /**
     * Run the installer
     *
     * @return void
     */
    public function run() {
        $this->add_version();

    }

    /**
     * Add time and version on DB
     */
    public function add_version() {
        $installed = get_option( 'rhxn_ticker_installed' );

        if ( ! $installed ) {
            update_option( 'rhxn_ticker_installed', time() );
        }

        update_option( 'rhxn_ticker_version', RHXN_TICKER_VERSION );
    }

}
}
