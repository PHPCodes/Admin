<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property AccessToken $AccessToken
 * @property AuthCode $AuthCode
 * @property Client $Client
 * @property RefreshToken $RefreshToken
 */
class User extends AppModel {

	/**
	* Display field
	*
	* @var string
	*/
	public $displayField = 'email';
	public $actsAs = array('Containable');
	
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
		'UserType' => array(
			'className' => 'UserType',
			'foreignKey' => 'usertype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	* hasMany associations
	*
	* @var array
	*/
	public $hasMany = array(
		'AccessToken' => array(
			'className' => 'AccessToken',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'AuthCode' => array(
			'className' => 'AuthCode',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'StudentFollower' => array(
			'className' => 'StudentFollower',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EmployerFollower' => array(
			'className' => 'EmployerFollower',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'UserFavorite' => array(
			'className' => 'Favorite',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EmployerFavoriteJob' => array(
			'className' => 'Favorite',
			'foreignKey' => 'employer_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
}
