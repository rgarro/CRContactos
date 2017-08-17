<a href="/index.php/leads/csv_downloads?reporte=4" class="btn btn-small"><i class="fa-icon-table"></i> Bajar Excel</a>
<br>
<?php
foreach($leads as $lead){
	echo $this->element('lead_box',array('lead'=>$lead));
}
?>
