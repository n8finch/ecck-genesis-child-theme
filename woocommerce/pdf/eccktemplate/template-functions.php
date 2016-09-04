<?php
/**
 * Use this file for all your template filters and actions.
 * Requires WooCommerce PDF Invoices & Packing Slips 1.4.13 or higher
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


add_action('ecck_pdf_init_action_hook', 'get_ecck_info_for_pdf' );

function get_ecck_info_for_pdf() {


	$person_in_charge = get_post_meta( $wpo_wcpdf->export->order->id, '_wc_acof_2', true );
	$ecck_committee   = get_post_meta( $wpo_wcpdf->export->order->id, '_wc_acof_4', true );

	echo $ecck_committee;


	switch ( $person_in_charge ) {
		case hyokyungsuh:
			$person_in_charge = 'Hyokyung Suh 02-6261-2716 hyokyung.suh@ecck.eu';
			break;
		case in - seungkay:
			$person_in_charge = 'In-Seung Kay 02-6261-2715 inseung.kay@ecck.eu';
			break;
		case ansookpark:
			$person_in_charge = 'Jeongjin Lim 02-6261-2713 jeongjin.lim@ecck.eu';
			break;
		case jiyunchoi:
			$person_in_charge = 'Jiyun Choi 02-6261-2714 jiyun.choi@ecck.eu';
			break;
		case seonghwanjeon:
			$person_in_charge = 'Seonghwan Jeon 02-6261-2709 seonghwan.jeon@ecck.eu';
			break;
		case sven - erikbatenburg:
			$person_in_charge = 'Sven-Erik Batenburg 02-6261-2706 sven.batenburg@ecck.eu';
			break;
		case youngshinahn:
			$person_in_charge = 'Youngshin Ahn 051-959-9696 youngshin.ahn@ecck.eu';
			break;
		default:
			$person_in_charge = 'Herena Oh';
			break;
	}

}
