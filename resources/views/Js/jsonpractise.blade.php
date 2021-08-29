<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Putting User Input into JS Objects</title>
    <style>
        .formBox{
            padding: 0.5rem 2rem;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    {{-- <form action="{{ route('jsonpractise.store') }}" method="POST" class=" form-group"> --}}
    <div class="container mt-5">
        <h3 class="ml-5">Appending form input fields Data into json Using Ajax</h3>
        <form  class=" form-group ">
        <div class="formBox">
            <label for="title">Movie</label>
            <input type="text" id="title" placeholder="Title" class="form-control"/>
        </div>
        <div class="formBox">
            <label for="yr">Year</label>
            <input type="number" id="yr" placeholder="Year"class="form-control"/>
        </div>
        <div class="formBox">
            <label for="name">Name</label>
            <input type="text" id="name" placeholder="name"class="form-control"/>
        </div>
        <div class="formBox">
            <button id="btn" class="btn btn-success">Click to Add</button>
        </div>
        
        <div id="msg">
            <pre></pre>
        </div>
    </form>
    <div class="formBox">
        <label for="jsondata">Json Data</label>
        <input type="text" id="jsondata" class="form-control"/>
    </div>
</div>


    <script>
       // let questioner=[]; 
        let buttonid=document.getElementById('btn');
        buttonid.addEventListener('click',jsonencoding);
        function jsonencoding(e)
        {
        e.preventDefault();
        let questioner = {
                 id: Date.now(),
                 title: document.getElementById('title').value,
                 year: document.getElementById('yr').value,
                 name: document.getElementById('name').value
             }
           // console.log(jsonobject); 
           // questioner.push(jsonobject);
        $.ajax({
//             headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   },
        url:"{{ route('jsonpractise.store') }}",
        type:"POST",
        data:{
            questioner:questioner,
            _token: '{{csrf_token()}}',
        },
        success:function(response)
        {   
            console.log(response.questioner);
            $("#jsondata").val(response.questioner);
        }
      });

         }
      
  
      
  </script>
    


    {{-- <script>
        let movies = [];
        // example {id:1592304983049, title: 'Deadpool', year: 2015}
        const addMovie = (ev)=>{
            ev.preventDefault();  //to stop the form submitting
            let movie = {
                id: Date.now(),
                title: document.getElementById('title').value,
                year: document.getElementById('yr').value,
                name: document.getElementById('name').value
            }
            movies.push(movie);
            console.log(movies);
            document.forms[0].reset(); // to clear the form for the next entries
            //document.querySelector('form').reset();

            //for display purposes only
            console.warn('added' , {movies} );
            let pre = document.querySelector('#msg pre');
            pre.textContent = '\n' + JSON.stringify(movies, '\t', 3);

            //saving to localStorage
            localStorage.setItem('MyMovieList', JSON.stringify(movies) );
        }
        document.addEventListener('DOMContentLoaded', ()=>{
            document.getElementById('btn').addEventListener('click', addMovie);
        });
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>