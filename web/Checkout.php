<?php
// Start the session
session_start();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Héroe Favorito</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="stylesheet.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="funnybusiness.js"></script>

        <link rel="stylesheet" type="text/css" href="CSS%20style%20sheet%20(2).css" />
    </head>

    <body>
        <?php
        require 'parts/navbar.php';
    ?>
            <div class="well">
                <form>
                    <label>Enter Your Address</label><br/>
                    <input type="text" name="address"><br/>
                    <label>Enter Your City</label><br/>
                    <input type="text" name="city"><br/>
                    <label>Enter Your State</label><br/>
                    <input type="text" size="2" maxlength="2" name="state"><br/>
                    <label>Enter Your Zip Code</label><br/>
                    <input type="text" size="5" maxlength="5" pattern="(\d{5}([\-]\d{4})?)" name="zip"><br/>
                    <label>Enter Your Phone Number</label><br/>
                    <input type="tel" pattern="\d{3}[\-]\d{3}[\-]\d{4}" name="phone"><br/><br/>
                    <button class="btn btn-lrg" id="back"><a href="Cart.php">Back to Cart</a></button>
                    <button class="btn btn-lrg" id="clear">Clear All</button>
                    <button class="btn btn-lrg" id="forward" type="submit" method="post" formaction="Confirmation.php">Confirm Shipping Address</button>

                </form>


            </div>

    </body>

    </html>
