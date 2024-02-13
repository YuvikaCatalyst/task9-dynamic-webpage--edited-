$(document).ready(function(){


    $('.add_user').click(function(e){
e.preventDefault();
        var first_name=$('.first_name').val();
        var middle_name=$('.middle_name').val();
        var last_name=$('.last_name').val();
        var password=$('.password').val();
        var confirm_password=$('.confirm_password').val();
        $.ajax({
            type: 'POST',
            url: 'confirmation.php',
            data: {
                first_name:first_name,
                middle_name:middle_name,
                last_name:last_name,
                password:password,
                confirm_password:confirm_password
            },
            success:function(response){
                if(response=="Record inserted successfully")
                { alert(response);
                    window.open('index.php');
                }
                else{
                    alert(response);
                }
            }
        })
    });

    $('.login').click(function(e){
        e.preventDefault();
        var username=$('.username').val();
        var password=$('.password').val();
        $.ajax({
            type: 'POST',
            url: 'check.php',
            data: {
                username:username,
                password:password
            },
            success:function(response){
                if(response == 1){
                window.open("form.php");
              }
              else{
                alert("kindlly enter correct data");
              }
                            }

        })
    });   

  /*  window.onload = function() {
       // var type = $('select#logoType').children("option:selected").val();
        var type = $('select#logoType option:selected').val();
        if (type == "text") {
            alert(type);
          //  $('option.text').prop('selected', true);
            $('.logoText').css("display", "block");
            $('.logoFile').css("display", "none");
        } else{
            alert(type);
          //  $('option.image').prop('selected', true);
            $('.logoFile').css("display", "block");
            $('.logoText').css("display", "none");
        }
    };*/


   
    $('select#logoType').change(function(){
        var type =$('select#logoType').children("option:selected").val();
    alert(type);
    console.log(type);
if(type=="text")
{  
    $('.logoText').css("display","block");
    $('.logoFile').css("display","none");
}
else if(type=="image"){
    $('.logoFile').css("display","block");
    $('.logoText').css("display","none");
}
});


var logoFileValue = "<?php echo $row['logoFile']; ?>";
if(logoFileValue !== " ") {
    $('.logoFile').css("display", "block");
    $('.logoText').css("display", "none");
} else if(logoFileValue == " "){
    $('.logoText').css("display", "block");
    $('.logoFile').css("display", "none");
}

   
        $('.submit').click(function(e){
            e.preventDefault();
            var logoText=$('.logoText').val();
        var navItem1=$('.navItem1').val();
        var navItem2=$('.navItem2').val();
        var navItem3=$('.navItem3').val();
        var navItem4=$('.navItem4').val();
        var navItem5=$('.navItem5').val();
        var gradient=$('.gradient').val();
        var whiteHeading=$('.whiteHeading').val();
        var landingPara=$('.landingPara').val();
        var landingButton=$('.landingButton').val();

        var formData = new FormData();
        var fileInput1 = $(".logoFile")[0].files[0];
        formData.append("logoFile", fileInput1);
        formData.append("logoText", logoText);
            formData.append("navItem1",  navItem1);
            formData.append("navItem2",  navItem2);
            formData.append("navItem3",  navItem3);
            formData.append("navItem4",  navItem4);
            formData.append("navItem5",  navItem5);
            formData.append("gradient",  gradient);
            formData.append("whiteHeading", whiteHeading);
            formData.append("landingPara",  landingPara);
            formData.append("landingButton",  landingButton);
        var fileInput2 = $("#landingBackground")[0].files[0];
            formData.append("landingBackground", fileInput2);
            $.ajax({
                type: "POST",
                url: "user_data.php",
                data: formData,
                contentType: false,
                processData: false,
                success:function(response){
                alert(response);
                var parts = response.split('|');
                var msg = parts[0];
                var file_name1 = parts[1];
                var file_name2 = parts[2];
               
                $('.logo1').replaceWith(' <label for="logoFile" class="logo1">'+file_name1 +'</label>');
                $('.logo2').replaceWith('<label for="landingBackground" class="logo2">' + file_name2 + '</label>');
                    }
            });
        });
});