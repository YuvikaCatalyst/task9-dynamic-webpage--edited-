<?php
include('admin/database2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="practice static webpage" />
    <meta name="keywords" content="HTML, CSS" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="admin/assets/css/form.css" />
    <title>task</title>
</head>
<body>
    <header>
        <div class="container">
        <div class="header_wrapper">
        <div class="logo">
        <?php 
       
        $result1 = mysqli_query($conn, "SELECT logoFile,logoText from dynamicdata");
        if($result1 && mysqli_num_rows($result1) > 0){
            $row = mysqli_fetch_assoc($result1);
            $logoFile = $row['logoFile'];
            $logoText = $row['logoText'];
            if(!empty($logoFile))
            echo "<img src='admin/assets/uploads/$logoFile' class='logo_img' alt='image'>";
            else{
                echo "<h2>$logoText</h2>";
            }
        }
        ?>
</div>
<div class="header_list">
    <ul>
        <?php
        
        $result2 = mysqli_query($conn,"SELECT navItem1,navItem2,navItem3,navItem4,navItem5 from dynamicdata" );
        if($result2 && mysqli_num_rows($result2) > 0){
            $row = mysqli_fetch_assoc($result2);
            $navItem1 = $row['navItem1'];
            $navItem2 = $row['navItem2'];
            $navItem3 = $row['navItem3'];
            $navItem4 = $row['navItem4'];
            $navItem5 = $row['navItem5'];
            
        echo "<li><a href='#'>$navItem1</a></li>";
        echo "<li><a href='#'>$navItem2</a></li>";
        echo "<li><a href='#'>$navItem3</a></li>";
        echo "<li><a href='#'>$navItem4</a></li>";
        echo "<li><a href='#' >$navItem5</a></li>";
        }
        ?>
    </ul>
</div>
</div>
        </div>
    </header>

    <section class="landing_section">
     <div class="container">
        <div class="landing_wrapper">
            <?php
            
            $result3 = mysqli_query($conn, "SELECT landingBackground,gradient,whiteHeading,landingPara,landingButton FROM dynamicdata");
            if($result3 && mysqli_num_rows($result3) > 0){
             $row = mysqli_fetch_assoc($result3);
             $landingBackground = $row['landingBackground'];
             $gradient = $row['gradient'];
             $whiteHeading = $row['whiteHeading'];
             $landingPara = $row['landingPara'];
             $landingButton = $row['landingButton'];
        echo " <img src='admin/assets/uploads/$landingBackground' alt='image' class='landing_background'>";
         echo "<p class='landing_heading'><span class='gradient'> $gradient</span>$whiteHeading </p>";
        echo" <p class='landing_text'>$landingPara</p>";
         echo"<a href='' class='landing_button'><input type='submit' value='$landingButton' class='primary'></a>";
            }
         ?>
        </div>
     </div>
    </section>
    
</body>
</html>