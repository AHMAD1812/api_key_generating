<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Checkout Form</h1>
    <?php
    session_start();

    if(isset($_SESSION['transfer_payment']) && isset($_SESSION['api_key'])){
        echo "
        <div class=\"alert-success\">
        <strong>".$_SESSION['transfer_payment']."</strong><br> Your Api Key is ".$_SESSION['api_key'] ."
        </div>";
        unset($_SESSION['transfer_payment']);
        unset($_SESSION['api_key']);
    }
    ?>
    <form class="form cf" method="post" action="payment_submisson.php">
      <section class="payment-type cf">
        <h2>Select a payment type:</h2>
            <input type="radio" name="radio3" id="credit" value="JazzCash"><label class="credit-label four col" for="credit">JazzCash</label>
        <input type="radio" name="radio3" id="debit" value="EasyPaisa"><label class="debit-label four col" for="debit">EasyPaisa</label>
        <input type="radio" name="radio3" id="paypal" value="Visa" checked><label class="paypal-label four col" for="paypal">Visa</label>
      </section>  
      <input class="submit" type="submit" value="Submit">   
    </form>
  </div>
</body>
</html>