<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://www.paypal.com/sdk/js?client-id=AVY1j-RdBnlFoF2LnPT4gvkGu1-FyOtDVp-SgyzARzrUe8atAoOztdVPSOR-s0DXBTl8sUwjhd1ac3fA&currency=MXN"></script>
</head>

<body>

    <div id="paypal-button-container"></div>

    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: 100
                        }
                    }]
                });
            },

            onApprove: function(data, actions){
                actions.order.capture().then(function(detalles){
                    window.location.href="completado.html"
                });
            },

            onCancel: function(data) {
                alert("Pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>

</body>

</html>