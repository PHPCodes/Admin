<?php
class Category extends AppModel 
{
	public $actsAs 			= array('Containable');
	public $displayField 	= 'email';
	
	public function beforeSave($options = array())
	{
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
}
?>