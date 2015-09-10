<?php
App::uses('AppModel', 'Model');
/**
 * Answer Model
 *
 */
class Answer extends AppModel {

	public $actsAs = array('Containable');
	public $displayField = 'email';
/**
 * method called beforeSave
 */	
	public function beforeSave($options = array()) {
		if(isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

	/* public $hasMany = array(
		'Answer' => array(
			'className' => 'Answer',
			'foreignKey' => 'question_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	); */

	/* public $hasMany = array(
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	); */
}
?>