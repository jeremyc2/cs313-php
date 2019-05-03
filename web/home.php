<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Héroe Favorito</title>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">

         Latest compiled and minified CSS 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="stylesheet.css">

         jQuery library 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

         Latest compiled JavaScript 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <script src="funnybusiness.js"></script>
        
        <link rel="stylesheet" type="text/css" href="CSS%20style%20sheet%20(2).css" />
    </head>
<body>
    <?php
        require 'parts/navbar.php';
    ?>
    <div class="well">
        <img src="me.jpg" style="height:100px !important; width:100px !important;" />
        <h1>This is going to be epic</h1>
        <blockquote class="blockquote">With a title inspired by the popular new song by Romeo Santos, and all the cool PHP hot stuff you could ever want, get ready to have your mind blown. Talk about being super, this is absolutely incredible.</blockquote>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Ktq4zATPFsI?start=60" allowfullscreen></iframe>
        </div>
    </div>

</body>
</html> 
-->
<!DOCTYPE html>
<html>
<body>

<h1>The XMLHttpRequest Object</h1>

<button type="button" onclick="loadDoc()">Request data</button>

<p id="demo"></p>
 
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "https://40.114.119.178:8000/v1/invoke", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("module=/add-note.xqy");
}
</script>

</body>
</html>
