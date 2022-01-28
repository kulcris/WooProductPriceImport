<?php

 $input = '/home1/recharj1/public_html/wp-content/uploads/cleanstock.csv'; // LOCATION OF CSV (SEE EXAMPLE CSV FOR FORMATING




    require_once(dirname(__FILE__) . '/wp-config.php');
    $wp->init();
    $wp->parse_request();
    $wp->query_posts();
    $wp->register_globals();
    $wp->send_headers();

	
	 if (false !== ($ih = fopen($input, 'r'))) {

		while (false !== ($data = fgetcsv($ih))) {
			// this is where you build your new row
			$outputData = array($data[0], $data[1], $data[2]);
		
			if(is_numeric($data[0])) {
				
				$sku = $outputData[0];
				$new_price = $outputData[2]; // New price
				$buyback_price = $outputData[1]; //Sale Price
				$_product_id = wc_get_product_id_by_sku( $sku );

				if ( $_product_id > 0 ) {
					// Get an instance of the WC_Product Object
					$_product = wc_get_product( $_product_id );
					$Name = $_product->get_name(); // Gets the name for the cronjob 
					$_product->set_regular_price($new_price); // Set the regular price
					$_product->set_sale_price($buyback_price); // Set the Sale Price(this item is on sale)
					If ($buyback_price > 0){
						$_product->set_price($buyback_price); // Set the price
					} else{
						$_product->set_price($new_price); // Set the price
					}
					$_product->save(); // Save to database and sync
					
					echo ( "\r \n <br> $sku Updated:  \r \n  <br> $Name \r \n <br> Price Set to: $new_price \r \n <br> Buyback set to: $buyback_price");
					echo ( "\r \n <br> --------------------------------------------------------------------------------------------");
				
				} else {
					// Display an error (invalid Sku
				}
			}
		}
	}
fclose($ih);
?>
