<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<link rel="icon" href="../favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">    
<link rel="stylesheet" href="../css/aproahp.css" type="text/css" media="screen" title="no title" charset="utf-8">
<style>
#wrapper {
    width: 760px;
    margin: 0 auto;
}

#intro {
    padding-bottom: 10px;
}

h2 {
    margin: 0;
    margin-bottom: 14px;
    padding: 0;
}

.navigation {
	float:left;
}
.scroll {
    height: 620px;
    width: 690px;
    overflow: auto;
    overflow-x: hidden;
    position: relative;
    float: right;
    background: #FFFFFF url(images/content_pane-gradient.gif) repeat-x scroll left bottom;
}

.scrollContainer div.panel {
    padding: 20px;
    height: 210px;
    width: 580px;
}

ul.navigation {
    list-style: none;
    margin: 0;
    padding: 0;
    padding-bottom: 9px;
}

ul.navigation li {
    display: block;
    margin-right: 10px;
}

ul.navigation a {
    padding: 10px;
    color: #000;
    text-decoration: none;
}

ul.navigation a:hover {
    background-color: #f6f6f6;
}

ul.navigation a.selected {
    background-color: #fff;
}

ul.navigation a:focus {
    outline: none;
}

.scrollButtons {
    position: absolute;
    top: 150px;
    cursor: pointer;
}

.scrollButtons.left {
    left: -20px;
}

.scrollButtons.right {
    right: -20px;
}

.hide {
    display: none;
}
</style>

<title>Web oficial de Aproahp</title>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
//-->
</script>
</head>

<body>
<div id="container"><!-- inicio container -->	
<?php require("../header.php");?>
	  <ul class="navigation">
	    <li><a href="#entidades" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('entidades','','images/enlaces_btn_over_03.gif',1)"><img src="images/enlaces_btn_03.gif" width="223" height="105" border="0" id="entidades2" /></a></li>
	    <li><a href="#organismos"><img src="images/enlaces_btn_06.gif" width="223" height="105" alt="Enlaces Btn 06"></a></li>
	    <li><a href="#boletines"><img src="images/enlaces_btn_08.gif" width="223" height="105" alt="Enlaces Btn 08"></a></li>
	    <li><a href="#otros"><img src="images/enlaces_btn_10.gif" width="223" height="105" alt="Enlaces Btn 10"></a></li>
	  </ul>

	  <!-- element with overflow applied -->
	  <div class="scroll">
	    <!-- the element that will be scrolled during the effect -->
	    <div class="scrollContainer">
	      <!-- our individual panels -->
	      <div class="panel" id="entidades">
				<h2 class="section"><b>Entidades colaboradoras</b></h2><br/>
				<div class="cuadrito">
					<a href="https://www.bancsabadell.com" target="_blank"><img src="images/bancosantander.gif" width="130" height="80" alt="Bancosantander"></a>
					<p>BancoSabadell (en castellano)</p>
				</div>
				<div class="cuadrito">
					<a href="https://www.cajamadrid.es" target="_blank"><img src="images/logo_cm.gif" width="63" height="80" alt="Logo Cm"></a>
					<p>Caja Madrid</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.cef.es/" target="_blank"><img src="images/cef.gif" width="103" height="80" alt="Cef"></a>
					<p>Centro de Estudios Financieros (C.E.F.)</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.efl.es/" target="_blank"><img src="images/ediciones_francis_lefebvre.gif" width="146" height="80" alt="Ediciones Francis Lefebvre"></a>
					<p>Ediciones Francis Lefebvre</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.repsol.com/es_es/productos_y_servicios/tarjetas/solred/" target="_blank"><img src="images/solred.gif" width="122" height="80" alt="Solred"></a>
					<p>Solred<br/>Repsol, Campsa, Petronor.</p>
				</div>
			</div>
			<div class="panel" id="organismos">
				<h2 class="section"><b>Organismos Oficiales</b></h2><br/>	
				<div class="cuadrito">
					<a href="http://www.060.es/" target="_blank"><img src="images/060.png" width="91" height="80" alt="060"></a>
					<p>El Portal del Ciudadano</p>
				</div>
				<div class="cuadrito">
					<a href="https://www.aeat.es" target="_blank"><img src="images/aeat-logo.gif" width="129" height="80" alt="Aeat Logo"></a>
					<p>Agencia Estatal de Administración Tributaria</p>
				</div>
				<div class="cuadrito">
					<a href="https://www.bne.es" target="_blank"><img src="images/biblioteca_nacional.gif" width="83" height="80" alt="Biblioteca Nacional"></a>
					<p>Biblioteca Nacional</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.catastro.minhac.es/" target="_blank"><img src="images/logo_catastro.gif" width="100" height="80" alt="Logo Catastro"></a>
					<p>Catastro</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.mpt.gob.es" target="_blank"><img src="images/logoMPT.gif" width="265" height="80" alt="LogoMPT"></a>
					<p>Centro de Información Administrativa</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.congreso.es/portal/page/portal/Congreso/Congreso" target="_blank"><img src="images/congreso_diputados.gif" width="150" height="80" alt="Congreso Diputados"></a>
					<p>Congreso de los Diputados </p>
				</div>
				<div class="cuadrito">
				<a href="http://www.ine.es/" target="_blank"><img src="images/ine.gif" width="150" height="80" alt="Ine"></a>
					<p>Instituto Nacional de Estadística</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.mpt.gob.es/index.html" target="_blank"></a>
					<p>M.A.P. </p>
				</div>
				<div class="cuadrito">
					<a href="https://www.meh.es" target="_blank"><img src="images/meh.gif" width="182" height="80" alt="Meh"></a>
					<p>Ministerio de Economía y Hacienda</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.justicia.es" target="_blank"><img src="images/ministerio_justicia.gif" width="150" height="80" alt="Ministerio Justicia"></a>
					<p>Ministerio de Justicia</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.mpt.gob.es/muface/" target="_blank"><img src="images/LogoMUFACE.gif" width="137" height="80" alt="LogoMUFACE"></a>
					<p>Mutualidad Gral. de Funcionarios Civiles del Estado</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.patrimonionacional.es/" target="_blank"><img src="images/patrimonio_nacional.gif" width="148" height="80" alt="Patrimonio Nacional"></a>
					<p>Patrimonio Nacional</p>
				</div>
				<div class="cuadrito">
				<a href="http://www.senado.es/" target="_blank"><img src="images/senado.gif" width="49" height="80" alt="Senado"></a>
					<p>Senado</p>
				</div>
				<div class="cuadrito">
				<a href="http://europa.eu/old-address.htm" target="_blank"><img src="images/ue.gif" width="118" height="80" alt="Ue"></a>
					<p>Unión Europea</p>
				</div>
		  </div>
	      <div class="panel" id="boletines">
				<h2 class="section"><b>Boletines oficiales</b></h2><br/>	
				<div class="cuadrito">
					<a href="http://europa.eu.int/eur-lex/es/oj/index.html" target="_blank"><img src="images/EUROLEX.gif" width="161" height="80" alt="EUROLEX"></a>
					<p>DOCE - Diario Oficial de las Comunidades Europeas</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.boe.es/" target="_blank"><img src="images/boe.gif" width="235" height="80" alt="Boe"></a>
					<p>B.O.E. <br/>Boletín Oficial del Estado </p>
				</div>
				<div class="cuadrito">
					<a href="http://www.juntadeandalucia.es/boja/boletines/2011/92/index.html" target="_blank"><img src="images/banderitas/andalucia.png" width="60" height="40" alt="Andalucia"></a>
					<p>Andalucía</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.aragon.es/" target="_blank"><img src="images/banderitas/aragon.png" width="61" height="40" alt="Aragon"></a>
					<p>Aragón</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.princast.es/bopa/index.htm" target="_blank"><img src="images/banderitas/asturias.png" width="60" height="40" alt="Asturias"></a>
					<p>Principado de Asturias</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.caib.es" target="_blank"><img src="images/banderitas/baleares.png" width="61" height="40" alt="Baleares"></a>
					<p>Baleares </p>
				</div>
				<div class="cuadrito">
					<a href="http://www.gobcan.es/" target="_blank"><img src="images/banderitas/canarias.png" width="61" height="40" alt="Canarias"></a>
					<p>Canarias</p>
				</div>
				<div class="cuadrito">
					<a href="http://boc.cantabria.es/boces/" target="_blank"><img src="images/banderitas/cantabria.png" width="59" height="40" alt="Cantabria"></a>
					<p>Cantabria</p>
				</div>
				<div class="cuadrito">
					<a href="http://bocyl.jcyl.es/" target="_blank"><img src="images/banderitas/castilla_león.png" width="53" height="40" alt="Castilla LeóN"></a>
					<p>Castilla y León</p>
				</div>
				<div class="cuadrito">
					<a href="#" target="_blank"><img src="images/banderitas/castilla_mancha.png" width="80" height="40" alt="Castilla Mancha"></a>
					<p>Castilla la Mancha</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.gencat.cat/" target="_blank"><img src="images/banderitas/cataluña.png" width="61" height="40" alt="CataluñA"></a>
					<p>Cataluña</p>
				</div>
				<div class="cuadrito">
					<a href="http://ciceuta.es/" target="_blank"><img src="images/banderitas/ceuta.png" width="60" height="40" alt="Ceuta"></a>
					<p>Ceuta</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.juntaex.es/" target="_blank"><img src="images/banderitas/extremadura.png" width="60" height="40" alt="Extremadura"></a>
					<p>Extremadura</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.xunta.es/diario-oficial-galicia" target="_blank"><img src="images/banderitas/galicia.png" width="60" height="40" alt="Galicia"></a>
					<p>Galicia</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.larioja.org" target="_blank"><img src="images/banderitas/rioja.png" width="60" height="40" alt="Rioja"></a>
					<p>La Rioja</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.bocm.es" target="_blank"><img src="images/banderitas/madrid.png" width="63" height="40" alt="Madrid"></a>
					<p>Madrid</p>
				</div>
				<div class="cuadrito">
					<a href="#" target="_blank"><img src="images/banderitas/melilla.jpeg" width="60" height="40" alt="Melilla"></a>
					<p>Melilla</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.carm.es" target="_blank"><img src="images/banderitas/murcia.png" width="62" height="40" alt="Murcia"></a>
					<p>Murcia</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.navarra.es/home_es/" target="_blank"><img src="images/banderitas/navarra.png" width="60" height="40" alt="Navarra"></a>
					<p>Navarra</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.euskadi.net" target="_blank"><img src="images/banderitas/pais_vasco.png" width="72" height="40" alt="Pais Vasco"></a>
					<p>País Vasco</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.gva.es/servic/predocas.htm" target="_blank"><img src="images/banderitas/valencia.png" width="60" height="40" alt="Valencia"></a>
					<p>Valencia</p>
				</div>
			</div>
			<div class="panel" id="otros">
			<h2 class="section"><b>Otros enlaces de interés</b></h2>
				<h5><a name="editoriales">EDITORIALES Y FORMACIÓN</a></h5><br/>
				<div class="cuadrito">
					<a href="http://www.anayamultimedia.es/" target="_blank"><img src="images/anaya.jpg" width="160" height="80" alt="Anaya"></a>
					<p>Anaya Multimedia</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.aranzadi.es/" target="_blank"><img src="images/aranzadi.gif" width="154" height="80" alt="Aranzadi"></a>
					<p>Aranzadi</p>
				</div>
				<div class="cuadrito">
					<a href="www.areaint.com/ " target="_blank"><img src="images/areaint.gif" width="172" height="80" alt="Areaint"></a>
					<p>Area Interactiva</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.cef.es/" target="_blank"><img src="images/cef.gif" width="103" height="80" alt="Cef"></a>
					<p>Centro de Estudios Financieros (C.E.F.)</p>
				</div>
				<div class="cuadrito">
					<a href="#" target="_blank"><img src="images/chh.jpg" width="64" height="80" alt="Chh"></a>
					<p>Centro de Estudios Fundación CHH<br/>
				</div>
				<div class="cuadrito">
					<a href="http://www.ciss.es/" target="_blank"><img src="images/ciss.png" width="162" height="80" alt="Ciss"></a>
					<p>CISS (ediciones fiscales)</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.aranzadi.es/" target="_blank"><img src="images/civitas.gif" width="160" height="80" alt="Civitas"></a>
					<p>CIVITAS</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.grupocto.es/web/index.asp" target="_blank"><img src="images/cto.gif" width="163" height="80" alt="Cto"></a>
					<p>CTO (preparación de oposiciones)</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.efl.es/" target="_blank"><img src="images/ediciones_francis_lefebvre.gif" width="146" height="80" alt="Ediciones Francis Lefebvre"></a>
					<p>Editorial Francis Lefebvre</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.campusesine.com/" target="_blank"><img src="images/esine.gif" width="167" height="80" alt="Esine"></a>
					<p>ESINE</p>
				</div>
				<div class="cuadrito">
					<a href="http://auladigital.com/" target="_blank"><img src="images/aula_digital.gif" width="221" height="80" alt="Aula Digital"></a>
					<p>Informática (cursos gratis)</p>
				</div>

		<h5><a name="juridico">JURÍDICO - FISCAL</a></h5><br/>
				<div class="cuadrito">
					<a href="http://www.aedaf.es/" target="_blank"><img src="images/aedaf.gif" width="250" height="80" alt="Aedaf"></a>
					<p>Asociación Española de Asesores Fiscales</p>
				</div>
				<div class="cuadrito">
					<a href="http://europa.eu/old-address.htm" target="_blank"><img src="images/base_doc.gif" width="63" height="80" alt="Base Doc"></a>
					<p>Base documental derecho comunitario</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.expansion.net/" target="_blank"><img src="images/logo_expansion.gif" width="270" height="80" alt="Logo Expansion"></a>
					<p>Expansión-fiscal</p>
				</div>

		<h5><a name="prensa">PRENSA</a></h5><br/>
				<div class="cuadrito">
					<a href="http://www.aquieuropa.com/" target="_blank"><img src="images/aki_europa.gif" width="257" height="80" alt="Aki Europa"></a>
					<p>Aquí Europa Periódico digital</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.periodistadigital.com/" target="_blank"><img src="images/periodico.gif" width="300" height="80" alt="Periodico"></a>
					<p>Periodista Digital</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.abc.es/" target="_blank"><img src="images/abc.gif" width="196" height="80" alt="Abc"></a>
					<p>Diario ABC</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.cincodias.com/" target="_blank"><img src="images/5dias.gif" width="300" height="80" alt="5dias"></a>
					<p>Cinco Días</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.estrelladigital.es/" target="_blank"><img src="images/estrella_digital.gif" width="300" height="80" alt="Estrella Digital"></a>
					<p>Estrella Digital</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.expansion.com/" target="_blank"><img src="images/diario_expansion.gif" width="285" height="80" alt="Diario Expansion"></a>
					<p>Diario Expansión</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.elmundo.es/" target="_blank"><img src="images/el_mundo.gif" width="295" height="80" alt="El Mundo"></a>
					<p>Diario El Mundo</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.elpais.com/" target="_blank"><img src="images/el_pais.gif" width="295" height="80" alt="El Pais"></a>
					<p>Diario El País</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.larazon.es/" target="_blank"><img src="images/la_razon.gif" width="295" height="80" alt="La Razon"></a>
					<p>La Razón</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.lavanguardia.com/" target="_blank"><img src="images/la_vanguardia.gif" width="295" height="80" alt="La Vanguardia"></a>
					<p>La Vanguardia</p>
				</div>

		<h5><a name="ocio">OCIO</a></h5><br/>

			<h6>Aventura, naturaleza, turismo rural</h6><br/>
				<div class="cuadrito">
					<a href="http://www.andarines.com/" target="_blank"><img src="images/andarines.gif" width="295" height="80" alt="Andarines"></a>
				<p>Senderismo</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.casalafonte.com/" target="_blank"><img src="images/la_fonte.gif" width="295" height="80" alt="La Fonte"></a>
				<p>Alojamiento rural en Asturias</p>
				</div>
				<div class="cuadrito">
					<a href="http://www.casalafonte.com/" target="_blank"><img src="images/quercus.gif" width="295" height="80" alt="Quercus"></a>
				<p>Turismo rural - Naturaleza</p>
				</div>
				<div class="cuadrito">
				<a href="http://www.piedrasobrepiedra.com/" target="_blank"><img src="images/piedra.gif" width="295" height="80" alt="Piedra"></a>	
				<p>Montaña y fotografía</p>
				</div>
			<h6>Espectáculos</h6><br/>
				<div class="cuadrito">
				<a href="http://www.entradas.com/" target="_blank"><img src="images/entradas.gif" width="219" height="80" alt="Entradas"></a>	
				<p>Cine, teatro... (reserva de entradas)</p>
				</div>
			<h6>Humor</h6><br/>
				<div class="cuadrito">
					<a href="http://www.paisdelocos.com/" target="_blank"><img src="images/pais_locos.gif" width="219" height="80" alt="Pais Locos"></a>
				<p>País de locos</p>
				</div>
			<h6>Informática</h6><br/>
				<div class="cuadrito">
				<a href="http://auladigital.com/" target="_blank"><img src="images/aula_digital.gif" width="221" height="80" alt="Aula Digital"></a>	
				<p>Cursos de informática</p>
				</div>
			<h6>Literatura</h6><br/>
				<div class="cuadrito">
					<a href="http://www.librodot.com/" target="_blank"><img src="images/librodot.gif" width="146" height="80" alt="Librodot"></a>
				<p>Libros electrónicos gratuitos.</p>
				</div>
				<div class="cuadrito">
				<a href="http://www.cervantesvirtual.com/" target="_blank"><img src="images/cervantes.gif" width="221" height="80" alt="Cervantes">	</a>
				<p>Biblioteca virtual Cervantes</p>
				</div>
			<h6>Motor</h6><br/>
				<div class="cuadrito">
				<a href="http://www.azeler.es/" target="_blank"><img src="images/azeler.gif" width="193" height="80" alt="Azeler"></a>	
				<p>Todo lo relacionado con tu vehículo.</p>
				</div>

		<h5><a name="otro">OTROS</a></h5><br/>
			<h6>Callejeros - Guías</h6><br/>
				<div class="cuadrito">
				<a href="http://www.paginasamarillas.es/" target="_blank"><img src="images/paginas_amarillas.gif" width="300" height="80" alt="Paginas Amarillas">	</a>
				<p>Guías telefónicas (AMARILLAS)</p>
				</div>
				<div class="cuadrito">
				<a href="http://blancas.paginasamarillas.es/jsp/home.jsp" target="_blank"><img src="images/paginas_blancas.gif" width="189" height="80" alt="Paginas Blancas"></a>	
				<p>Guías telefónicas (BLANCAS)</p>
				</div>
				<div class="cuadrito">
					<a href="http://es.qdq.com/" target="_blank"><img src="images/qdq.gif" width="133" height="80" alt="Qdq"></a>
				<p>QDQ guía telefónica (fotos y mapas)</p>
				</div>

			<h6>Sindicatos y organizaciones profesionales</h6><br/>
				<div class="cuadrito">
					<a href="http://www.aedaf.es/" target="_blank"><img src="images/aedaf.gif" width="250" height="80" alt="Aedaf"></a>
				<p>Asociación Española de Asesores Fiscales</p>
				</div>
				<div class="cuadrito">
				<a href="http://www.ichh.net/CHHWEB/CHH" target="_blank"><img src="images/icchh.gif" width="85" height="80" alt="Icchh"></a>	
				<p>Colegio de Huérfanos de Hacienda</p>
				</div>
				<div class="cuadrito">
				<a href="http://www.ccoo.es/csccoo/menu.do" target="_blank"><img src="images/ccoo.gif" width="148" height="80" alt="Ccoo"></a>	
				<p>CC.OO.</p>
				</div>
				<div class="cuadrito">
				<a href="http://www.ccoo.es/csccoo/menu.do" target="_blank"><img src="images/ccoo2.gif" width="213" height="80" alt="Ccoo2"></a>
				<p>CC.OO. administraciones públicas.</p> 
				</div>
				<div class="cuadrito">
				<a href="http://www.csi-csif.es/nacional/" target="_blank"><img src="images/csif.gif" width="121" height="80" alt="Csif"></a>	
				<p>CSI-CSIF</p>
				</div>
				<div class="cuadrito">
				<a href="http://www.sindicatosiat.com/" target="_blank"><img src="images/siat.gif" width="206" height="80" alt="Siat"></a>
				<p>S.I.A.T.</p>
				</div>
				<div class="cuadrito">
				<a href="http://www.ugt.es/" target="_blank"><img src="images/ugt.gif" width="75" height="80" alt="Ugt"></a>
				<p>UGT</p>
				</div>
				<div class="cuadrito">
				<a href="http://www.uso.es/" target="_blank"><img src="images/uso.gif" width="277" height="80" alt="Uso"></a>
				<p>USO</p><br/>
				</div>	
			<h6>Varios</h6><br/>
				<div class="cuadrito">
				<a href="http://www.canaltrabajo.com/" target="_blank"><img src="images/canal_trabajo.gif" width="253" height="80" alt="Canal Trabajo"></a>
				<p>Canal trabajo</p>
				</div>
				<div class="cuadrito">
				<p>Traductor de la Unión Europea</p><br/>
				</div>
			</div>
	    </div>
	  </div>
	<div style="clear: both;">&nbsp;</div>
</div><!-- fin container -->
<?php require("../footer.html");?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/script.js" type="text/javascript" charset="utf-8"></script>
<script src="../js/curvycorners.js" type="text/javascript"></script>
<script src="jquery.scrollTo-1.3.3-min.js" type="text/javascript"></script>
<script src="jquery.localscroll-1.2.5-min.js" type="text/javascript"></script>
<script src="jquery.serialScroll-1.2.1-min.js" type="text/javascript"></script>
<script>
	// when the DOM is ready...
	$(document).ready(function () {

	var $panels = $('#container .scrollContainer > div');
	var $container = $('#container .scrollContainer');

	// if false, we'll float all the panels left and fix the width 
	// of the container
	var horizontal = false;

	// float the panels left if we're going horizontal
	if (horizontal) {
	  $panels.css({
	    'float' : 'left',
	    'position' : 'relative' // IE fix to ensure overflow is hidden
	  });

	  // calculate a new width for the container (so it holds all panels)
	  $container.css('width', $panels[0].offsetWidth * $panels.length);
	}

	// collect the scroll object, at the same time apply the hidden overflow
	// to remove the default scrollbars that will appear
	var $scroll = $('#slider .scroll').css('overflow', 'hidden');

	// apply our left + right buttons
	$scroll
	  .before('<img class="scrollButtons left" src="images/scroll_left.png" />')
	  .after('<img class="scrollButtons right" src="images/scroll_right.png" />');

	// handle nav selection
	function selectNav() {
	  $(this)
	    .parents('ul:first')
	      .find('a')
	        .removeClass('selected')
	      .end()
	    .end()
	    .addClass('selected');
	}

	$('#container .navigation').find('a').click(selectNav);

	// go find the navigation link that has this target and select the nav
	function trigger(data) {
	  var el = $('#container .navigation').find('a[href$="' + data.id + '"]').get(0);
	  selectNav.call(el);
	}

	if (window.location.hash) {
	  trigger({ id : window.location.hash.substr(1) });
	} else {
	  $('ul.navigation a:first').click();
	}

	// offset is used to move to *exactly* the right place, since I'm using
	// padding on my example, I need to subtract the amount of padding to
	// the offset.  Try removing this to get a good idea of the effect
	var offset = parseInt((horizontal ? 
	  $container.css('paddingTop') : 
	  $container.css('paddingLeft')) 
	  || 0) * -1;


	var scrollOptions = {
	  target: $scroll, // the element that has the overflow

	  // can be a selector which will be relative to the target
	  items: $panels,

	  navigation: '.navigation a',

	  // selectors are NOT relative to document, i.e. make sure they're unique
	  prev: 'img.left', 
	  next: 'img.right',

	  // allow the scroll effect to run both directions
	  axis: 'xy',

	  onAfter: trigger, // our final callback

	  offset: offset,

	  // duration of the sliding effect
	  duration: 1000,

	  // easing - can be used with the easing plugin: 
	  // http://gsgd.co.uk/sandbox/jquery/easing/
	  easing: 'swing'
	};

	// apply serialScroll to the slider - we chose this plugin because it 
	// supports// the indexed next and previous scroll along with hooking 
	// in to our navigation.
	$('#container').serialScroll(scrollOptions);

	// now apply localScroll to hook any other arbitrary links to trigger 
	// the effect
	$.localScroll(scrollOptions);

	// finally, if the URL has a hash, move the slider in to position, 
	// setting the duration to 1 because I don't want it to scroll in the
	// very first page load.  We don't always need this, but it ensures
	// the positioning is absolutely spot on when the pages loads.
	scrollOptions.duration = 1;
	$.localScroll.hash(scrollOptions);

	});
</script>
</body>
</html>
