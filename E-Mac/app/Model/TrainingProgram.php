<?php
	App::uses('AppModel', 'Model');
	class TrainingProgram extends AppModel 
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
			'Category' => array(
				'className' => 'Category',
				'foreignKey' => 'category_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			)
		);
}
