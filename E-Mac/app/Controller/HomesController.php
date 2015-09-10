<?php

App::uses('AppController', 'Controller');

/**

 * HomeController Controller

 *

 * @property Home $Home

 */

class HomesController extends AppController {
//public $uses = array('Twitter');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    

    public function index(){

    }

    public function pplumayknow(){

        $this->loadModel('User');

        $this->loadModel('Connection');

        $x1 = $this->Connection->find('all',array('fields'=>'Connection.connectedwith','conditions' => array('Connection.user_id' => $this->Auth->user('id'))));

        $x2 = $this->Connection->find('all',array('fields'=>'Connection.user_id','conditions' => array('Connection.connectedwith' => $this->Auth->user('id'))));

        //$this->Connection->recursive = 3;

        $x3 =array_merge($x1,$x2);

        foreach($x3 as $d){

            if(isset($d['Connection']['connectedwith'])){

                $lvl2[] = $d['Connection']['connectedwith'];

            }else{

                $lvl2[] = $d['Connection']['user_id'];

            }

        }

        $x1 = $this->Connection->find('all',array('fields'=>'Connection.connectedwith','conditions' => array('AND' => array('Connection.user_id' => $lvl2,'NOT'=>array('Connection.connectedwith'=>$this->Auth->user('id'))))));

        $x2 = $this->Connection->find('all',array('fields'=>'Connection.user_id','conditions' => array('AND' => array('Connection.connectedwith' => $lvl2,'NOT'=>array('Connection.user_id'=>$this->Auth->user('id'))))));

        $x3 = array_merge($x1,$x2);

        foreach($x3 as $d){

            if(isset($d['Connection']['connectedwith'])){

                $lvl3[] = $d['Connection']['connectedwith'];

            }else{

                $lvl3[] = $d['Connection']['user_id'];

            }

        }

        $response = $this->User->find('all',

                array(

                        'fields' => array('User.username','User.profile_image','User.home_town','User.first_name','User.last_name'),

                        'conditions'=>array(

                            'NOT' => array('User.usertype_id'=>1,'User.id' => array_merge(array($this->Auth->user('id')),$lvl2,$lvl3))

                        ),

                        'order' => 'rand()',

                        'limit' => '6'

                    )

                );

        $this->set('response',$response);

        $this->render('ajax', 'ajax');

    }

     public function connections(){

        //--------------------------Connections Algo--------------------

        $this->loadModel('User');

        $this->loadModel('Connection');

        $x1 = $this->Connection->find('all',array('fields'=>'Connection.connectedwith','conditions' => array('Connection.user_id' => $this->Auth->user('id'))));

        $x2 = $this->Connection->find('all',array('fields'=>'Connection.user_id','conditions' => array('Connection.connectedwith' => $this->Auth->user('id'))));

        //$this->Connection->recursive = 3;

        $x3 =array_merge($x1,$x2);

        foreach($x3 as $d){

            if(isset($d['Connection']['connectedwith'])){

                $lvl2[] = $d['Connection']['connectedwith'];

            }else{

                $lvl2[] = $d['Connection']['user_id'];

            }

        }

        $x1 = $this->Connection->find('all',array('fields'=>'Connection.connectedwith','conditions' => array('AND' => array('Connection.user_id' => $lvl2,'NOT'=>array('Connection.connectedwith'=>$this->Auth->user('id'))))));

        $x2 = $this->Connection->find('all',array('fields'=>'Connection.user_id','conditions' => array('AND' => array('Connection.connectedwith' => $lvl2,'NOT'=>array('Connection.user_id'=>$this->Auth->user('id'))))));

        $x3 = array_merge($x1,$x2);

        foreach($x3 as $d){

            if(isset($d['Connection']['connectedwith'])){

                $lvl3[] = $d['Connection']['connectedwith'];

            }else{

                $lvl3[] = $d['Connection']['user_id'];

            }

        }

        //--------------------------Connections Algo--------------------

        $this->User->recursive = 3;

        $rsp = $this->User->find('all',

                array(

                        'fields' => array('User.username','User.profile_image','User.home_town','User.first_name','User.last_name'),

                        'conditions'=>array('AND' => array(

                            'User.id' => array_merge($lvl2,$lvl3)

                            )

                        )

                    )

                );        

        $response['count'] = count($rsp);

        $response['data'] = $rsp;

        $this->set('response',$response);

        $this->render('ajax', 'ajax');

    }

    

    public function cmpnumayknow(){

        $this->loadModel('Company');

        $response = $this->Company->find('all',

                array(

                        /*'fields' => array('User.username','User.profile_image','User.home_town','User.first_name','User.last_name'),

                        'conditions'=>array(

                            'NOT' => array('User.usertype_id'=>1)

                        ),*/

                        'order' => 'rand()',

                        'limit' => '5'

                    ) 

                );

        

        $this->set('response',$response);

        $this->render('ajax', 'ajax');

    }

    public function newsfeeds(){
        $this->loadModel('Companyupdate');
        $this->loadModel('Groupupdate');
        $resp1 = $this->Companyupdate->find('all',array(
                    'conditions'=>array(
                            'Companyupdate.status'=>1
                        ),
                    'order' => 'rand()',
                    'limit' =>5
                    )
                );


        $resp2 = $this->Groupupdate->find('all',array(
                    'conditions'=>array(
                            'Groupupdate.status'=>1
                        ),
                    'order' => 'rand()',
                    'limit' => 5
                    )
                );

        $response = array_merge($resp1,$resp2);
        shuffle($response);
        $this->set('response',$response);
        $this->render('ajax', 'ajax');
    }
    
    
    
    
        public function postumayknow(){
         $this->loadModel('PostJob');
        
         $cdate=date('m/d/Y');
        
         $this->PostJob->query("UPDATE `post_jobs` SET `status`='Inactive' WHERE `close_date`='$cdate' ");
         
        $res1 = $this->PostJob->find('all',array('order' => 'rand()','limit' => '5','conditions'=>array('PostJob.status'=>'Active')));
   
        $this->set('response',$res1);
        $this->render('ajax', 'ajax');

    }

    public function featuredposts(){
         $this->loadModel('PostJob');
        $res1 = $this->PostJob->find('all',array('order' => 'rand()','limit' => '5','conditions'=>array('AND'=>array('PostJob.featured'=>'1','PostJob.status'=>"Active"))));  
        $this->set('response',$res1);
        $this->render('ajax', 'ajax');

    }
    
     public function featuredgrants(){
         $this->loadModel('Grant');
        $res1 = $this->Grant->find('all',array('order' => 'rand()','limit' => '2','conditions'=>array('AND'=>array('Grant.featured'=>'1','Grant.status'=>"Active"))));  
        $this->set('response',$res1);
        $this->render('ajax', 'ajax');

    }
    
    public function grantumayknow(){
         $this->loadModel('Grant');
          $cdate=date('m/d/Y');
         $this->Grant->query("UPDATE `grants` SET `status`='Inactive' WHERE `close_date`='$cdate' ");
        $res1 = $this->Grant->find('all',array('order' => 'rand()','limit' => '5','conditions'=>array('Grant.status'=>'Active')));    
        $this->set('response',$res1);
        $this->render('ajax', 'ajax');

    }
    
    
    
     public function people(){
        $this->loadModel('User');
        $response = $this->User->find('all', array("conditions"=>array("User.usertype_id" !=1),                        
                        'limit' => '5'
                    ) 
                );    
        $this->set('response',$response);
        $this->render('ajax', 'ajax');
    }

    
    
    
    

}


?>

