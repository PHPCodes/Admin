<?php
App::uses('AppController', 'Controller');
/**
 * UserGroups Controller
 *
 * @property UserGroup $UserGroup
 */
class UserGroupsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function beforeFilter() {
        parent::beforeFilter();
    }




    public function home_group($n = null){
		$this->set('group_detail',$x = $this->UserGroup->find('first',array('conditions'=>array('UserGroup.group_name'=>$n))));
		$this->loadModel('User');
		$this->set('user_detail',$y = $this->User->find('first',array('conditions'=>array('User.id'=>$this->Auth->User('id')))));
		$this->loadModel('Banner');
		$b = $this->Banner->find('first',array('conditions'=>array('Banner.status'=>'Active')));
		$this->set('banner',$b);
                $this->loadModel('Groupjoin');
		$c = $this->Groupjoin->find('first',array('conditions'=>array('AND'=>array('Groupjoin.user_group_id'=>$x['UserGroup']['id'],'Groupjoin.user_id'=>$this->Auth->User('id')))));
                 //debug($c);
                $this->set('iscomment',$c);
                $this->loadModel('Groupcomment');
                $d = $this->Groupcomment->find('all',array('conditions'=>array('Groupcomment.user_group_id'=>$x['UserGroup']['id'])));
                 $this->set('countcomment',$d);
                 ////////////////
                  $this->loadModel('Comment');
                    $this->Comment->recursive = 0;
                    //debug($this->Comment->find('threaded', array('conditions' => array('Comment.place_id'=>$id))));
                    //exit;
                    $comms  = $this->Comment->find('threaded', array(
                        'conditions' => array('AND' => array('Comment.user_group_id' => $x['UserGroup']['id'],'Comment.status' => 1))
                    ));       
                    $this->set('comments',$comms);
                   // debug($this->Auth->User("id"));exit;
                    $this->set("userd",$this->Auth->User("id"));
                 //////////////////
	}
	
	
	
	
	
	public function group_search(){
		@$string=$this->request->data['search'];
		$search = $this->UserGroup->find('all',array('conditions'=>array('AND'=>array('UserGroup.group_name LIKE'=>'%'.$string.'%','UserGroup.status'=>'Active'))));
		$this->set('search',$search);
		
	}
	
	public function othergroup() {
	$this->set('user_group',$x=$this->UserGroup->find('all'));
	}
	
	
	
	public function index() {
		$this->UserGroup->recursive = 0;
		$this->set('userGroups', $this->paginate());
                $this->loadModel("Groupjoin");
                $groupjoin = $this->Groupjoin->find("all",array("conditions"=>array("Groupjoin.user_id"=>$this->Auth->User("id"))));
                $this->set("grupjoin",$groupjoin);
                $allgroup = $this->UserGroup->find("all");
                //debug($mayjoin);
                foreach($allgroup as $join){
                    $gj = $this->Groupjoin->find("all",array("conditions"=>array("AND"=>array("Groupjoin.user_group_id" => $join['UserGroup']['id'],"Groupjoin.user_id" =>$this->Auth->User("id")))));
                  // debug($gj);
                    if(!$gj){
                        $res[]=$join;
                    } 
                
//                $mayjoin = $res;
//                debug($mayjoin);
//                $this->set("mayjoin",$mayjoin);
                } 
               // debug($res);exit;
                 $this->set("mayjoin",$res);
                
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UserGroup->id = $id;
		if (!$this->UserGroup->exists()) {
			throw new NotFoundException(__('Invalid user group'));
		}
		$this->set('userGroup', $this->UserGroup->read(null, $id));
	}
	
	public function group_add() {
		$this->loadModel('GroupType');
		$this->set('grp',$x=$this->GroupType->find('all',array('conditions'=>array('GroupType.status'=>'Active'))));
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() { 
		//$this->layout = 'ajax';
		if ($this->request->is('post')) {
			$one = $this->request->data['UserGroup']['logo'];
			$this->request->data['UserGroup']['logo']=$one['name'];
			$this->UserGroup->create();
			if ($this->UserGroup->save($this->request->data)) {
				if ($one['error'] == 0) {
					$pth = 'files' . DS . 'grouplogo' . DS .$one['name'];
					move_uploaded_file($one['tmp_name'], $pth);
				}
                                $ugid = $this->UserGroup->getLastInsertID();
                                $userid = $this->Auth->User("id");
                                $this->loadModel('Groupjoin');
                                $GJ = $this->Groupjoin->query("insert into `groupjoins`(`id`,`user_id`,`user_group_id`) values('','$userid','$ugid')");
				/*--------------mail-----------------*/
				$em = $this->request->data['UserGroup']['group_owner_email'];
				$username= $this->Auth->User('username');
				$group=  $this->request->data['UserGroup']['group_name'];
				//$this->loadModel('Mailformat');
				//$ms=$this->Mailformat->find('first',array('conditions'=>array('Mailformat.title'=>'usergroupadd ')));
				$subject ="Congratulations on creating your new Academatch Group!";
				//$array1=array("%mail_subject%","%message%");
				//$array2=array($ms["Mailformat"]["subject"],"<p>Hello,<br/>".$username."<br/></p><p>".$ms["Mailformat"]["subject"]."</p><br/>You have created a group".$group."<br/>". $ms["Mailformat"]["message"]);
				$mailformat= "<p>Hello,".$username."<br/></p><p>Congratulations on creating your new Academatch Group!</p><br/>You have created a group &nbsp;".$group."<br/>";
				$l  = new CakeEmail();
				$l->template('signup', 'fancy')->emailFormat('html')->subject($subject)->to($em)->from('support@academatch.com','Academatch Accounts Department')->send($mailformat);
				$this->set('smtp_errors', "none");
				$this->Session->setFlash(__('A Group has been created.'));
                                /*-----------------------*/
                                $this->loadModel('Groupupdate');
                                $title = $this->request->data['UserGroup']['group_name'];
                                $desc = $this->request->data['UserGroup']['description']; 
                                $save = array('Groupupdate'=> array('title'=>$title,
                                                                'description'=>$desc,
                                                                'status'=>'1',
                                                                'tstamp'=>date('H:i:s'),
                                                                'type'=>'news',
                                                                'user_group_id'=>$this->UserGroup->getLastInsertID()
                                         )
                                        );
                                $this->Groupupdate->save($save);         
                                /*-------------------------*/
				$this->redirect(array('action' => 'home_group',$this->request->data['UserGroup']['group_name']));
				/*---------------end------------------*/
			}else{
				$this->Session->setFlash(__('The User group could not be created. Please, try again.'));
                                $this->redirect(array('action' => 'home_group',$this->request->data['UserGroup']['group_name']));
			}
				/* $response['error'] = '0';
                 $response['message'] = 'Group has been created.';
                 $response['redirect'] = '../UserGroups';
              $this->set('response',$response);
			} else {
				$response['error'] = '1';
				$response['message'] = 'Please Check All The Fields.';
				$this->set('response',$response);
			}	*/				
		}
		$users = $this->UserGroup->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->UserGroup->id = $id;
		if (!$this->UserGroup->exists()) {
			throw new NotFoundException(__('Invalid user group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The user group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user group could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserGroup->read(null, $id);
		}
		$users = $this->UserGroup->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->UserGroup->id = $id;
		if (!$this->UserGroup->exists()) {
			throw new NotFoundException(__('Invalid user group'));
		}
		if ($this->UserGroup->delete()) {
			//$this->Session->setFlash(__('User group deleted'));
			$this->redirect(array('controller' => 'users','action'=>"profile",$this->Auth->User("id")));
		}
		//$this->Session->setFlash(__('User group was not deleted'));
		$this->redirect(array('controller' => 'users','action'=>"profile",$this->Auth->User("id")));
	} 

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		if($this->request->is('post')){
			$keyword = trim($this->request->data['keyword']);
			$option=$this->request->data['UserGroup']['listing'];
			//debug($option);exit;
			if(!empty($option)){
				if($option == "All" || $option == ""){
					$records = $this->UserGroup->find('all', array('conditions' => array("OR" => array("UserGroup.group_name LIKE" => "%$keyword%" , "UserGroup.group_type LIKE" => "%$keyword%"))));
				}elseif($option == "Groupname"){
					$records = $this->UserGroup->find('all', array('conditions' => array("UserGroup.group_name LIKE" => "%$keyword%")));
				}elseif($option == "Grouptype"){
					$records = $this->UserGroup->find('all', array('conditions' => array("UserGroup.group_type LIKE" => "%$keyword%")));
				}elseif($option == "Active"){
					$records = $this->UserGroup->find('all', array('conditions' => array("UserGroup.status" => "Active")));
				}elseif($option == "Deactive"){
					$records = $this->UserGroup->find('all', array('conditions' => array("UserGroup.status" => "Deactive")));
				}
			
				
			$this->set("userGroups",@$records,$this->paginate());
			if(count($records) == 0){
				$this->Session->setFlash("No Record found with this keyword please use another one.");
			}
			}
			if(empty($option)){
						$this->UserGroup->recursive = 0;
		$this->set('userGroups', $this->paginate());
				$this->Session->setFlash("Pls Choose some keywords to search..");
			}
	}
	else{
		$this->UserGroup->recursive = 0;
		$this->set('userGroups', $this->paginate());
	}
	}
        
        public function admin_groups() {
		if($this->request->is('post')){
			$keyword = trim($this->request->data['keyword']);
			$option=$this->request->data['UserGroup']['listing'];
			//debug($option);exit;
			if(!empty($option)){
				if($option == "All" || $option == ""){
					$records = $this->UserGroup->find('all', array('conditions' => array("OR" => array("UserGroup.group_name LIKE" => "%$keyword%" , "UserGroup.group_type LIKE" => "%$keyword%"))));
				}elseif($option == "Groupname"){
					$records = $this->UserGroup->find('all', array('conditions' => array("UserGroup.group_name LIKE" => "%$keyword%")));
				}elseif($option == "Grouptype"){
					$records = $this->UserGroup->find('all', array('conditions' => array("UserGroup.group_type LIKE" => "%$keyword%")));
				}elseif($option == "Active"){
					$records = $this->UserGroup->find('all', array('conditions' => array("UserGroup.status" => "Active")));
				}elseif($option == "Deactive"){
					$records = $this->UserGroup->find('all', array('conditions' => array("UserGroup.status" => "Deactive")));
				}
			
				
			$this->set("userGroups",@$records,$this->paginate());
			if(count($records) == 0){
				$this->Session->setFlash("No Record found with this keyword please use another one.");
			}
			}
			if(empty($option)){
						$this->UserGroup->recursive = 0;
		$this->set('userGroups', $this->paginate());
				$this->Session->setFlash("Pls Choose some keywords to search..");
			}
	}
	else{
		$this->UserGroup->recursive = 0;
		$this->set('userGroups', $this->paginate());
	}
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->UserGroup->id = $id;
		if (!$this->UserGroup->exists()) {
			throw new NotFoundException(__('Invalid user group'));
		}
		$this->set('userGroup', $this->UserGroup->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
                  $id= $this->Auth->User('id');
                    $one=$this->request->data['UserGroup']['logo'];
                    $this->request->data['UserGroup']['logo']=$one['name'];
                    $this->request->data['UserGroup']['user_id']=$id;
			$this->UserGroup->create();
			if ($this->UserGroup->save($this->request->data)) {
                            if($one['error']==0){
                                $pth='files'. DS .'grouplogo'. DS.$one['name'];
                                move_uploaded_file($one['tmp_name'], $pth);
                            }
				$this->Session->setFlash(__('The user group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user group could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserGroup->User->find('list');
                 $this->set(compact('users'));
                $this->loadModel('GroupType');
                $g=$this->GroupType->find('all',array('conditions'=>array('GroupType.status'=>'Active')));
                $this->set('gtype',$g);
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->UserGroup->id = $id;
		if (!$this->UserGroup->exists()) {
			throw new NotFoundException(__('Invalid user group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The user group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user group could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserGroup->read(null, $id);
		}
		$users = $this->UserGroup->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->UserGroup->id = $id;
		if (!$this->UserGroup->exists()) {
			throw new NotFoundException(__('Invalid user group'));
		}
		if ($this->UserGroup->delete()) {
                        $this->loadModel('Groupupdate');
                        $groupu=$this->Groupupdate->find('first',array('conditions'=>array('Groupupdate.user_group_id'=>$id)));
                        $groupid=$groupu['Groupupdate']['user_group_id'];
                        $this->Groupupdate->query("Delete From `groupupdates` Where `user_group_id`='$groupid' ");
			$this->Session->setFlash(__('User group deleted'));
                        $this->loadModel("Groupjoin");
                        $gr = $this->Groupjoin->query("delete from `groupjoins` where `user_group_id`='$id'");
			$this->redirect(array('action' => 'index'));
		                                }
		$this->Session->setFlash(__('User group was not deleted'));
		$this->redirect(array('action' => 'index'));
	                                        }
	
	
	public function admin_block($id = null)
    {
        $this->UserGroup->id = $id;
        if ($this->UserGroup->exists()) {
            $x = $this->UserGroup->save(array(
                'UserGroup' => array(
                    'status' => 'Deactive'
                )
            ));
            $this->Session->setFlash("User Group blocked successfully.");
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            $this->Session->setFlash("Unable to block User Group.");
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        
    }
	
	public function admin_activate($id = null)
    {
        $this->UserGroup->id = $id;
        if ($this->UserGroup->exists()) {
            $x = $this->UserGroup->save(array(
                'UserGroup' => array(
                    'status' => 'Active'
                )
            ));
            $this->Session->setFlash("User Group activated successfully.");
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            $this->Session->setFlash("Unable to activate User Group.");
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        
    }
	
	public function admin_deleteall($id = null){
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
         $this->loadModel("Groupjoin");
        foreach ($this->request['data']['UserGroup'] as $k) {
            $this->UserGroup->id = (int) $k;
            if ($this->UserGroup->exists()) {
                $this->UserGroup->delete();
            }
           
         $gr = $this->Groupjoin->query("delete from `groupjoins` where `user_group_id`='$k'");
        }
        
        $this->Session->setFlash(__('Selected User Group were removed.'));
        $this->redirect(array(
            'action' => 'index'
        ));
    }
    
    public function admin_delall($id = null){
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->loadModel("GroupUpdate");
        foreach ($this->request['data']['UserGroup'] as $k) {
            $this->UserGroup->id = (int) $k;
            if ($this->UserGroup->exists()) {
                $this->UserGroup->delete();
            }
            $this->GroupUpdate->query("delete from `groupupdates` where `user_group_id`=".$k);
            
        }
        
        $this->Session->setFlash(__('Selected User Group were removed.'));
        $this->redirect(array(
            'action' => 'groups'
        ));
    }
    
    
	public function admin_activateall($id = null){
		if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        foreach ($this->request['data']['UserGroup'] as $k => $v) {	
		if($k == $v){
			$this->UserGroup->id = $v;
			if ($this->UserGroup->exists()) {
				$x = $this->UserGroup->save(array(
					'UserGroup' => array(
						'status' => "Active"
					)
					
				));
	
			$this->Session->setFlash(__('Selected User Group Activated.', true));					
			} else {
				$this->Session->setFlash("Unable to Activate  User Group.");
			}
		}
            
        }
		$this->redirect(array('action' => 'index'));
    }
	public function admin_deactivateall($id = null){
		if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        foreach ($this->request['data']['UserGroup'] as $k => $v) {	
		if($k == $v){
			$this->UserGroup->id = $v;
			if ($this->UserGroup->exists()) {
				$x = $this->UserGroup->save(array(
					'UserGroup' => array(
						'status' => "Deactive"
					)
				));
			
			$this->Session->setFlash(__('Selected User Group Deactivated.', true));			
			} else {
				$this->Session->setFlash("Unable to Deactivate User Group.");
			}
		}
            
        }
		$this->redirect(array('action' => 'index'));
	}
    
}
