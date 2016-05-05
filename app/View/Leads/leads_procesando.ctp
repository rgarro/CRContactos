<?php
foreach($leads as $lead){
	echo $this->element('lead_box',array('lead'=>$lead));
}
?>