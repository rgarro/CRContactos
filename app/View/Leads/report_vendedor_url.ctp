<?php
//print_r($result);
?>
<table class="table table-striped">
<thead>
	<th>Nombre</th><th>Asignado</th><th>Activo</th><th>Archivado</th><th>Vendido</th><th>Total</th>
</thead>
<tbody>
	<?php foreach($result['users'] as $r){ ?>
	<tr>
		<td><?php echo $r['User']['nombre'];?></td><td><?php echo $r['User']['asignado'];?></td><td><?php echo $r['User']['activo'];?></td><td><?php echo $r['User']['archivado'];?></td><td><?php echo $r['User']['vendido'];?></td><td><?php echo $r['User']['total'];?></td>
	</tr>
	<?php } ?>
</tbody>	    
</table>
<a href="/index.php/leads/csv_downloads?reporte=3" class="btn btn-small"><i class="fa-icon-table"></i> Bajar CSV</a>