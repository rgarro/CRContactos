<?php
namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use PhpSpec\Matcher\InlineMatcher;



class CRContactos_Behavior extends ObjectBehavior
{
	public function getMatchers(){
		$Crmalls_Matchers = array(
					'haveMethod'=>function($subject,$value){
						$obj = new \ReflectionClass($subject);
						return $obj->hasMethod($value);
					},
					'haveProperty'=>function($subject,$value){
						$obj = new \ReflectionClass($subject);
						return $obj->hasProperty($value);
					},
					'beIntegerProperty'=>function($subject,$value){
						$obj = new \ReflectionClass($subject);
						$r = $obj->getProperty($value);
						$r->setAccessible(true);											
						return is_int($r->getValue($subject));
					},
					'haveKeyx'=>function($subject,$key){													
						return array_key_exists($key, $subject);
					},
					'beArrayProp'=>function($subject){
						return is_array($subject);
					}
					);	
		return $Crmalls_Matchers; 
	}
}
