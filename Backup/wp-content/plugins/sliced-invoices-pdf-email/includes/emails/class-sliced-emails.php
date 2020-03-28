<?php
// Exit if accessed directly
if ( ! defined('ABSPATH') ) { exit; }

class Sliced_Emails {

	/**
	 * @var  object  Instance of this class
	 */
	protected static $instance;


    public function __construct() {

	    add_filter( 'sliced_email_attachment', array( $this, 'maybe_attach_pdf' ), 10, 2 );
	    add_action( 'sliced_after_send_email', array( $this, 'maybe_remove_pdf' ), 10, 1 );

	}

    public static function get_instance() {
		if ( ! ( self::$instance instanceof self ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}


	/**
	 * Create the PDF, store in upload dir and return it.
	 *
	 * @since 1.0.0
	 */
	public function maybe_attach_pdf( $attachment = null, $id ) {

		if ( ! isset( $id ) )
			return;

		if ( isset( $_POST['accept-quote'] ) )
            return;

		$type = sliced_get_the_type( $id );

		if ( $type == 'invoice' || $type == 'quote' ) {

			do_action( 'sliced_before_request_pdf' );
			
			$pdf_options = get_option( 'sliced_pdf' );
			if ( $pdf_options && isset( $pdf_options['mode'] ) && $pdf_options['mode'] === 'slow' ) {
				$html = Sliced_Shared::request_data( add_query_arg( array( 'create' => 'pdf', 'id' => $id ), sliced_get_the_link( $id ) ) );
			} else {
				$html = Sliced_Pdf::get_html( $id );
			}
			
			$upload_dir = wp_upload_dir();
			$attachment = trailingslashit( $upload_dir['path'] ) . sliced_get_filename( $id );
			$mpdf 		= Sliced_Pdf::init_pdf( $id, $html, $attachment, 'F', false ); 
			return $attachment  . '.pdf';

		}
		return null;

	}


	/**
	 * Deletes the PDF from the uploads folder
	 *
	 * @since 1.0.0
	 */
	public function maybe_remove_pdf( $id ) {

		$type = sliced_get_the_type( $id );

		if ( $type == 'invoice' || $type == 'quote' ) {

			$uploads = wp_upload_dir();
			$attachment = trailingslashit( $uploads['dir'] ) . sliced_get_filename( $id ) . '.pdf';

			if ( file_exists( $attachment ) ) {
				@unlink( $attachment );
			} 
			else {
				$attachment = $_SERVER["DOCUMENT_ROOT"] . '/' . $_SERVER["SERVER_NAME"] . $_SERVER["CONTEXT_PREFIX"] . '/';
				$attachment .= trailingslashit( wp_basename( content_url() ) );
				$attachment .= trailingslashit( wp_basename( $uploads['baseurl'] ) );
				$attachment .= sliced_get_filename( $id ) . '.pdf';
				@unlink( $attachment );
			}
			
		}

	}


}