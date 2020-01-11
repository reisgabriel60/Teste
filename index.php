<?php
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);
  session_start(); /* Starts the session */
  if($_SESSION['Active'] == false){ /* Redirects user to Login.php if not logged in */
    header("location:login.php");
	  exit;
  }
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
    <title>Helper editor</title>
  </head>
  <body>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Editor</a></li>
            <li role="presentation"><a href="helpers.php">Helpers existentes</a></li>
            <li role="presentation"><a href="logout.php">LogOut</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Editor de helpers Digifred</h3>
      </div>
      
      <div class="row marketing">
        <form action="index.php" method="post" name="Login_Form" class="form-signin">
          <input name="name" type="username" id="inputUsername" class="form-control" placeholder="Titulo" required autofocus>
          <input name="area" type="text" id="area">

          <button name="Submit" value="Login" class="btn btn-lg btn-primary btn-block" type="submit">Salvar</button>
        </form>
      </div>
    	<?php 
          $hostname="127.0.0.1";
          $username="gabriel_reis";
          $password="919679";
          $dbname="gabriel_reis";
          
          $con = mysqli_connect($hostname,$username, $password,$dbname);
          if (isset($_POST['name'] )) {
          $nome = $_POST['name'];
          $conteudo = $_POST['area'];
          $sql = "INSERT INTO helpers (nome,CONTEUDO) values('".$nome."','".$conteudo."')";
          if ($con->query($sql) === TRUE) {
        	    echo "New record created successfully";
        	} else {
        	    echo "Error: " . $sql . "<br>" . $con->error;
        	}
       }
    	?>

      <footer class="footer">
        <p>&copy; ReisGabriel 2019</p>
      </footer>

    </div>
  </body>
  <link rel="stylesheet" href="jodit/build/jodit.min.css"/>
  <!--link rel="stylesheet" href="jodit/examples/assets/app.css"/-->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,700,700i" rel="stylesheet">
  <script src="https://use.fontawesome.com/c1f20c2bd7.js"></script>

  <script src="jodit/build/jodit.min.js"></script>
  <script src="jodit/examples/assets/prism.js"></script>
  <script src="jodit/examples/assets/app.js"></script>
  <script>
//  var editor = new Jodit('#area', {
//    preset: 'inline'
//  });
  
  var editor1 = new Jodit('#area', {
    removeButtons: ['about','copyformat'],
    minHeight: 500,
  });
  editor1.setEditorValue('<span style="color: #999;">Documentação da Rotina aqui:::</span>')
  var a = editor1.getEditorValue()
  </script>
</html>
