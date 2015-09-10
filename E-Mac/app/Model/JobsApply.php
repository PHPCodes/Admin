<?php
	App::uses('AppModel', 'Model');
	class JobsApply extends AppModel 
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
				'foreignKey' => 'user_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			),
			'Job' => array(
				'className' => 'Job',
				'foreignKey' => 'job_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			),
			'Employer' => array(
				'className' => 'User',
				'foreignKey' => 'employer_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			)
		);
}
