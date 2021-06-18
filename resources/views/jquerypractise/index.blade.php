<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <button class=" btn btn-danger mt-2" id="btn">click me</button><br>
                <p id="paraid" class="paraid" >This is paragraph</p><br>
                <p id="btnpara" class="btnpara">This will hide on button click</p><br>
                <p id="togglepara">This will toggle on button click</p><br>

                <button class="btn btn-success mt-2" id="divbtn2" >Click me for div animate</button><br>


                <button class="btn btn-danger mt-2" id="divbtn7" >Click me for remove li </button><br>
            <ul id="ul_id">
                <li>Shanawar</li>
                <li>imran</li>
                <li>rasheed</li>
                <li>amna</li>
            </ul>


            <label for="">Blur function</label>
            <input type="text" name="name" id="name"><br>
            <label for="">focus function</label>
            <input type="text" name="address" id="address"><br>






                <button class="btn btn-success mt-2" id="divbtn5" >Click me for appent text in para</button><br>

                <p id="appendpara">text will append at this paragraph</p><br>
                <button class="btn btn-success mt-2" id="divbtn8" >Click me for ajax </button><br>

            <button class="btn btn-danger mt-2" id="divbtn6" >Click me for empty select items</button><br>
                <select name="selecting" id="selecting">
                    <option value="">pakistan</option>
                    <option value="">iran</option>
                </select><br>

            </div>



            <button class="btn btn-danger mt-2" id="divbtn3" >Click me for callback function</button><br>
            <p id="paraid_3">This will call another function</p><br>

            <button class="btn btn-danger mt-2" id="divbtn4" >Click me for set value</button><br>
            <input type="text" id="inputid1"><br>
        </div>
    </div>
    <button class="btn btn-info mt-2" id="divbtn" class="divbtn">Click me for div fadeout</button><br>
    <div class="container bg-info" id="div_id" >
        <h3>This will fade out on button double click</h3>
    </div>
    <button class="btn btn-success mt-2" id="divbtn1">Click me for div slideDown</button><br>
    <div class="container bg-success" id="div_id1">
        <h3>This  div will scroll</h3>

    </div>



</body>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 <script>
    $(document).ready(function(){
//   $("button").click(function(){
//     $(".btnpara").hide(1000);
//     $("#togglepara").toggle();
//   });

  $("#paraid").mouseenter(function(){
            $('#paraid').css("background-color","red");
  //alert("You entered p1!");
    });
$("#paraid").mouseleave(function(){
    $("#paraid").css("background-color","silver");
});

$("#divbtn").click(function(){
    $("#div_id").fadeOut("slow");
});

$("#divbtn1").click(function(){
    $("#div_id1").slideDown("slow");
});

$("#divbtn2").click(function(){
    $("#div_id2").animate({right:'300px'});
});

$("#divbtn3").click(function(){
    $("#paraid_3").hide("slow",function(){
        alert("This is called by callback function");
    });
});

$("#divbtn4").click(function(){
    $("#inputid1").val("tehran");
});

$("#divbtn5").click(function(){
    $("#appendpara").append("<b>this is appended para. <b>");
});

$("#divbtn6").click(function(){
    $("#selecting").empty();
});

$("#divbtn7").click(function(){
    $("#ul_id").remove();
});


$("#name").blur(function(){
    $(this).css("background-color","red");
});
$("#address").focus(function(){
    $(this).css("background-color","green");
});

$("#divbtn8").click(function(){
    $.get("demo_test.asp", function(data, status){
      alert("Data: " + data + "\nStatus: " + status);
    });
  });
















});
</script>



</html>
