

<?php

$parts = Explode('/', $_SERVER["PHP_SELF"]);
$paginaactual= $parts[count($parts) - 1];

if(strcmp($paginaactual, "index.php")==0)
	$folder ="";
else
	$folder ="../";

$menu = array (array ( "Name" => "Inicio","Link" => "index.php","Subfolder" => ""),
			   array ( "Name" => "Quiénes somos","Link" => "kienes.php","Subfolder" => "kienes/"),
			   array ( "Name" => "Asesoría jurídica","Link" => "asesoria.php","Subfolder" => "asesoria/"),
			   array ( "Name" => "Enlaces","Link" => "enlaces.php","Subfolder" => "enlaces/"),
			   array ( "Name" => "Noticias","Link" => "noticias.php","Subfolder" => "noticias/"),
			   array ( "Name" => "Opositores","Link" => "opositores.php","Subfolder" => "opositores/"),
			   array ( "Name" => "Rincón del agente","Link" => "rinconagente.php","Subfolder" => "rinconagente/"),
			   array ( "Name" => "Contacto","Link" => "contacto.php","Subfolder" => "contacto/")
              );
//print_r($menu);
?>
<div id="header"> <!-- inicio header -->
	<?php echo('<div id="logo"><img src="'.$folder.'images/logo.gif" width="230" height="86" alt="Logo">');?>
	</div>
	
	<div id="search">
		<form method="get" action="<?php echo $folder ?>search/search.php">
			<fieldset>
			<input id="searchinput" type="text" name="searchinput" value="Buscar..." onblur="if(this.value.length == 0) this.value='Buscar...';" onclick="if(this.value == 'Buscar...') this.value='';" />
			<input id="searchsubmit" type="submit" value="Search" />
			</fieldset>
		</form>
	</div>
	<?php echo('<div id="letras"><h2>'."Asociación Profesional de Agentes de la Hacienda Pública".'</h2>');?>
</div>
	
</div> <!-- fin header -->

<div id="menu"> <!-- inicio menu -->
	<ul>
		<?php 
		foreach($menu as $item){		
				if(strcmp($paginaactual, $item['Link'])==0)
					echo('<li class="active">');
				else
					echo('<li>');
				echo('<a href="'.$folder.$item['Subfolder'].$item['Link'].'"><b>'.$item['Name'].'</b></a></li>');
		}?>
			</ul>

</div> <!-- fin menu -->
