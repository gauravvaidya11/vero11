<?php
echo form_open(base_url() . 'paypal', array(
    'id' => 'paymentContainer',
    'method' => 'post'
));
echo form_hidden('order_type', 'order');
echo form_close();
?>
<script>
    window.paypalCheckoutReady = function () {
        paypal.checkout.setup('7ZRBZ9EU63EY8', {
            container: 'paymentContainer',
            environment: 'sandbox'

        });

    }

</script>
<script src="//www.paypalobjects.com/api/checkout.js" async></script>