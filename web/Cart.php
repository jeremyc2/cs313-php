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
            <div class="alert alert-warning"> <strong>Success!</strong> One album added to cart. </div>
            <div class="well">
                <p>Click on an item to delete it.</p>
                <?php
                echo "<h1 Items in your cart: </h1><br/>";
                foreach($_SESSION as $key => $value){
                    echo "<h3 class=\"item\" id=\"$value\">" . htmlspecialchars($value) . "</h3><br/> ";
                }
                ?>
                    <button class="btn btn-lrg" id="back"><a href="Browse.php">Back to Browse</a></button>
                    <button class="btn btn-lrg" id="clear">Clear All</button>
                    <button class="btn btn-lrg" id="forward"><a href="Checkout.php">Submit Order</a></button>
            </div>
            <script>
                $(document).ready(function() {
                    $(".item").click(function() {
                        var id = $(this).attr('id');
                        $(".alert").load("manipulateCart.php", {
                            delete: id
                        });
                        $(this).remove();
                        $(".alert").fadeIn("fast", function() {
                            $(this).fadeOut(5000, function() {
                                $(this).stop(true, false);
                            });
                        });
                    });
                    $("#clear").click(function() {
                        $(".item").remove();
                        $(".alert").load("manipulateCart.php", {
                            reset: "true"
                        });
                        $(".alert").fadeIn("fast", function() {
                            $(this).fadeOut(5000, function() {
                                $(this).stop(true, false);
                            });
                        });
                    });
                });

            </script>
    </body>

    </html>
