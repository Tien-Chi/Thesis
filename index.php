<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TimTube</title>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/final.css" type="text/css">
    <script type="text/javascript" src="js/code.js"></script>
    <script>window.addEventListener("load", init("Hello!"));</script>
</head>

<body>
        <div class="page" id="home">
        <?php include 'nav.php' ?>
        <span class="stretch"></span>
        <article id="story">
            <h1>Welcome to TimTube</h1>
            <p>Make your own custom playlists here!</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem doloremque dolorem, itaque repellendus, obcaecati maiores deleniti porro placeat ad expedita rerum numquam quisquam alias. Eius soluta necessitatibus quaerat quo modi!</p>
        </article>
        <?php include 'footer.php' ?>
    </div>
    
<!--
    <div id="phpDiv">
        <?php 
            $myVar = "This is a Variable.";
            echo $myVar;
        
            function myFunction($incoming){
                $myVar = "It is still a variable";
                echo "<br>".$myVar.$incoming;
                echo "<script> alert('What just happened?!'); </script>";
            }
            myFunction(" and this is a value passed into the function!");
        ?>
    </div>
-->

</body>

</html>
