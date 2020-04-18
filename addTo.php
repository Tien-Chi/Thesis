<!DOCTYPE html>
<html>

<head>
    <title>Pulling Data from Your Database</title>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/volunteer.css">

    <meta name="viewport" content="width=device-width"><!-- activates the @media calls -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:300,400' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="page" id="secondLink">

        <?php include "nav.php" ?>

        <section id="main">
            <article id="page">
                <div class="clearfix" id="contentBox">
                    <section>
                        <span class="stretch"></span>
                        <!-- end of submit -->
                        <?php include_once "config.php" ?>
                        
                        <?php 
                            
                                $pullData = "SELECT * FROM createlist";
                                
                                $result = mysqli_query($conn, $pullData);
                                
                                if($result){
                                    
                                }else{
                                    echo "<script> alert('Failed to get Data');</script>";
                                };
                                                          
                                                                                                     
                        ?>
                        <div id="tableOutput">
                        
                            <?php 
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result))
                                        echo "<div id='infoBlock'>
                                            <div class='output'>
                                            
                                            Playlist #".$row['ID'].":
                                            <br>".$row['name']."
                                            </div>
                                        </div>";

									
                                        
                             
                                    
                                };
                            ?>
                        <form action="" method="post">

                                    <fieldset id="videos">
                                        <legend>Add a video</legend>
                                        <h2>Playlist #: </h2>
                                        <h3>*required</h3><input type="text" name="id" placeholder="Type the # of the platlist to add to">
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
                                        <input type="submit" name="sub" value="Add Video">
                                        <br>
                                        <br>
                                    </div>
                            </form>
                        </div>
                    </section>
                </div><!-- end of contentBox -->
            </article><!-- end of page -->
        </section><!-- end of main -->
        <?php include "footer.php" ?>
    </div>
</body>

</html>
<?php 
    if($_POST){
        //echo "<script> alert('post is being called');</script>";
        $insert_data = "INSERT INTO videos (playlistID, video, time, comment) VALUES ('$_POST[id]','$_POST[video]','$_POST[time]','$_POST[comment]')";
            
        $run = mysqli_query($conn, $insert_data);

        if($run){
            echo "<script> alert('Data sent successfully');</script>";
        }else{
            echo "<script> alert('ERROR: Data NOT sent');</script>";
        };
            
    };
?>