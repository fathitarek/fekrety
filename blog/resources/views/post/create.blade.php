<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Create Customer</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Create Customer</h1>
            <form method = 'get' action = '{{url("customer")}}'>
                <button class = 'btn blue'>Customer Index</button>
            </form>
            <br>
            <form method = 'POST' action = '{{url("customer")}}'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="input-field col s6">
                    <input id="name" name = "name" type="text" class="validate">
                    <label for="name">name</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="email" name = "email" type="text" class="validate">
                    <label for="email">email</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="mobile" name = "mobile" type="text" class="validate">
                    <label for="mobile">mobile</label>
                </div>
                
                
                <button class = 'btn red' type ='submit'>Create</button>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script>
    $('select').material_select();
    </script>
</html>
