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
<dt>Modelos</dt>
<dd><ul> <?php
if(isset($r['modelos'])){
foreach($r['modelos'] as $m){ ?>
	<li><?php echo $m['modelo'];?> : <?php echo $m['total'];?></li>
	<?php } } ?></ul></dd>
<?php
}
?>
<dt>Total:</dt>
<dd> <?php echo $result['total'];?></dd>
</dl>
<a href="/index.php/leads/csv_downloads?reporte=2" class="btn btn-small"><i class="fa-icon-table"></i> Bajar Excel</a>
