<?php

class UPME_Sync_Woo {

	function __construct() {
	
		if ( isset($_REQUEST['sync']) && !isset($_POST['submit']) && !isset($_POST['upme-add']) && !isset($_POST['reset-options']) && !isset($_POST['reset-options-fields']) ) {
			
			if ($_REQUEST['sync'] == 'woocommerce') {
			
			/* load fields */
			$fields = get_option('upme_profile_fields');
			
			/* Add WooCommerce profile fields */
			require_once(ABSPATH . '/wp-content/plugins/woocommerce/admin/woocommerce-admin-users.php');
			$woo_meta = woocommerce_get_customer_meta_fields();
			
			$new_index = max(array_keys($fields));
			
			foreach($woo_meta as $group => $array) {
				
				$fields[$new_index+=10] = array( 
					'type' => 'seperator', 
					'name' => $array['title'],
					'private' => 0,
					'deleted' => 0
				);
				
				foreach($array['fields'] as $meta => $label) {
					
					/* switch icon */
					switch ($meta) {
						case 'billing_first_name': $icon = 'user'; break;
						case 'billing_last_name': $icon = 0; break;
						case 'billing_company': $icon = 'building'; break;
						case 'billing_address_1': $icon = 'home'; break;
						case 'billing_address_2': $icon = 0; break;
						case 'billing_city': $icon = 0; break;
						case 'billing_postcode': $icon = 0; break;
						case 'billing_state': $icon = 0; break;
						case 'billing_country': $icon = 'map-marker'; break;
						case 'billing_phone': $icon = 'phone'; break;
						case 'billing_email': $icon = 'envelope'; break;
						case 'shipping_first_name': $icon = 'user'; break;
						case 'shipping_last_name': $icon = 0; break;
						case 'shipping_company': $icon = 'building'; break;
						case 'shipping_address_1': $icon = 'home'; break;
						case 'shipping_address_2': $icon = 0; break;
						case 'shipping_city': $icon = 0; break;
						case 'shipping_postcode': $icon = 0; break;
						case 'shipping_state': $icon = 0; break;
						case 'shipping_country': $icon = 'map-marker'; break;
						default: $icon = 0; break;
					}
					
					switch($meta) {
						
						case 'billing_country':
						$fields[$new_index+=10] = array(
							'icon' => $icon, 
							'field' => 'select', 
							'type' => 'usermeta', 
							'meta' => $meta, 
							'name' => $label['label'],
							'can_hide' => 1,
							'can_edit' => 1,
							'predefined_loop' => 'countries',
							'private' => 0,
							'social' => 0,
							'deleted' => 0
						);
						break;

						case 'shipping_country':
						$fields[$new_index+=10] = array(
							'icon' => $icon, 
							'field' => 'select', 
							'type' => 'usermeta', 
							'meta' => $meta, 
							'name' => $label['label'],
							'can_hide' => 1,
							'can_edit' => 1,
							'predefined_loop' => 'countries',
							'private' => 0,
							'social' => 0,
							'deleted' => 0
						);
						break;
							
						default:
						$fields[$new_index+=10] = array(
							'icon' => $icon, 
							'field' => 'text', 
							'type' => 'usermeta', 
							'meta' => $meta, 
							'name' => $label['label'],
							'can_hide' => 1,
							'can_edit' => 1,
							'private' => 0,
							'social' => 0,
							'deleted' => 0
						);
						break;
					
					}
					
				}
				
			}
			
			update_option('upme_profile_fields', $fields);
			echo '<div class="updated"><p><strong>'.__('WooCommerce customer fields have been added successfully.','upme').'</strong></p></div>';
			
			}
			
			if ($_REQUEST['sync'] == 'woocommerce_clean') {

			/* Add WooCommerce profile fields */
			require_once(ABSPATH . '/wp-content/plugins/woocommerce/admin/woocommerce-admin-users.php');
			$woo_meta = woocommerce_get_customer_meta_fields();
			
			$new_index = 0;
			
			foreach($woo_meta as $group => $array) {
				
				$fields[$new_index+=10] = array( 
					'type' => 'seperator', 
					'name' => $array['title'],
					'private' => 0,
					'deleted' => 0
				);
				
				foreach($array['fields'] as $meta => $label) {
					
					/* switch icon */
					switch ($meta) {
						case 'billing_first_name': $icon = 'user'; break;
						case 'billing_last_name': $icon = 0; break;
						case 'billing_company': $icon = 'building'; break;
						case 'billing_address_1': $icon = 'home'; break;
						case 'billing_address_2': $icon = 0; break;
						case 'billing_city': $icon = 0; break;
						case 'billing_postcode': $icon = 0; break;
						case 'billing_state': $icon = 0; break;
						case 'billing_country': $icon = 'map-marker'; break;
						case 'billing_phone': $icon = 'phone'; break;
						case 'billing_email': $icon = 'envelope'; break;
						case 'shipping_first_name': $icon = 'user'; break;
						case 'shipping_last_name': $icon = 0; break;
						case 'shipping_company': $icon = 'building'; break;
						case 'shipping_address_1': $icon = 'home'; break;
						case 'shipping_address_2': $icon = 0; break;
						case 'shipping_city': $icon = 0; break;
						case 'shipping_postcode': $icon = 0; break;
						case 'shipping_state': $icon = 0; break;
						case 'shipping_country': $icon = 'map-marker'; break;
						default: $icon = 0; break;
					}
					
					switch($meta) {
						
						case 'billing_country':
						$fields[$new_index+=10] = array(
							'icon' => $icon, 
							'field' => 'select', 
							'type' => 'usermeta', 
							'meta' => $meta, 
							'name' => $label['label'],
							'can_hide' => 1,
							'can_edit' => 1,
							'predefined_loop' => 'countries',
							'private' => 0,
							'social' => 0,
							'deleted' => 0
						);
						break;
						
						case 'shipping_country':
						$fields[$new_index+=10] = array(
							'icon' => $icon, 
							'field' => 'select', 
							'type' => 'usermeta', 
							'meta' => $meta, 
							'name' => $label['label'],
							'can_hide' => 1,
							'can_edit' => 1,
							'predefined_loop' => 'countries',
							'private' => 0,
							'social' => 0,
							'deleted' => 0
						);
						break;
							
						default:
						$fields[$new_index+=10] = array(
							'icon' => $icon, 
							'field' => 'text', 
							'type' => 'usermeta', 
							'meta' => $meta, 
							'name' => $label['label'],
							'can_hide' => 1,
							'can_edit' => 1,
							'private' => 0,
							'social' => 0,
							'deleted' => 0
						);
						break;
					
					}
					
				}
				
			}
			
			update_option('upme_profile_fields', $fields);
			echo '<div class="updated"><p><strong>'.__('WooCommerce customer fields have been added successfully.','upme').'</strong></p></div>';
			
			}
				
		}
		
	}

}

$upme_sync_woocommerce = new UPME_Sync_Woo();