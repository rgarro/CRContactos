<?php

namespace spec;

require_once("/Users/rolando/Documents/hangar/MotoLeadsControl/motoleads_strap.php");
require_once($abs_path.'Lib/CRContactos/CRContactos_Objeto.php');

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CRContactos_ObjetoSpec extends CRContactos_Behavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CRContactos_Objeto');
    }
	
	function it_should_have_static_method_log_exception(){
		$this->shouldHaveMethod("log_exception");
	}
	
	function it_should_have_static_method_set_csfr_key(){
		$this->shouldHaveMethod("set_csfr_key");	
	}
	
	function it_should_have_static_method_get_csfr_key(){
		$this->shouldHaveMethod("get_csfr_key");
	}
	
	function it_should_have_static_method_verify_csfr_key(){
		$this->shouldHaveMethod("verify_csfr_key");
	}
}
