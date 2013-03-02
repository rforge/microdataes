
<!-- This is the project specific website template -->
<!-- It can be changed as liked or replaced by other content -->

<?php

$domain=ereg_replace('[^\.]*\.(.*)$','\1',$_SERVER['HTTP_HOST']);
$group_name=ereg_replace('([^\.]*)\..*$','\1',$_SERVER['HTTP_HOST']);
$themeroot='r-forge.r-project.org/themes/rforge/';

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en   ">

  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $group_name; ?></title>
	<link href="http://<?php echo $themeroot; ?>styles/estilo1.css" rel="stylesheet" type="text/css" />
  </head>

<body>

El paquete MicroDatosEs está pensado para automatizar la lectura de ficheros de microdatos producidos por organismos estadísticos españoles (el INE y demás).

Consta de dos partes: una estructura genérica para permitir la lectura de <em>cualquier</em> fichero de microdatos y conjuntos de ficheros de metadatos que, utilizando la estructura genérica, permiten leer ficheros concretos de microdatos.


<h2>Ejemplo de lectura de los microdatos de la EPA</h2>

En este ejemplo voy a utilizar los datos de la Encuesta de Población Activa del INE correspondiente al primer trimestre del 2012 que pueden descargarse de las <a href="http://www.ine.es/prodyser/micro_epa.htm">páginas del INE</a> o directamente de su <a href="ftp://www.ine.es/temas/epa/datos_1t12.zip">enlace directo</a>.

Se trata de un fichero comprimido que, obviamente, tenemos que descomprimir, para obtener un fichero de texto llamado <code>EPAwebT0112</code> con un contenido prácticamente ininteligible. Haciendo

<div style="overflow: auto;">
<div class="geshifilter">
<pre class="r geshifilter-R" style="font-family: monospace;"><a href="http://inside-r.org/r-doc/base/library"><span style="color: #003399; font-weight: bold;">library</span></a><span style="color: #009900;">(</span>MicroDatosEs<span style="color: #009900;">)</span>
epa <span>&lt;-</span> epa2005<span style="color: #009900;">(</span><span style="color: #0000ff;">"EPAwebT0112"</span><span style="color: #009900;">)</span></pre>
</div>
</div>

se carga este fichero en R. El objeto resultante es de la clase <code>data.set</code>, una estructura de datos similar a un <code>dataframe</code> definido en el <a href="http://cran.r-project.org/web/packages/memisc/index.html">paquete <code>memisc</code></a> y que dispone de ciertos instrumentos y estructuras de datos que lo hacen muy adecuado para trabajar con información procedente de encuestas. De hecho, quien quiera usar R en este ámbito, haría bien en, cuando menos, familiarizarse con <a href="http://cran.r-project.org/web/packages/memisc/vignettes/anes48.pdf">la viñeta del paquete</a>.

Para inspeccionar el contenido del objeto <code>epa</code> se puede hacer <code>summary(epa)</code> y luego seleccionar las variables de interés mediante
<div style="overflow: auto;">
<div class="geshifilter">
<pre class="r geshifilter-R" style="font-family: monospace;">dat <span>&lt;-</span> <a href="http://inside-r.org/r-doc/base/subset"><span style="color: #003399; font-weight: bold;">subset</span></a><span style="color: #009900;">(</span> epa<span style="color: #339933;">,</span> select = <a href="http://inside-r.org/r-doc/base/c"><span style="color: #003399; font-weight: bold;">c</span></a><span style="color: #009900;">(</span> edad<span style="color: #339933;">,</span> sexo<span style="color: #339933;">,</span> nforma<span style="color: #339933;">,</span> aoi<span style="color: #339933;">,</span> factorel<span style="color: #009900;">)</span> <span style="color: #009900;">)</span></pre>
</div>
</div>
que corresponden a la edad, sexo, nivel de formación, estado ocupacional y el factor de elevación de los individuos encuestados. Puedo recodificar niveles así:
<div style="overflow: auto;">
<div class="geshifilter">
<pre class="r geshifilter-R" style="font-family: monospace;">dat<span>$</span>aoi <span>&lt;-</span> recode<span style="color: #009900;">(</span>dat<span>$</span>aoi<span style="color: #339933;">,</span> <span style="color: #0000ff;">"o"</span> = <span style="color: #cc66cc;">1</span> <span>&lt;-</span> <span style="color: #cc66cc;">3</span><span>:</span><span style="color: #cc66cc;">4</span><span style="color: #339933;">,</span> <span style="color: #0000ff;">"p"</span> = <span style="color: #cc66cc;">2</span> <span>&lt;-</span> <span style="color: #cc66cc;">5</span><span>:</span><span style="color: #cc66cc;">6</span><span style="color: #339933;">,</span> <span style="color: #0000ff;">"i"</span> = <span style="color: #cc66cc;">3</span> <span>&lt;-</span> <span style="color: #cc66cc;">7</span><span>:</span><span style="color: #cc66cc;">9</span><span style="color: #009900;">)</span>
dat<span>$</span>nforma <span>&lt;-</span> recode<span style="color: #009900;">(</span> dat<span>$</span>nforma<span style="color: #339933;">,</span>
  <span style="color: #0000ff;">"o"</span>  = <span style="color: #cc66cc;">1</span> <span>&lt;-</span> <a href="http://inside-r.org/r-doc/base/c"><span style="color: #003399; font-weight: bold;">c</span></a><span style="color: #009900;">(</span><span style="color: #cc66cc;">80</span><span style="color: #339933;">,</span><span style="color: #cc66cc;">11</span><span style="color: #009900;">)</span><span style="color: #339933;">,</span>
  <span style="color: #0000ff;">"p"</span>  = <span style="color: #cc66cc;">2</span> <span>&lt;-</span> <a href="http://inside-r.org/r-doc/base/c"><span style="color: #003399; font-weight: bold;">c</span></a><span style="color: #009900;">(</span><span style="color: #cc66cc;">12</span><span style="color: #339933;">,</span><span style="color: #cc66cc;">21</span><span style="color: #339933;">,</span><span style="color: #cc66cc;">22</span><span style="color: #339933;">,</span><span style="color: #cc66cc;">23</span><span style="color: #339933;">,</span><span style="color: #cc66cc;">36</span><span style="color: #009900;">)</span><span style="color: #339933;">,</span>
  <span style="color: #0000ff;">"fp"</span> = <span style="color: #cc66cc;">3</span> <span>&lt;-</span> <a href="http://inside-r.org/r-doc/base/c"><span style="color: #003399; font-weight: bold;">c</span></a><span style="color: #009900;">(</span><span style="color: #cc66cc;">31</span><span style="color: #339933;">,</span><span style="color: #cc66cc;">33</span><span style="color: #339933;">,</span><span style="color: #cc66cc;">34</span><span style="color: #339933;">,</span><span style="color: #cc66cc;">41</span><span style="color: #339933;">,</span><span style="color: #cc66cc;">51</span><span style="color: #009900;">)</span><span style="color: #339933;">,</span>
  <span style="color: #0000ff;">"b"</span>  = <span style="color: #cc66cc;">4</span> <span>&lt;-</span> <a href="http://inside-r.org/r-doc/base/c"><span style="color: #003399; font-weight: bold;">c</span></a><span style="color: #009900;">(</span><span style="color: #cc66cc;">32</span><span style="color: #009900;">)</span><span style="color: #339933;">,</span>
  <span style="color: #0000ff;">"u"</span>  = <span style="color: #cc66cc;">5</span> <span>&lt;-</span> <a href="http://inside-r.org/r-doc/base/c"><span style="color: #003399; font-weight: bold;">c</span></a><span style="color: #009900;">(</span><span style="color: #cc66cc;">50</span><span style="color: #339933;">,</span><span style="color: #cc66cc;">52</span><span>:</span><span style="color: #cc66cc;">56</span><span style="color: #339933;">,</span><span style="color: #cc66cc;">59</span><span style="color: #339933;">,</span><span style="color: #cc66cc;">61</span><span style="color: #009900;">)</span> <span style="color: #009900;">)</span></pre>
</div>
</div>
con lo que estoy indicando, por ejemplo, que los ocupados, "o", son aquellos con los códigos 3 y 4 en la encuesta, los parados, "p", los de los códigos 5 y 6 y los inactivos los de los códigos 7, 8 y 9. Igualmente, recodifico los niveles educativos en "otros", "primaria", "formación profesional", "bachiller" y "universidad". Luego, con
<div style="overflow: auto;">
<div class="geshifilter">
<pre class="r geshifilter-R" style="font-family: monospace;">dat <span>&lt;-</span> <a href="http://inside-r.org/r-doc/base/as.data.frame"><span style="color: #003399; font-weight: bold;">as.data.frame</span></a><span style="color: #009900;">(</span>dat<span style="color: #009900;">)</span></pre>
</div>
</div>
convierto el objeto <code>data.set</code> en un <code>dataframe</code> tradicional.

Por ejemplo, si ahora se hace
<div style="overflow: auto;">
<div class="geshifilter">
<pre class="r geshifilter-R" style="font-family: monospace;">tasa.paro <span>&lt;-</span> dat<span style="color: #009900;">[</span> <a href="http://inside-r.org/r-doc/base/as.numeric"><span style="color: #003399; font-weight: bold;">as.numeric</span></a><span style="color: #009900;">(</span>dat<span>$</span>edad<span style="color: #009900;">)</span> <span>&gt;</span> <span style="color: #cc66cc;">3</span><span style="color: #339933;">,</span> <span style="color: #009900;">]</span>     <span style="color: #666666; font-style: italic;"># se eliminan los menores de 16 años</span>
tasa.paro <span>&lt;-</span> tasa.paro<span style="color: #009900;">[</span> tasa.paro<span>$</span>aoi <span>!</span>= <span style="color: #0000ff;">"i"</span><span style="color: #339933;">,</span> <span style="color: #009900;">]</span>   <span style="color: #666666; font-style: italic;"># se eliminan los inactivos</span>
tasa.paro<span>$</span>factorel <span>&lt;-</span> tasa.paro<span>$</span>factorel <span>/</span> <span style="color: #cc66cc;">100</span>    <span style="color: #666666; font-style: italic;"># realmente no necesario</span>
<span style="color: #cc66cc;">100</span> <span>*</span> <a href="http://inside-r.org/r-doc/base/sum"><span style="color: #003399; font-weight: bold;">sum</span></a><span style="color: #009900;">(</span> tasa.paro<span>$</span>factorel <span>*</span> <span style="color: #009900;">(</span>tasa.paro<span>$</span>aoi <span>==</span> <span style="color: #0000ff;">"p"</span><span style="color: #009900;">)</span> <span style="color: #009900;">)</span> <span>/</span> <a href="http://inside-r.org/r-doc/base/sum"><span style="color: #003399; font-weight: bold;">sum</span></a><span style="color: #009900;">(</span> tasa.paro<span>$</span>factorel <span style="color: #009900;">)</span></pre>
</div>
</div>
se obtiene la consabida tasa de paro para el primer trimestre del año.

</body>
</html>
