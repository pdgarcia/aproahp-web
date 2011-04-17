<?php
$parts = Explode('/', $_SERVER["PHP_SELF"]);
$paginaactual= $parts[count($parts) - 1];

$menu = array (array ( "Name" => "Noticias","Link" => "index.php"),
			   array ( "Name" => "Documentos","Link" => "documentos.php"),
			   array ( "Name" => "Rincon del Agente","Link" => "rincondelagente.php"),
			   array ( "Name" => "Opositores","Link" => "opositores.php"), 
			   array ( "Name" => "Usuarios","Link" => "usuarios.php"),
			   array ( "Name" => "Ir a Sitio","Link" => "../index.php")              );
//print_r($menu);
?>
<div id="header"> <!-- inicio header -->
	<div id="logo"><img src="../images/logo.gif" width="230" height="86" alt="Logo">
	</div>
	
	<div id="search">
		<?php echo $_SESSION['DisplayName'] ?>-<a href="login.php?status=loggedout">[Desconectar]</a>
	</div>
	<div id="letras"><h2>Asociación Profesional de Agentes de la Hacienda Pública</h2></div>
</div> <!-- fin header -->

<div id="menu"> <!-- inicio menu -->
	<ul>
<?php 
foreach($menu as $item){		
		if(strcmp($paginaactual, $item['Link'])==0)
			echo('<li class="active">');
		else
			echo('<li>');
		echo('<a href="'.$item['Link'].'"><b>'.$item['Name'].'</b></a></li>');
}?>
	</ul>

</div> <!-- fin menu -->
