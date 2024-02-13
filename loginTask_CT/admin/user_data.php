<?php
 include('database2.php');

 $allowedExtensions = array('gif', 'avif', 'jpg', 'png', 'jpeg');

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $logoText = $_POST['logoText'];
     $navItem1 = $_POST['navItem1'];
    $navItem2 = $_POST['navItem2'];
     $navItem3 = $_POST['navItem3'];
     $navItem4 = $_POST['navItem4']; 
     $navItem5 = $_POST['navItem5'];
     $gradient = $_POST['gradient'];
     $whiteHeading = $_POST['whiteHeading']; 
     $landingPara = $_POST['landingPara']; 
     $landingButton = $_POST['landingButton'];
     

 
     $file_name1 = '';
     if (isset($_FILES['logoFile'])) {
         $file_name1 = $_FILES['logoFile']['name'];
         $file_tmp1 = $_FILES['logoFile']['tmp_name'];
         $file_extension1 = strtolower(pathinfo($file_name1, PATHINFO_EXTENSION));

         if (!in_array($file_extension1, $allowedExtensions)) {
          echo "Error: Only GIF, AVIF, JPG, PNG, and JPEG files are allowed.";
          exit();
      }

         move_uploaded_file($file_tmp1, "assets/uploads/" . $file_name1);
     }
     $file_name2 = '';
     if (isset($_FILES['landingBackground'])) {
         $file_name2 = $_FILES['landingBackground']['name'];
         $file_tmp2 = $_FILES['landingBackground']['tmp_name'];
         $file_extension2 = strtolower(pathinfo($file_name2, PATHINFO_EXTENSION));

         if (!in_array($file_extension1, $allowedExtensions)) {
          echo "Error: Only GIF, AVIF, JPG, PNG, and JPEG files are allowed.";
          exit();
      }
         move_uploaded_file($file_tmp2, "assets/uploads/" . $file_name2);
     }

     $result = mysqli_query($conn, "SELECT * FROM dynamicdata");
     if (mysqli_num_rows($result) > 0) {
     
                   $row = mysqli_fetch_assoc($result);
        
        if (!empty($file_name1)) {  
          $sql = "UPDATE dynamicdata
              SET logoFile = '$file_name1',
                  logoText = '',
                  navItem1 = '$navItem1',
                  navItem2 = '$navItem2',
                  navItem3 = '$navItem3',
                  navItem4 = '$navItem4',
                  navItem5 = '$navItem5',
                  landingBackground = '$file_name2',
                  gradient = '$gradient',
                  whiteHeading = '$whiteHeading',
                  landingPara = '$landingPara',
                  landingButton = '$landingButton'";
          mysqli_query($conn, $sql);
      } elseif (!empty($logoText)) {
         
          $sql = "UPDATE dynamicdata
              SET logoFile = '',
                  logoText = '$logoText',
                  navItem1 = '$navItem1',
                  navItem2 = '$navItem2',
                  navItem3 = '$navItem3',
                  navItem4 = '$navItem4',
                  navItem5 = '$navItem5',
                  landingBackground = '$file_name2',
                  gradient = '$gradient',
                  whiteHeading = '$whiteHeading',
                  landingPara = '$landingPara',
                  landingButton = '$landingButton'";
          mysqli_query($conn, $sql);
      }   
  } 

  else {
     $sql = "INSERT INTO dynamicdata (logoFile,logoText,navItem1,navItem2,navItem3,navItem4,navItem5,landingBackground,gradient,whiteHeading,landingPara,landingButton)
     VALUES ('$file_name1','$logoText', '$navItem1', '$navItem2', '$navItem3', '$navItem4', '$navItem5','$file_name2','$gradient','$whiteHeading','$landingPara','$landingButton')";
      mysqli_query($conn, $sql);
      }
    }

  echo "record inserted"."|".$file_name1."|".$file_name2;


?>






























