<!DOCTYPE html>
<html>
    <head>
        <title>TimTube: Create Playlist</title>
        <meta charset="utf-8">
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/final.css">
        <link rel="stylesheet" href="css/volunteer.css">

        <meta name="viewport" content="width=device-width"><!-- activates the @media calls -->
        <link href='http://fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="page" id="firstLink">
            <?php include "nav.php" ?>        
            <section id="main">
                <article>
                    <div class="clearfix" id="contentBox" >
                        <section>
                            <span class="stretch"></span>
                                <form action="" method="post">
                                    <fieldset id="personal">
                                        <legend>Playlist info</legend>
                                        <h2>Playlist Name: </h2>
                                        <h3>*required</h3><input type="text" name="name" placeholder="Title of Playlist">
                                        <h2>Created by: </h2><input type="text" name="author" placeholder="Name">
                                        <h2>Tags: &nbsp;</h2>
                                        <input type="text" name="tags" placeholder="#Tags">
                                        <h2>Description:</h2>
                                        <input type="text" name="info" placeholder="">

                                    </fieldset>
                               <!-- end of times -->
                                    <fieldset id="sharing">
                                        <legend>Visability</legend>
                                        <input type="radio"> Public<br>
                                        <input type="radio"> Friends
                                        <br><input type="radio"> Private

                                    </fieldset>
                                    <!-- end of personalAdd -->
                                    <div id="submit">
                                        <br>
                                        <input type="submit" name="sub" value="Submit">
                                        <br>
                                        <br>
                                    </div>
                                    <!-- end of submit -->
                                </form>          
                        </section>
                    </div><!-- end of contentBox -->
                    </article><!-- end of page -->
            </section><!-- end of main -->
            <?php include "footer.php" ?>
        </div>
    </body>
</html>
<?php include_once "config.php" ?>
<?php 
    if($_POST){
        //echo "<script> alert('post is being called');</script>";
        $insert_data = "INSERT INTO createlist (name, author, tags, info) VALUES ('$_POST[name]','$_POST[author]','$_POST[tags]','$_POST[info]')";
            
        $run = mysqli_query($conn, $insert_data);

        if($run){
            echo "<script> alert('Playlist successfully created');</script>";
        }else{
            echo "<script> alert('ERROR: Playlist failed to be created');</script>";
        };
            
    };
?>