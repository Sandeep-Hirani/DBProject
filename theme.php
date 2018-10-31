

<html lang="en">

    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <!-- documentation at http://getbootstrap.com/docs/4.0/, alternative themes at https://bootswatch.com/4-alpha/ -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/Database/static/styles.css" rel="stylesheet"/>

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    </head>
<?php 
  session_start();
    if ( session_id()==1) {
      $link = "/Database/admin.php";
    }else{
      $link = "/Database/salesPerson.php";
    }
 ?>
    <nav class="navbar navbar-expand-md navbar-light bg-light border" align = "right">
            <a class="navbar-brand" href=<?php echo "$link"   ?>><span class="blue">D</span><span class="red">B</span> <span class="yellow">P</span><span class="green">R</span><span class="blue">O</span><span class="red">J</span><span class="yellow">E</span><span class="green">C</span><span class="red">T</span></a>
           
            <div class="collapse navbar-collapse" id="navbar">
           
                    <ul class="navbar-nav mr-auto mt-2">
                        <?php
                        
                                echo '  <li class="nav-item"><a class="nav-link" href="/Database/show.php">Customer</a></li>';
                                echo '  <li class="nav-item"><a class="nav-link" href="/Database/product.php">Add Product</a></li>';
                                echo '  <li class="nav-item"><a class="nav-link" href="/Database/salesreturn.php">Sales return</a></li>';
                            if (session_id()==1) {
                                echo '  <li class="nav-item"><a class="nav-link" href="/Database/user.php">Users</a></li>';
                                echo '  <li class="nav-item"><a class="nav-link" href="/Database/salesorder.php">Sales Order</a></li>';
                            }else
                            {
                                echo '  <li class="nav-item"><a class="nav-link" href="/Database/salesorder.php">Sales Order</a></li>';
                            }
                         ?>
                     </ul>
                    <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ml-auto mt-2">
                        <li class="nav-item"><a class="nav-link" href="/Database/login.php">Log Out</a></li>
                    </ul>
             
            </div>
                   
             
            </div>
        </nav>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    </html>