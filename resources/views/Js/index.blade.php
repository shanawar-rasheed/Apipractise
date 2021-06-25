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
                <form action="">
                    @csrf
                <div class="form-group">
                    <label for="first_value">First value</label>
                    <input type="text" id="first_value" placeholder="Please Enter First Number">
                </div>
                <div class="form-group">
                    <label for="second_value">Second</label>
                    <input type="text" id="second_value" placeholder="Please Enter Second Number">
                </div>
                <div class="form-group">
                    <label for="first_value">Operator</label>
                    <input type="text" id="operator"placeholder="Please Enter Operator" onclick=calculate()>
                </div>
                <div class="form-group">
                    <label for="first_value">Result</label>
                    <input type="text" id="total" onclick=calculate()>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="scripts/main.js">>
    function calculate()
    {
       let num1= $(document).getElementById("first_value").value;
       let num2= $(document).getElementById("second_value").value;
       let totol=num1.value+num2.value;
       return total;
    }
</script>
</html>
