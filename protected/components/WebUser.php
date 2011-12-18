<?php

class WebUser extends CWebUser
{
	public function addFlash($key,$value)
	{
		$flash=$this->getFlash($key,$value);
		if(!is_array($flash))
		{
			$flash=array($flash);
		}
		$flash[]=$value;
		$this->setFlash($key, $flash);
	}
}