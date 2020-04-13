<?php

// Exit if accessed directly

if ( ! defined('ABSPATH') ) { exit; }



if ( ! function_exists( 'sliced_get_business_logo' ) ) :



	function sliced_get_business_logo() {

		$business = Sliced_Shared::get_business_details();

		return apply_filters( 'sliced_get_business_logo', $business['logo'], $business );

	}



endif;



if ( ! function_exists( 'sliced_get_business_name' ) ) :



	function sliced_get_business_name() {

		$business = Sliced_Shared::get_business_details();

		return apply_filters( 'sliced_get_business_name', $business['name'], $business );

	}



endif;


if ( ! function_exists( 'sliced_get_userid' ) ) :

	function sliced_get_userid() {

		$clientdetails = Sliced_Shared::get_client_details();
		return $clientdetails['id'];

	}

endif;

if ( ! function_exists( 'sliced_get_user_signature' ) ) :

	function sliced_get_user_signature() {
		//$clientdetails = Sliced_Shared::get_client_details();
		//return $clientdetails['signature_value'];
		$current_user = wp_get_current_user();
		return $current_user->signature_value;

	}

endif;



if ( ! function_exists( 'sliced_get_business_address' ) ) :



	function sliced_get_business_address() {

		$business = Sliced_Shared::get_business_details();

		return apply_filters( 'sliced_get_business_address', $business['address'], $business );

	}



endif;



if ( ! function_exists( 'sliced_get_business_extra_info' ) ) :



	function sliced_get_business_extra_info() {

		$business = Sliced_Shared::get_business_details();

		return apply_filters( 'sliced_get_business_extra_info', $business['extra_info'], $business );

	}



endif;





if ( ! function_exists( 'sliced_get_business_website' ) ) :



	function sliced_get_business_website() {

		$business = Sliced_Shared::get_business_details();

		return apply_filters( 'sliced_get_business_website', $business['website'], $business );

	}



endif;





if ( ! function_exists( 'sliced_get_business_footer' ) ) :



	function sliced_get_business_footer() {

		$business = Sliced_Shared::get_business_details();

		return apply_filters( 'sliced_get_business_footer', $business['footer'], $business );

	}



endif;

