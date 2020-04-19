<!DOCTYPE html>
<html>

<head>
    <title>TimTube: Your Playlists</title>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/final.css">
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
                        <form action="" method="post">
                            <div id="submit">
                                <br>
                                <input type="text" name="search" placeholder="Search for playlists">
                                <button type="submit" name="submit-search">Search</button>
                                <br>
                                <br>
                            </div><!-- end of submit -->
                        </form>
                        <?php include_once "config.php" ?>
                        
                        <?php 
                            if(isset($_POST['search'])){
                                $pullData = "SELECT * FROM createlist WHERE name LIKE '%$search%' OR author LIKE '%$search%' OR tags LIKE '%$search%'";
                                //Don't think this works but the video I followed does. hmmm
                                $result = mysqli_query($conn, $pullData);
                                
                                if($result){
                                    echo "<script> alert('Getting data...');</script>";
                                }else{
                                    echo "<script> alert('Failed to get Data');</script>";
                                };
                                    echo "  <div id='infoBlock'>
                                            <h2>Thesis Playlist</h2>
                                            <br>Created by: Tim
                                            <br>Tags: #Youtube #Smarter <br>
                                            <div>";
                                
                                
                            };
                            if(isset($_POST['search'])){
                                $pullData = "SELECT * FROM videos WHERE playlistID = 1";
                                //Faking this... 1 should be the ID of the playlist get from the createlist table (don't know how to do this)
                                $result = mysqli_query($conn, $pullData);
                                
                                if($result){
                                    echo "<script> alert('Getting data...');</script>";
                                }else{
                                    echo "<script> alert('Failed to get Data');</script>";
                                };
                                //echo mysqli_num_rows($result)." entries.<br><br>";
                                
                                
                            };
                                                
                        ?>
                        <div id="tableOutput">
                        
                            <?php 
                                if(mysqli_num_rows($result)>0){
                                    
                                    while($row = mysqli_fetch_assoc($result))
                                        echo "
                                        <iframe width=\"560\" height=\"315\" src=".$row['video'].'?start='.$row['time']." frameborder=\"100\" allowfullscreen></iframe>
                                        ";
                                        /*echo "<div id='infoBlock'>
                                            <h2>".$row['name']."</h2>
                                            <br>Created by: ".$row['author']."
                                            <br>Tags: ".$row['comment']."
                                            </div><br>
                                        <iframe width=\"560\" height=\"315\" src=".$row['video'].'?start='.$row['time']." frameborder=\"100\" allowfullscreen></iframe>
                                        ";*/
                                };
                            ?>
                        </div>
                    </section>
                </div><!-- end of contentBox -->
            </article><!-- end of page -->
        </section><!-- end of main -->
        <?php include "footer.php" ?>
    </div>
</body>

</html>
