<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');
$mailComp = new CakeEmail();

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    //var $components = array('Session', 'Auth', 'authenticate' => array(
      //          'Form' => array(
        //            'passwordHasher' => 'Blowfish'
          //      ));
				
	  var $components = array('Session', 'Auth');			

    public function beforeFilter() {
        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            $this->layout = 'admin';
        }
        if (@$this->request->params['admin']) {
            //Setup Auth for Admin
            $this->Auth->loginAction = array('controller' => 'Users', 'action' => 'admin_login');
        } else {
            //Setup Auth for User
            $this->Auth->loginAction = array('controller' => 'Users', 'action' => 'loggedin');
        }
        
        $this->loadModel('User');
        $this->set('ui', $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->User('id')))));
        $id = $this->Auth->User('id');
        // debug($this->Auth->User);
        $this->set('user_id', $id);
        $first_name = $this->Auth->User('first_name');
        $this->set('first_name', $first_name);
        $username = $this->Auth->User('username');
        $this->set('username', $username);
        $email = $this->Auth->User('email');
        $this->set('email', $email);
        $this->loadModel('Sitesetting');
        $sites = $this->Sitesetting->find('first');
		$this->set('site', $sites);
        $this->loadModel('User');
        $this->set("dbusers", $dbusers = $this->User->find('all'));
		
	
	
        
    }

}

?>
