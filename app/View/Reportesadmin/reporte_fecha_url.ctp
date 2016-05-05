 <small><b>Se encontraron <?php echo count($leads);?> </b> *únicamente se despliegan hasta las primeras 100, resultado completo disponible en csv.</small>
<a href="/index.php/reportesadmin/csv_downloads?reporte=4" class="btn btn-small"><i class="fa-icon-table"></i> Bajar CSV</a>
<br>
<?php
if(count($leads)>100){
	$leads = array_slice($leads, 0, 100); 
}
foreach($leads as $lead){
	echo $this->element('lead_box',array('lead'=>$lead));
}
?>
