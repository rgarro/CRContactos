<script>
$(document).ready(function(){
	$(".forml").on("click",function(){
		var selid = "#" + $(this).attr("selid");
		var finlabel = $(selid).val();
		var url = $(this).attr('target_url');
		window.location.assign(url + "&finale_label=" + finlabel);
	});
});
</script>
<div class="box-content">
<ul class="dashboard-list">
	<?php
	$c = 0;
	foreach($marcas as $m){
		?>
	<li id="li<?php echo $m['Marca']['id'];?>">
	<center>
<span class="badge">
		<?php echo $this->Html->image("{$m['Marca']['logo_file']}/{$m['Marca']['logo']}", array('pathPrefix' => 'files/marca/logo/',"class"=>"img-polaroid","width"=>"50px"));?>
		 <b><?php echo $m['Marca']['nombre'];?></b></br>
		 <button selid="finsel<?php echo $c;?>" target_url="http://crcontactos.com/index.php/puertas/formb?agencia_id=<?php echo $this->Session->read("agencia_id");?>&marca_id=<?php echo $m['Marca']['id'];?>" target="_blank" class="btn btn-mini forml"><i class="fa-icon-share"></i> Form Contacto</button><br>
<button selid="finsel<?php echo $c;?>" target_url="http://crcontactos.com/index.php/puertas/form?agencia_id=<?php echo $this->Session->read("agencia_id");?>&marca_id=<?php echo $m['Marca']['id'];?>" target="_blank" class="btn btn-mini forml"><i class="fa-icon-picture"></i> Form Contacto</button>
<br>
<select id="finsel<?php echo $c;?>">
	<?php foreach ($finales as $f) {
		?>
<option value="<?php echo $f['Formfinale']['label'];?>"><?php echo $f['Formfinale']['label'];?></option>
		<?php
	}  ?>
</select>
<?php
$c ++;
if(count($m['Marca']['Modelo'])){
?>
<ul class="dashboard-list">
<?php foreach($m['Marca']['Modelo'] as $mo){
	?>
<li>
	<span class="badge badge-inverse">
<?php if(count($mo['ModeloPic'])){
	?>

<?php echo $this->Html->image("{$mo['ModeloPic'][0]['pic_file']}/{$mo['ModeloPic'][0]['pic']}", array('pathPrefix' => 'files/modelo_pic/pic/',"class"=>"img-polaroid","width"=>"40px"));?>

<?php }else{ ?>
	<img id="previewModelPic" src="/img/motosil1.png" width="40" class='img-polaroid'/>
<?php } ?>
<br>
	<i class="fa-icon-cog"></i> <?php echo $mo['modelo'];?></span></li>


<?php } ?>
</ul>
<?php } ?>
</span>
	</center>
	</li>
	<?php } ?>

</ul>
</div>
