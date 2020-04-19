<!DOCTYPE html>
<html>
    <head>
        <title>Posting Data to Your Database</title>
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
                            <div id="submit">
                                <br>
                                <input type="submit" name="sub" value="Submit">
                                <br>
                                <br>
                            </div><!-- end of submit -->
                        </form>
                        <!-- end of submit -->
                        <?php include_once "config.php" ?>
                        
                        <?php 
                            if(isset($_POST['sub'])){
                                $pullData = "SELECT * FROM createList";
                                
                                $result = mysqli_query($conn, $pullData);
                                
                                if($result){
                                    echo "<script> alert('Getting data...');</script>";
                                }else{
                                    echo "<script> alert('Failed to get Data');</script>";
                                };
                                echo mysqli_num_rows($result)." entries.<br><br>";
                                
                                
                            };
                                                
                        ?>
                        <div id="tableOutput">
                        
                            <?php 
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result))
                                        echo "<div id='infoBlock'>
                                            <div class='output'>
                                            <h2>Playlist #".$row['id'].":&nsbp".$row['name']."</h2>
                                            </div>
                                        </div>"
                                        ?>
                            </div>



                                    <fieldset id="videos">
                                        <legend>Add a video</legend>
                                        <h2>Playlist #: </h2>
                                        <h3>*required</h3><input type="text" name="playlist id" placeholder="Type the # of the platlist to add to">
                                        <h2>Video URL: </h2>
                                        <h3>*required</h3><input type="text" name="video" placeholder="URL link">
                                        <h2>Timestamp: </h2>
                                        <input type="text" name="time" placeholder="starting timestamp">
                                        <h2>Tags: </h2>
                                        <input type="text" name="comment" placeholder="tags">

                                        
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
        $insert_data = "INSERT INTO playlist (name, author, tags, vid1, vid2, vid3, vid4, vid5) VALUES ('$_POST[name]','$_POST[author]','$_POST[tags]','$_POST[vid1]','$_POST[vid2]','$_POST[vid3]','$_POST[vid4]','$_POST[vid5]')";
            
        $run = mysqli_query($conn, $insert_data);

        if($run){
            echo "<script> alert('Data sent successfully');</script>";
        }else{
            echo "<script> alert('ERROR: Data NOT sent');</script>";
        };
            
    };
?>