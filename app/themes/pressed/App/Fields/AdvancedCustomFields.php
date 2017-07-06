<?php

namespace PRSSD\App\Fields;

use PRSSD\App\Interfaces\WordPressHooks;

/**
 * Class AdvancedCustomFields
 *
 * addHooks()
 * registerACFSettingsPath()
 * registerACFSettingsDirectory()
 *
 * @package PRSSD\App
 */
class AdvancedCustomFields implements WordPressHooks {

    public function __construct() {
        // load ACF Fields
        require_once PRESSED_THEME_PATH . 'vendor/acf/acf.php';
    }

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_filter( 'acf/settings/path', [ $this, 'registerACFSettingsPath' ] );
        add_filter( 'acf/settings/dir', [ $this, 'registerACFSettingsDirectory' ] );
    }

    /**
     * customize ACF path
     *
     * @return string
     */
    public function registerACFSettingsPath() {
        // update path
        return PRESSED_THEME_PATH . 'vendor/acf/';
    }

    /**
     * customize ACF dir
     *
     * @return string
     */
    public function registerACFSettingsDirectory() {
        // update path
        return PRESSED_THEME_DIR_URI . 'vendor/acf/';
    }
}