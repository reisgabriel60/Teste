<?php
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);

  session_start(); /* Starts the session */

  if($_SESSION['Active'] == false){ /* Redirects user to Login.php if not logged in */
    header("location:login.php");
    exit;
  }
  include_once ('config.php');
?>

<!-- Show password protected content down here -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link rel="icon" type="image/png" href="jodit/exemples/assets/icon.png" />
    <style type="text/css">
      .aNone a:hover, a:visited, a:link, a:active{
        text-decoration: none;
        text-decoration-color: unset;
        text-decoration-style: unset;
        text-decoration-line: none;
        color: currentColor;
      }
    </style>
    <title>Helpers Digifred</title>
  </head>
  <body>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="index.php">Editor</a></li>
            <li role="presentation" class="active"><a href="#">Helpers existentes</a></li>
            <li role="presentation"><a href="logout.php">LogOut</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Helpers Existentes</h3>
      </div>
      <div class="marketing">
      <?php
        if(!(isset($_GET['page']) && ExistePagina($_GET['page']))){
          echo("<form action='helpers.php' method='get' name='search' class='form-search'>
            <div class='input-group'>
              <input type='text' class='form-control' placeholder='Nome da rotina' name='page'>
              <div class='input-group-btn'>
                <button class='btn btn-default' type='submit'><i class='glyphicon glyphicon-search'></i></button>
              </div>
            </div>
          </form>
          <div class='panel-group'>");
        }
        CarregaHelper(); 
        ?>
        </div>
      </div>
      <footer class="footer">
        <p>&copy; ReisGabriel 2019 with bootstap</p>
      </footer>

    </div>
  </body>
</html>
