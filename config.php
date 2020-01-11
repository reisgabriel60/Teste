<?php

/* Define username and password */
$Username = "eu";
$Password = "eu";

function CarregaHelper($p='')
{
  $host     = "127.0.0.1";
  $user     = "gabriel_reis";
  $passwd   = "919679";
  $dbname   = "gabriel_reis";
  $tabela   = "helpers";
  $registro = "*";
  if(isset($_GET['p'])){
  	$registro = addslashes($_GET['p']);
  } 

  $con    = mysqli_connect($host,$user, $passwd,$dbname);
  $query  = "SELECT $registro FROM $tabela";
  $result = mysqli_query($con, $query);
  
	if($result){
  		if ($registro != "*") {
	  		$linha = mysqli_fetch_array($result);
	  		$conteudo  = $linha["CONTEUDO"];
	      	$titulo    = $linha["nome"];
	  		echo("<div class='well'><h5 id='titulo'>".$titulo."</h5><div id='conteudo'>".$conteudo."</div></div>");	
	  	}else{
		    while($linha = mysqli_fetch_array($result)){
		      $conteudo  = $linha["CONTEUDO"];
		      $titulo    = $linha["nome"];
		      echo("<div class='well'><div id='area' data-jodit-default-classes='' class='jodit_inline jodit_container jodit_default_theme jodit_toolbar_size-middle jodit_wysiwyg_mode'><a class='aNone' href='".$titulo."'><h5>".$titulo."</h5>".$conteudo."</a></div></div>");
	    	}
	    }
	}else {
    	echo("html>script language='JavaScript'>alert(“Não foi possível se conectar ao banco de dados! 
        	  Tente novamente mais tarde.'),history.go(-1)/script>/html>");
  }
}

function ExistePagina($p=''){
  $host     = "127.0.0.1";
  $user     = "gabriel_reis";
  $passwd   = "919679";
  $dbname   = "gabriel_reis";
  $tabela   = "helpers";
  $registro = "nome"; 
  $p        = addslashes($p);

  $con    = mysqli_connect($host,$user, $passwd,$dbname);
  $query  = "SELECT $registro FROM $tabela WHERE $registro = '$p'";
  $result = mysqli_query($con, $query);
  $rows   = $result->num_rows;
  if ($rows > 0){
  	echo "AAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
  	return True;
  }
  else{
  	echo "BBBBBBBBBBBBBBBBBBBBBBBBBBBBB";
  	return False;
  }
  	
}
?>