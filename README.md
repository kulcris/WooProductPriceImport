Since I spend weeks trying different plugins all having their own issues I created this

This PHP script pulls in a CSV and uses information in it to set prices in woocommerce 

PHP script must be in same location as wordpress config.php
Change location of CSV in pricechange.php file at the top



THE CSV SHOULD BE AS FOLLOWS

SKU, SALESPRICE, RETAILPRICE


If you set "SALESPRICE" to 0 it should use the "RETAILPRICE" instead and not put the item on sale. 

SKUS MUST BE ON THE FILE AND ON WOOCOMMERCE THIS DOES NOT USE PRODUCT ID!




TEST FIRST AS THERE MAY BE UNKOWN ISSUES ON YOUR SITE!

I WILL ASSUME NO RESPONSIBILITY FOR DAMAGES!
