<!DOCTYPE html>
<html lang="en">
<?php 
            if (session_status() != PHP_SESSION_NONE) {
               echo "string";
                unset($_SESSION['user']);
                 unset($_SESSION['pass']);
                 session_destroy();
                 //header('Location: login.php');
}
 ?>
<head>        <!-- Required meta tags -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!-- documentation at http://getbootstrap.com/docs/4.0/, alternative themes at https://bootswatch.com/4-alpha/ -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/Database/static/styles.css" rel="stylesheet"/>

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    </head>

    <nav class="navbar navbar-expand-md navbar-light bg-light border">
            <a class="navbar-brand" href="/"><span class="blue">D</span><span class="red">B</span> <span class="yellow">P</span><span class="green">R</span><span class="blue">O</span><span class="red">J</span><span class="yellow">E</span><span class="green">C</span><span class="red">T</span></a>
           
        </nav>
    <body>
    <main class="container p-5">
       <form action="validateLogin.php" method="post">
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <button class="btn btn-primary" type="submit">Log In</button>
        </form>
    </main>
    </body>

</html>
