
<?php

require_once "stripe-php-master/init.php";
require_once "products.php";

// Stripe test keys will be configured securely later.
$stripeDetails = array(
    "secretKey" => "",
    "publishableKey" => ""
);

// Set Stripe API key only when a key is configured.
if (!empty($stripeDetails['secretKey'])) {
    \Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
}

?>
