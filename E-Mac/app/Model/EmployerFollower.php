<?php
	App::uses('AppModel', 'Model');
	class EmployerFollower extends AppModel 
	{
		public $displayField = 'email';
		public $actsAs = array('Containable');
		
		public function beforeSave($options = array())
		{
			if(isset($this->data[$this->alias]['password'])){
				$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
			}
			return true;
		}
		public $belongsTo = array(
			'User' => array(
				'className' => 'User',
				'foreignKey' => 'follower_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			)
		);
}
