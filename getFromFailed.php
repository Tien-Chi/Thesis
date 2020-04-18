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
                        <form action="" method="post">
                            <div id="submit">
                                <br>
                                <input type="text" name="search" placeholder="Search">
                                <button type="submit" name="submit-search">Search</button>
                                <br>
                                <br>
                            </div><!-- end of submit -->
                        </form>
                        <!-- end of submit -->
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
                                echo mysqli_num_rows($result)." entries.<br><br>";
                                
                                
                            };
        if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result))
                                        echo "<div id='infoBlock'>
                                            <div class='output'>
                                            <h2>".$row['name']."</h2>
                                            <br>Created by: ".$row['author']."
                                            <br>Tags: ".$row['tags']."
                                            </div><br>
                                        </div>
                                        
                                        
                                        ";

									
                                        
                             
                                    
                                };
                            
                                                
                        ?>
                        <div id="tableOutput">
                                <div id="submit">
                                        <br>
                                        <input type="submit" name="search" placeholder="Search">
                                        <br>
                                        <br>
                                    </div>
                                                                                
                            <?php 
                                
                            
                            if(isset($_POST['search'])){
                                $pullData = "SELECT * FROM videos WHERE playlistID = 1";
                                //Faking this... 1 should be the ID of the playlist get from the createlist table
                                $result = mysqli_query($conn, $pullData);
                                
                                if($result){
                                    echo "<script> alert('Getting data...');</script>";
                                }else{
                                    echo "<script> alert('Failed to get Data');</script>";
                                };
                                echo mysqli_num_rows($result)." entries.<br><br>";
                                
                                
                            };
                            if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result))
                                        echo "<iframe width=\"560\" height=\"315\" src=".$row['video'].'?start='.$row['time']." frameborder=\"100\" allowfullscreen></iframe>";
                            ?>
                        </div>
                    </section>
                </div><!-- end of contentBox 
-->
            </article><!-- end of page -->
        </section><!-- end of main -->
        <?php include "footer.php" ?>
    </div>
</body>

</html>
