<style>
	#listaTipos ul li a{
  text-decoration:none;
  color:#000;
  background:#ffc;
  display:block;
  height:15em;
  width:10em;
  padding:1em;
  /* Firefox */
  -moz-box-shadow:5px 5px 7px rgba(33,33,33,1);
  /* Safari+Chrome */
  -webkit-box-shadow: 5px 5px 7px rgba(33,33,33,.7);
  /* Opera */
  box-shadow: 5px 5px 7px rgba(33,33,33,.7);
}
</style>
<div id="listaTipos">
<ul>
	<?php
foreach($users as $sa){
	echo $this->element('sa_box',array('sa'=>$sa));
}
?>
</ul>
</div>