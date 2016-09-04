<?php global $wpo_wcpdf; ?>

	<!-- Temporary code -->
<?php

//Get the order subtotal for memberships so that VAT indications will be removed for Membership Invoices
$wc_order_totals_temp = $wpo_wcpdf->get_woocommerce_totals();
$ecck_order_subtotal = $wc_order_totals_temp['cart_subtotal']['value'];

//Get the completed order date for Completed orders
$completed_order_date = get_post_meta($wpo_wcpdf->export->order->id, '_order_complete_order_date', 'false');
$completed_order_date = preg_replace('/-/i', '', $completed_order_date);
$completed_order_date = date("F d, Y ", strtotime($completed_order_date));

//Get other variables needed to determine if statements
$ecck_income_type = get_post_meta( $wpo_wcpdf->export->order->id, '_wc_acof_3', true );
$person_in_charge = get_post_meta( $wpo_wcpdf->export->order->id, '_wc_acof_2', true );
$ecck_committee   = get_post_meta( $wpo_wcpdf->export->order->id, '_wc_acof_4', true );

switch ( $person_in_charge ) {
	case 'hyokyungsuh':
		$person_in_charge = 'Hyokyung Suh 02-6261-2716 <br/> hyokyung.suh@ecck.eu';
		break;
	case 'in-seungkay':
		$person_in_charge = 'In-Seung Kay 02-6261-2715 <br/> inseung.kay@ecck.eu';
		break;
	case 'ansookpark':
		$person_in_charge = 'An Sook Park 02-6261-2703 <br/> ansook.park@ecck.eu';
		break;
	case 'jiyunchoi':
		$person_in_charge = 'Jeonghyun Kim 02-6261-2714 <br/> jh.kim@ecck.eu';
		break;
	case 'jeonghyunkim':
		$person_in_charge = 'Jeonghyun Kim 02-6261-2714 <br/> jh.kim@ecck.eu';
		break;
	case 'seonghwanjeon':
		$person_in_charge = 'Seonghwan Jeon 02-6261-2709 <br/> seonghwan.jeon@ecck.eu';
		break;
	case 'sven-erikbatenburg':
		$person_in_charge = 'Sven-Erik Batenburg 02-6261-2706 <br/> sven.batenburg@ecck.eu';
		break;
	case 'youngshinahn':
		$person_in_charge = 'Youngshin Ahn 051-959-9696 <br/> youngshin.ahn@ecck.eu';
		break;
	case 'jeongjinlim':
		$person_in_charge = 'Jeongjin Lim 02-6261-2713 <br/> jeongjin.lim@ecck.eu';
		break;
	case 'hyemihwang':
		$person_in_charge = 'Hyemi Hwang 02-6261-2712 <br/> hyemi.hwang@ecck.eu';
		break;
	case 'seohyungkim':
		$person_in_charge = 'Seohyung Kim 02-6261-2713 <br/> seohyung.kim@ecck.eu';
		break;
	case 'chaheekim':
		$person_in_charge = 'Chahee Kim 02-6261-2711 <br/> chahee.kim@ecck.eu';
		break;
	case 'hongbiseo':
		$person_in_charge = 'Hong Bi Seo 02-6261-2711 <br/> hb.seo@ecck.eu';
		break;
	default:
		$person_in_charge = 'Haewon Jang 02-6261-2700 <br/> haewon.jang@ecck.eu';
		break;
}

switch ( $ecck_committee ) {
	case 'alternativeinvestment':
		$ecck_committee = 'Alternative Investment';
		break;
	case 'assetmanagement':
		$ecck_committee = 'Asset Management';
		break;
	case 'autoparts':
		$ecck_committee = 'Auto Parts';
		break;
	case 'banking':
		$ecck_committee = 'Banking';
		break;
	case 'beerwinesprits':
		$ecck_committee = 'Beer, Wine & Spirits';
		break;
	case 'chemicals':
		$ecck_committee = 'Chemicals';
		break;
	case 'cosmetics':
		$ecck_committee = 'Cosmetics';
		break;
	case 'eventbusan':
		$ecck_committee = 'Event Busan';
		break;
	case 'Event Seoul':
		$ecck_committee = 'Event Seoul';
		break;
	case 'fashionretail':
		$ecck_committee = 'Fashion & Retail';
		break;
	case 'financial Services':
		$ecck_committee = 'Financial Services';
		break;
	case 'foodbeverage':
		$ecck_committee = 'Food & Beverages';
		break;
	case 'healthcare':
		$ecck_committee = 'Healthcare';
		break;
	case 'heavydutycommercialvehicle':
		$ecck_committee = 'Heavy Duty Commercial Vehicle';
		break;
	case 'innovationfuturetechnology':
		$ecck_committee = 'Innovation & Future Technology';
		break;
	case 'insurance':
		$ecck_committee = 'Insurance';
		break;
	case 'intellectualpropertyright':
		$ecck_committee = 'Intellectual Property Right';
		break;
	case 'kitchenhomeappliance':
		$ecck_committee = 'Kitchen & Home Appliance';
		break;
	case 'legalcompliance':
		$ecck_committee = 'Legal & Compliance';
		break;
	case 'logisticstransport':
		$ecck_committee = 'Logistics & Transport';
		break;
	case 'marineshipbuilding':
		$ecck_committee = 'Marine & Shipbuilding';
		break;
	case 'passengervehicles':
		$ecck_committee = 'Passenger Vehicles';
		break;
	case 'publications':
		$ecck_committee = 'Publications';
		break;
	case 'realestate':
		$ecck_committee = 'Real Estate';
		break;
	case 'tires':
		$ecck_committee = 'Tires';
		break;
	case 'tobaccoworkinggroup':
		$ecck_committee = 'Tobacco Working Group';
		break;
	default:
		$ecck_committee = 'General';
		break;
}

?>

	<table class="head container">
		<tr>
			<td class="header" align="center">
				<?php
				if( $wpo_wcpdf->get_header_logo_id() ) {
					$wpo_wcpdf->header_logo();
				} else {
					echo apply_filters( 'wpo_wcpdf_invoice_title', __( 'Invoice', 'wpo_wcpdf' ) );
				}
				?>
			</td>
			<!-- Top Right Information -->
			<td class="order-data" style="width: 1px;">
				<table style="margin-top: 20px;">
					<?php do_action( 'wpo_wcpdf_before_order_data', $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order ); ?>
					<?php if ( isset($wpo_wcpdf->settings->template_settings['display_number']) && $wpo_wcpdf->settings->template_settings['display_number'] == 'invoice_number') { ?>

<!--						Invoice Number and Date where here-->

					<?php } ?>
					<!--				<tr class="order-number" align=right>-->
					<!--					<th>--><?php //_e( 'Order Number:', 'wpo_wcpdf' ); ?><!--</th>-->
					<!--					<td>--><?php //$wpo_wcpdf->order_number(); ?><!--</td>-->
					<!--				</tr>-->
					<!--				<tr class="order-date" align=right>-->
					<!--					<th>--><?php //_e( 'Order Date:', 'wpo_wcpdf' ); ?><!--</th>-->
					<!--					<td>--><?php //$wpo_wcpdf->order_date(); ?><!--</td>-->
					<!--				</tr>-->
					<!-- <tr class="payment-method" align=right>
					<th><?php _e( 'Payment Method:', 'wpo_wcpdf' ); ?></th>
					<td><?php $wpo_wcpdf->payment_method(); ?></td>
				</tr> -->
					<?php do_action( 'wpo_wcpdf_after_order_data', $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order ); ?>
				</table>
			</td>

		</tr>
	</table>

	<!-- Add Invoice/ Receipt Filter -->

	<?php
		if($wpo_wcpdf->export->order->post->post_status == "wc-completed") {
			?>
			<h1 class="document-type-label">
		<?php if( $wpo_wcpdf->get_header_logo_id() ) echo apply_filters( 'wpo_wcpdf_invoice_title', __( 'Receipt', 'wpo_wcpdf' ) ); ?>
	</h1>
			<?php
		} else {
			?>
			<h1 class="document-type-label">
				<?php if( $wpo_wcpdf->get_header_logo_id() ) echo apply_filters( 'wpo_wcpdf_invoice_title', __( 'Invoice', 'wpo_wcpdf' ) ); ?>
			</h1>

			<?php
		}

	?>



<?php do_action( 'wpo_wcpdf_after_document_label', $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order ); ?>

	<table class="order-data-addresses">
		<tr>
			<td class="address billing-address" style="width: 250px;">
				<!-- <h3><?php _e( 'Billing Address:', 'wpo_wcpdf' ); ?></h3> -->
				<?php $wpo_wcpdf->billing_address(); ?>
				<?php if ( isset($wpo_wcpdf->settings->template_settings['invoice_email']) ) { ?>
					<div class="billing-email"><?php $wpo_wcpdf->billing_email(); ?></div>
				<?php } ?>
				<?php if ( isset($wpo_wcpdf->settings->template_settings['invoice_phone']) ) { ?>
					<div class="billing-phone"><?php $wpo_wcpdf->billing_phone(); ?></div>
				<?php } ?>
			</td>
			<td class="address shipping-address">
				<?php if ( isset($wpo_wcpdf->settings->template_settings['invoice_shipping_address']) && $wpo_wcpdf->ships_to_different_address()) { ?>
					<h3><?php _e( 'Ship To:', 'wpo_wcpdf' ); ?></h3>
					<?php $wpo_wcpdf->shipping_address(); ?>
				<?php } ?>
			</td>
			<td style="width: 150px;">

			</td>
			<!--Extra information about order-->
			<td class="order-data" style="margin-left: 50px; width: 325px;">
				<table style="margin-left: 0px;">
					<?php do_action( 'wpo_wcpdf_before_order_data', $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order ); ?>
					<?php if ( isset($wpo_wcpdf->settings->template_settings['display_number']) && $wpo_wcpdf->settings->template_settings['display_number'] == 'invoice_number') { ?>

						<tr class="invoice-number" align=left>
							<th><?php _e( 'Invoice Number:', 'wpo_wcpdf' ); ?></th>
							<td><?php $wpo_wcpdf->invoice_number(); ?></td>
						</tr>
					<?php } ?>
					<?php if ( isset($wpo_wcpdf->settings->template_settings['display_date']) && $wpo_wcpdf->settings->template_settings['display_date'] == 'invoice_date') { ?>
						<tr class="invoice-date" align=left>
							<?php if($wpo_wcpdf->export->order->post->post_status == "wc-completed") { ?>
							<th><?php _e( 'Received Date:', 'wpo_wcpdf' ); ?></th>
							<td><?php echo $completed_order_date; ?></td>
							<?php } else { ?>
							<th><?php _e( 'Invoice Date:', 'wpo_wcpdf' ); ?></th>
							<td><?php $wpo_wcpdf->invoice_date(); ?></td>
							<?php } //end if/else statment?>
						</tr>

						<tr class="invoice-number" align=left>
							<th><?php _e( 'Person in charge:', 'wpo_wcpdf' ); ?></th>
							<td><?php echo $person_in_charge; ?></td>
						</tr>
					<?php } ?>
					<?php if ( isset($wpo_wcpdf->settings->template_settings['display_date']) && $wpo_wcpdf->settings->template_settings['display_date'] == 'invoice_date') { ?>
						<tr class="invoice-date" align=left>
							<th><?php _e( 'Committee:', 'wpo_wcpdf' ); ?></th>
							<td><?php echo $ecck_committee; ?></td>
						</tr>
					<?php } ?>
					<!--				<tr class="order-number" align=right>-->
					<!--					<th>--><?php //_e( 'Description:', 'wpo_wcpdf' ); ?><!--</th>-->
					<!--					<td>--><?php //$wpo_wcpdf->order_number(); ?><!--</td>-->
					<!--				</tr>-->
					<?php do_action( 'wpo_wcpdf_after_order_data', $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order ); ?>
				</table>
			</td>


		</tr>
	</table>

<?php do_action( 'wpo_wcpdf_before_order_details', $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order ); ?>

	<table class="order-details">
		<thead>
		<tr>
			<th class="product"><?php _e('Product', 'wpo_wcpdf'); ?></th>
			<th class="quantity"><?php _e('Quantity', 'wpo_wcpdf'); ?></th>
			<th class="price"><?php _e('Price', 'wpo_wcpdf'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php $items = $wpo_wcpdf->get_order_items(); if( sizeof( $items ) > 0 ) : foreach( $items as $item_id => $item ) : ?>
			<tr class="<?php echo apply_filters( 'wpo_wcpdf_item_row_class', $item_id, $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order ); ?>">
				<td class="product">
					<?php $description_label = __( 'Description', 'wpo_wcpdf' ); // registering alternate label translation ?>
					<span class="item-name"><?php echo $item['name']; ?></span>
					<?php do_action( 'wpo_wcpdf_before_item_meta', $wpo_wcpdf->export->template_type, $item, $wpo_wcpdf->export->order  ); ?>
					<span class="item-meta"><?php echo $item['meta']; ?></span>
					<dl class="meta">
						<?php $description_label = __( 'SKU', 'wpo_wcpdf' ); // registering alternate label translation ?>
						<?php if( !empty( $item['sku'] ) ) : ?><dt class="sku"><?php _e( 'SKU:', 'wpo_wcpdf' ); ?></dt><dd class="sku"><?php echo $item['sku']; ?></dd><?php endif; ?>
						<?php if( !empty( $item['weight'] ) ) : ?><dt class="weight"><?php _e( 'Weight:', 'wpo_wcpdf' ); ?></dt><dd class="weight"><?php echo $item['weight']; ?><?php echo get_option('woocommerce_weight_unit'); ?></dd><?php endif; ?>
					</dl>
					<?php do_action( 'wpo_wcpdf_after_item_meta', $wpo_wcpdf->export->template_type, $item, $wpo_wcpdf->export->order  ); ?>
				</td>
				<td class="quantity"><?php echo $item['quantity']; ?></td>
				<td class="price"><?php echo $item['order_price']; ?></td>
			</tr>
		<?php endforeach; endif; ?>
		</tbody>
		<tfoot>
		<tr class="no-borders">
			<td class="no-borders">
				<div class="customer-notes">
					<?php if ( $wpo_wcpdf->get_shipping_notes() ) : ?>
						<h3><?php _e( 'Customer Notes', 'wpo_wcpdf' ); ?></h3>
						<?php $wpo_wcpdf->shipping_notes(); ?>
					<?php endif; ?>
				</div>
			</td>
			<td class="no-borders" colspan="2">
				<table class="totals">
					<tfoot>
					<?php
					if ($ecck_income_type === 'membership' or $ecck_income_type === 'membership-cmf') {
					foreach( $wpo_wcpdf->get_woocommerce_totals() as $key => $total ) : ?>
						<tr class="<?php echo $key; ?>">
							<td class="no-borders"></td>
							<th class="description"><?php echo $total['label']; ?></th>
							<td class="price"><span class="totals-price"><?php echo $ecck_order_subtotal; ?></span></td>
							</tr>
						<?php endforeach;
					}
					else{
					foreach( $wpo_wcpdf->get_woocommerce_totals() as $key => $total ) : ?>
						<tr class="<?php echo $key; ?>">
							<td class="no-borders"></td>
							<th class="description"><?php echo $total['label']; ?></th>
							<td class="price"><span class="totals-price"><?php echo $total['value']; ?></span></td>
						</tr>
					<?php endforeach; ?>

					<?php } //end if/else  ?>

					</tfoot>
				</table>
			</td>
		</tr>
		</tfoot>
	</table>
	<!-- Insert Extra Fields -->
<?php $wpo_wcpdf->extra_1(); ?>

<?php if($wpo_wcpdf->export->order->post->post_status !== "wc-completed") {
	$wpo_wcpdf->extra_2();
	}
?>

<?php $wpo_wcpdf->extra_3(); ?>

<?php do_action( 'wpo_wcpdf_after_order_details', $wpo_wcpdf->export->template_type, $wpo_wcpdf->export->order ); ?>

<?php if ( $wpo_wcpdf->get_footer() ): ?>
	<div id="footer">
		<?php $wpo_wcpdf->footer(); ?>
	</div><!-- #letter-footer -->
<?php endif; ?>