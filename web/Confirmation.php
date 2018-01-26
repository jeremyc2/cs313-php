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
            <div class="well">
                <h1>These are the items in your cart:</h1><br/>
                <?php
                foreach($_SESSION as $key => $value){
                    echo "<h3 class=\"item\" id=\"$value\">" . htmlspecialchars($value) . "</h3><br/> ";
                }
                ?>
                    <h3 style="text-align:center">They should arrive in the next 3-5 business days at:</h3><br/><br/>
                    <div style="text-align:center">
                        <p>
                            <?php echo htmlspecialchars($_REQUEST["address"])?>
                        </p>
                        <p>
                            <?php echo htmlspecialchars($_REQUEST["city"])?>,&nbsp;
                            <?php echo htmlspecialchars($_REQUEST["state"])?>&nbsp;
                            <?php echo htmlspecialchars($_REQUEST["zip"])?>
                        </p>
                        <p>
                            <?php echo htmlspecialchars($_REQUEST["phone"])?>
                        </p>
                    </div>




            </div>
    </body>

    </html>
