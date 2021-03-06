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
        <script src="https://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script>
            $(function() {
                $(".ui-widget-content").draggable({
                    helper: "clone"
                });
            });

        </script>


        <link rel="stylesheet" type="text/css" href="CSS%20style%20sheet%20(2).css" />
    </head>

    <body>
        <?php
        require 'parts/navbar.php';
    ?>
            <div class="alert alert-success"> <strong>Success!</strong> One album added to cart. </div>
            <button class="btn btn-lg" id="cart"><a href="Cart.php">View Cart</a></button>
            <div class="well">
                <?php
            $count = 0;
            foreach (scandir('images') as $file){
                if ($file != '.') { 
                    if ($file != '..'){
                        $slashPosition = strpos($file, "/");
                        $dotPosition = strpos($file, ".");
                        $artist = substr($file, $slashPosition, $dotPosition);
                        if ($count > 2)
                            $count = 0;
                        if ($count == 0)
                            echo "<div class=\"row\">";
                        echo "<div class=\"col-sm-4\" id=\"$artist" . "col\"><img src=\"images/$file\" class=\"img-responsive ui-widget-content\" id=\"$artist\"></div>";
                        if ($count == 2)
                            echo "</div>";
                        $count++;
                    }
                }
            }
        ?>
            </div>

            <script>
                $zindex = 1000;

                $.fn.exBounce = function() {
                    var self = this;
                    (function runEffect() {
                        self.animate({
                                top: 20 + "px"
                            }, 500)
                            .animate({
                                top: 0 + "px"
                            }, 500, runEffect);
                    })();
                    return this;

                };

                $(document).ready(function() {
                    $(".ui-widget-content").height($(".ui-widget-content").width());
                    <?php
                    foreach($_SESSION as $key => $value){
                        $id = "\"#" . $value . "\"";
                        echo "$($id).exBounce();";
                    }
                    ?>
                    $(".ui-widget-content").click(function() {
                        var self = $(this);
                        var id = self.attr('id');
                        // If animated please stop
                        if (self.is(':animated')) {
                            self.stop(true, false)
                                .css("top", "0px");
                            $(".alert").load("manipulateCart.php", {
                                delete: id
                            });
                        } else {
                            $(".alert").load("manipulateCart.php", {
                                add: id
                            });
                            self.exBounce();
                            $(".alert").fadeIn("fast", function() {
                                $(this).fadeOut(5000, function() {
                                    $(this).stop(true, false);
                                });
                            });
                        }
                    });
                    $(".ui-widget-content").mousedown(function() {
                        $(this).css("z-index", ++$zindex);
                    });
                })

                $(window).resize(function() {
                    $(".ui-widget-content").height($(".ui-widget-content").width());
                });

            </script>

    </body>

    </html>
