<?php

namespace PRSSD\App\Attachments;

use PRSSD\App\Interfaces\WordPressHooks;

/**
 * Class Media
 *
 * @package PRSSD\App\Attachments
 */
class Media implements WordPressHooks {

    public function addHooks() {
        add_action( 'init', [ $this, 'addImageSizes' ] );
        add_filter( 'upload_mimes', [ $this, 'mimeTypes' ] );
        add_filter( 'wp_check_filetype_and_ext', [ $this, 'checkFiletype' ], 10, 4 );
        add_action( 'admin_head', [ $this, 'svgFix' ] );
    }

    /**
     * Register new image sizes
     *
     * Use this method to register additional image sizes in the theme
     *
     * @since 1.0.1
     */
    public function addImageSizes() {
        add_image_size( 'featured-large', 1440, 9999 );
    }

    /**
     * Retrieve an image to represent an attachment and return the attachment object of the image
     *
     * @param $attachment_id
     *
     * @return object
     */
    public static function getAttachmentByID( $attachment_id ) {
        $attachment = acf_get_attachment( $attachment_id );

        return (object) $attachment;
    }

    /**
     * @param $data
     * @param $file
     * @param $filename
     * @param $mimes
     *
     * @return array
     */
    public function checkFiletype( $data, $file, $filename, $mimes ) {
        $filetype = wp_check_filetype( $filename, $mimes );

        return [
            'ext'             => $filetype['ext'],
            'type'            => $filetype['type'],
            'proper_filename' => $data['proper_filename']
        ];
    }

    /**
     * @param $mimes
     *
     * @return mixed
     */
    public function mimeTypes( $mimes ) {
        $mimes['svg'] = 'image/svg+xml';

        return $mimes;
    }

    /**
     * Allow SVG images to render properly in the WordPress Dashboard
     */
    public function svgFix() {
        echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
    }
}