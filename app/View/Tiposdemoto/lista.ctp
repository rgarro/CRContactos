<ul id="listaTipos">
	<?php
foreach($tipos as $tipo){
	echo $this->element('tipo_box',array('tipo'=>$tipo));
}
?>
</ul>