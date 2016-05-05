<dl class="dl-horizontal">
<dt>Agencia:</dt>
<dd><?php echo $agencia['Agencia']['nombre'];?></dd>
<dt>Reporte:</dt>
<dd> del <?php echo $_GET['desde'];?> al <?php echo $_GET['hasta'];?></dd>
<?php
foreach($result['marcas'] as $r){
?>
<dt><?php echo $r['marca'];?></dt>
<dd> <?php echo $r['total'];?></dd>
<?php
}
?>
<dt>Total:</dt>
<dd> <?php echo $total;?></dd>
</dl>
<a href="/index.php/leads/csv_downloads?reporte=1" class="btn btn-small"><i class="fa-icon-table"></i> Bajar CSV</a>