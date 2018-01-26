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
                <h1>Congratulations! Your order has been successfully processed! </h1><br/><br/>
                <h2>Here's a review of your items:</h2><br/><br/>
                <?php
                $count = 0;
                foreach($_SESSION as $key => $value){
                    if ($count > 2)
                            $count = 0;
                        if ($count == 0)
                            echo "<div class=\"row\">";
                            echo "<div class=\"col-sm-4\" id=\"$value" . "col\">" . "<h3 class=\"item\" style=\"text-align:center\" id=\"$value" . "txt\">" . htmlspecialchars($value) . "</h3>" . "<img src=\"images/$value.jpg\" class=\"img-responsive ui-widget-content item\" id=\"$value\"></div>";
                        if ($count == 2)
                            echo "</div>";
                        $count++;
                }
                if(count != 3)
                    echo "</div>";
                ?>
                    <br/>
                    <h1 style="text-align:center">Your order will be shipped to:</h1><br/>
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
                        </p><br/><br/><br/>
                    </div>
                    <h3 style="text-align:center">All orders should arrive within 3-5 business days.</h3><br/><br/>





            </div>
            <script>
                $(document).ready(function() {
                    $(".ui-widget-content").height($(".ui-widget-content").width());

                });
                $(window).resize(function() {
                    $(".ui-widget-content").height($(".ui-widget-content").width());
                });

            </script>

    </body>

    </html>
