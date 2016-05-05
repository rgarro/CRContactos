<b><i class="fa-icon-inbox"></i> total: <?php echo $total;?></b>  
<?php
$offset = 0;
for($i=0;$i< ceil($total/$limit);$i++){
?>
<a class="nuevo-link btn btn-mini" off_set="<?php echo $offset;?>" limit="<?php echo $limit;?>"><?php echo $i+1;?></a>
<?php
$offset = $offset + $limit;	
}
?>
