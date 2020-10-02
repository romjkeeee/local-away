<?php
/**
 * @var \Collective\Html\FormBuilder $form
 */
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    $(function() {
        $.post('{{ route('api.payment.create') }}', { 'order_id': '{{ request('order_id') }}' }, function(res) {
            console.log(res);
            //return ;
            var stripe = Stripe(res.data.publicKey);

            stripe.redirectToCheckout({
                // Make the id field from the Checkout Session creation API response
                // available to this file, so you can provide it as parameter here
                // instead of the placeholder.
                sessionId: res.data.sessionId
            }).then(function (result) {
                // If `redirectToCheckout` fails due to a browser or network
                // error, display the localized error message to your customer
                // using `result.error.message`.
                console.log(result);
            });
        });
    });
</script>
