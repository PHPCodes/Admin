<?php
App::uses('AppModel', 'Model');
/**
 * Company Model
 *
 */
class Company extends AppModel {

	public $actsAs = array('Containable');
	public $displayField = 'email';
/**
 * method called beforeSave
 */	
	public function beforeSave($options = array()){
		if(isset($this->data[$this->alias]['password'])){
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

	public $belongsTo = array(
		'Topic' => array(
			'className' => 'Topic',
			'foreignKey' => 'topic_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
	);
}
?>