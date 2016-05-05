<?php
if(count($modelo['ModeloPic'])){
?>
<div id="myCarousel" class="carousel slide">
<ol class="carousel-indicators">
  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#myCarousel" data-slide-to="1"></li>
  <li data-target="#myCarousel" data-slide-to="2"></li>
</ol>
<div class="carousel-inner" style=" width:100%;min-height: 70px !important;">
<?php
$i = 0;
	foreach($modelo['ModeloPic'] as $mp){
?>
<div class="<?php echo ($i==0? 'active':'');?> item">
<center><span class="badge badge-warning">	
<?php echo $this->Html->image("{$mp['pic_file']}/{$mp['pic']}", array('pathPrefix' => 'files/modelo_pic/pic/',"class"=>"img-polaroid","width"=>"100px"));?>
<br>
<button modelo_pic_id="<?php echo $mp['id']?>" type="button" class="btn btn-danger btn-mini removepic"><i class="fa-icon-remove"></i></button>
</span>
</center>
</div>
<?php
$i++;
	}
?>
</div>
<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
<?php	
}else{
?>
<center>
		<img src="/img/motosil1.png" width="100" class='img-polaroid'/>
		<br>
		<small>*Agregue imágenes con el form.</small>
</center>		
<?php
}
?>