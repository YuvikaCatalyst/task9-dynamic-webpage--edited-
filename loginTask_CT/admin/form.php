<?php
include('database2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="assets/js/login.js"></script>
    <title>website</title>
</head>
<body>
<?php
    $sql = "SELECT * FROM dynamicdata";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    ?>
    <form action="#" method="post" enctype="multipart/form-data">
        <label>SELECT WHICH TYPE OF DATA DO YOU WANT TO SELECT FOR THE LOGO??<BR>
    <select id="logoType">
        <option value="select" class="select">select</option>
        <option value="text" class="text" <?php if ($row['logoFile'] == '') echo ' selected'; ?>>TEXT</option>
        <option value="image" class="image" <?php if ($row['logoFile'] != '') echo ' selected'; ?>>IMAGE</option>
    </select><br>

    <input type="file" class="logoFile logo" id="logoFile" name="logoFile">
    <label for="logoFile" class="logoFile logo1"><?php echo $row['logoFile']?></label><br>
    <input type="text" class="logoText  logo" placeholder="logo text" value="<?php echo $row['logoText']; ?>"><br>

<label for="navbar">ENTER DATA FOR NAVBAR LINKS<br>
<input type="text" placeholder="enter 1st item" class="navItem1" value="<?php echo $row['navItem1']; ?>"><br>
<input type="text" placeholder="enter 2nd item" class="navItem2" value="<?php echo $row['navItem2']; ?>"><br>
<input type="text" placeholder="enter 3rd item" class="navItem3" value="<?php echo $row['navItem3']; ?>"><br>
<input type="text" placeholder="enter 4th item" class="navItem4" value="<?php echo $row['navItem4']; ?>"><br>
<input type="text" placeholder="enter 5th item" class="navItem5" value="<?php echo $row['navItem5']; ?>"><br>
<label for ="landingBackground">SELECT IMAGE FOR  BACKGROUND OF LANDING PAGE.<br>
<input type="file" class="landingBackground" id="landingBackground" name="landingBackground">
<label for="landingBackground" class="landingBackground logo2"><?php echo $row['landingBackground']?></label><br>
<label for="gradient">ENTER DATA FOR GRADIENT HEADING ON BANNER. <br>
<input type="text" class="gradient" id="gradient" value="<?php echo $row['gradient']; ?>"><br>
<label for="whiteHeading">ENTER DATA FOR HEADING ON BANNER. <br>
<input type="text" class="whiteHeading" id="whiteHeading" value="<?php echo $row['whiteHeading']; ?>"><br>
<label for="landingPara">ENTER PARAGRAPH DATA FOR BANNER. <br>
<input type="text" class="landingPara" id="landingPara" value="<?php echo $row['landingPara']; ?>"><br>
<label for="landingButton">ENTER DATA FOR BUTTON.<br>
<input type="text" class="landingButton" id="landingButton" value="<?php echo $row['landingButton']; ?>"><br>

<a href="#" class="submit" id="submit">submit</a>
<a href="logout.php"><input type="button" value="logout"></a>

</form>
</body>
</html>
