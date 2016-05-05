<?php
foreach($modelos as $m){
?>
<option value="<?php echo $m['Modelo']['modelo'];?>"><?php echo $m['Modelo']['modelo'];?></option>
<?php
}
?>
<option value="todos">Cualquier Modelo</option>
