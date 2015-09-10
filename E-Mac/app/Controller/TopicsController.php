<?php
ob_start();
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Topic $Topic
 */
class TopicsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public $components = array ('Session', 'Auth','Paginator');
	public $helpers = array('Math');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('admin_index','Topiclist','post_Topic','index'));
		$this->Paginator->settings=array(
              'limit'=>15
		);
    }    
	public function admin_index() {
		if	($this->request->is('post'))	{
			$keyword = trim($this->request->data['keyword']);
			if	($keyword != '')	{
				$this->paginate = array(
					'conditions' => array(
						"OR" => array(
							"Topic.name LIKE" => "%$keyword%" 
						)
					)
				);
				$ads = $this->paginate('Topic');
				$this->set('contents',$ads);
				if	(empty($ads))		{
					$this->Session->setFlash("No Record found with this keyword please use another one.");
				}
			}	else	{
				$ads = $this->paginate('Topic') ;
				$this->set('contents',$ads);
				$this->Session->setFlash("Pls Choose some keywords to search..");
			}
		}	else {
			$this->loadModel('Topic');
			$ads = $this->paginate('Topic');
			//prx($ads);die;
			$this->set('contents',$ads);
		}
	}	
	
	//http://dev414.trigma.us/N-110BB/admin/webservices/topic_list?topic_id=4&user_id=207
		public function admin_topic_list () {
			$this->loadModel ("Topic");
			$this->loadModel ("Question");
			$this->loadModel ("QuestionAnswer");
			ini_set('memory_limit', '256M');
			
			$topic_id				= 	@$_REQUEST['topic_id'];
			$user_id				= 	@$_REQUEST['user_id'];
			
			$answer_question	=	$this->QuestionAnswer->find (
				'list',array(
					'conditions'=>array(
						'QuestionAnswer.user_id'=>$user_id,
						'QuestionAnswer.topic_id'=>$topic_id,
						'QuestionAnswer.current_status'=>1
					),
					'fields' => array('QuestionAnswer.question_id')
				)				
			);
			
			$answered_questions = array_values ($answer_question);
			//pr($answered_questions);die; 
			$questions 			= 	$this->Question->find (
				'all',array(
					'conditions'=>array(
						'Question.topic_id'=>$topic_id,
						'NOT'=>array(
							'Question.id'=>$answered_questions
						)
					),
					'order' => 'rand()',
					'limit'=>1
				)
			);			
			$right_option			=	array ();
			$other_option		=	array ();
			
			if (!empty($questions)) {
				foreach ($questions as $key=>$value) {
				
					/*********************			foreach loop select right option and other options of Question  		*************************/
					
					foreach ($value['Answer'] as $ans) {
						if ($ans['right_question'] == 1) {
							$right_answer	=	$ans['answer'];
							array_push($right_option,$ans['answer']);
						}	else {
							array_push($other_option,$ans['answer']);
						}
					}
					
					$other_option	= array_merge ($other_option,$right_option);	
					$count_value	 	= count($other_option);
					$val1 				= $count_value - 1; 
					$val 					= rand(0,3);
					
					$x 					= $other_option[$val];
					$other_option[$val]		= 	$other_option[$val1];
					$other_option[$val1]	= 	$x;
					
					//pr($other_option);die;
					if (isset($other_option[0])) {
						$answer1	= $other_option[0];
					} else
					{
						$answer1	= '';
					}
					if (isset($other_option[1])) {
						$answer2	= $other_option[1];
					} else
					{
						$answer2	= ' ';
					}
					if (isset($other_option[2])) {
						$answer3	=$other_option[2];
					} else
					{
						$answer3	= ' ';
					}
					if (isset($other_option[3])) {
						$answer4	=$other_option[3];
					} else
					{
						$answer4	= ' ';
					}
					if (isset($right_answer)) {
						$right_answer	=	$right_answer;
					} else
					{
						$right_answer	= ' ';
					}
					
					$response[]=array (
					
						'status'=>1,
						'topic_id'=>$topic_id,
						'question_id'=>$value['Question']['id'],
						'question'=>$value['Question']['question'],
						'answers1'=>$answer1,
						'answers2'=>$answer2,
						'answers3'=>$answer3,
						'answers4'=>$answer4,
						'corrrect_answer'=>$right_answer
					);
				}
				//pr($response);die;
				echo json_encode($response);exit;
			} else {
				$response[] = array('status'=>0,'msg'=>'no question found.');
				echo json_encode($response);exit;
			}
		}
/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$name = $this->request->data['Topic']['name'];
			$count = $this->Topic->find('count',array('conditions'=>array('Topic.name'=>$name)));
			if ($count == 0) {
				$this->request->data['Topic']['status'] = 1;
				 $this->Topic->create();
				if ($this->Topic->save($this->request->data)) {
					$this->Session->setFlash(__('The Topic has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The Topic could not be saved. Please, try again.'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$this->Session->setFlash(__('The Topic is already exist.'));
				$this->redirect(array('action' => 'index'));
			}
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
		$this->Topic->id = $id;
		if (!$this->Topic->exists()) {
			throw new NotFoundException(__('Invalid Topic'));
		}
		$this->set('Topic', $this->Topic->read(null, $id));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$data = $this->Topic->find('first',array('conditions'=>array('Topic.id'=>$id)));
		//pr($data);die;
		$this->set(compact('data'));
		$this->Topic->id = $id;
		if (!$this->Topic->exists()) {
			throw new NotFoundException(__('Invalid Topic'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Topic->save($this->request->data)) {
				$this->Session->setFlash(__('The Topic has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Topic could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Topic->read(null, $id);
		}		
	}
	
	public function admin_delete($id = null) {
		$this->Topic->id = $id;
		if (!$this->Topic->exists()) {
			throw new NotFoundException(__('Invalid Topic'));
		}
		if ($this->Topic->delete()) {
			$this->Session->setFlash(__('Topic deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Topic was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	public function admin_question_delete ($id =Null)
	{
		$this->loadModel ('Question');
		$this->loadModel ('Answer');
		$this->Question->id = $id;
		if (!$this->Question->exists ()) {
			throw new NotFoundException(__('Invalid Question'));
		}
		if ($this->Question->delete()) {
			$this->Answer->deleteAll (array('Answer.question_id' => $id));
			$this->Session->setFlash(__('Question deleted'));
			$this->redirect(array('action' => 'questions_answers'));
		}
		$this->Session->setFlash(__('Questions was not deleted'));
		$this->redirect(array('action' => 'questions_answers'));
	}
	
	public function admin_activate($id = null)
    {
        $this->Topic->id = $id;
        if ($this->Topic->exists()) {
            $x = $this->Topic->save(array(
                'Topic' => array(
                    'status' => '1'
                )
            ));
            $this->Session->setFlash("Topic activated successfully.");
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            $this->Session->setFlash("Unable to activate Topic.");
            $this->redirect(array(
                'action' => 'index'
            ));
        }
       
    }
	
	public function admin_activate_ajax($id = null)
    {
		$this->loadModel ('Question');
		$question_id	=	$_POST['User'];
		$user			=	$this->Question->find ('first',array('conditions'=>array('Question.id'=>$question_id)));
		//pr($user);die;
		if (!empty($user)) {
			if ($user['Question']['status'] == 0) {
				$this->Question->id = $user['Question']['id'] ;
				$x 	= $this->Question->save(
							array(
								'Question' => array(
									'status' => '1'
								)
							)
						);
				echo "1";
			}   else  {
				$this->Question->id = $user['Question']['id'] ;
				$x 	= $this->Question->save(
							array(
								'Question' => array(
									'status' => '0'
								)
							)
						);
				echo "0";
			}
		}
		die;
        
    }
	public function admin_deleteall($id = null){
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        foreach ($this->request['data']['Topic'] as $k) {
            $this->Topic->id = (int) $k;
            if ($this->Topic->exists()) {
                $this->Topic->delete();
            }
            
        }
        
        $this->Session->setFlash(__('Selected Topic were removed.'));
        $this->redirect($this->data['currentloc']);
    }
	public function admin_activateall($id = null){
		if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        
        foreach ($this->request['data']['Topic'] as $k => $v) {	
		if($k == $v){
			$this->Topic->id = $v;
			if ($this->Topic->exists()) {
				$x = $this->Topic->save(array(
					'Topic' => array(
						'status' => "1"
					)
					
				));
	        $this->Session->setFlash(__('Selected Topic Activated.', true));					
			} else {
				$this->Session->setFlash("Unable to Activate Topic.");
			}
		}
            
        }
		$this->redirect($this->data['currentloc']);
    }
		
	public function admin_deactivateall($id = null){
		if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        
        foreach ($this->request['data']['Topic'] as $k => $v) {	
		if($k == $v){
			$this->Topic->id = $v;
			if ($this->Topic->exists()) {
				$x = $this->Topic->save(array(
					'Topic' => array(
						'status' => "0"
					)
					
				));
	        $this->Session->setFlash(__('Selected Topic Deactivated.', true));					
			} else {
				$this->Session->setFlash("Unable to Deactivated Topic.");
			}
		}
            
        }
		$this->redirect($this->data['currentloc']);
    }	
	public function admin_add_question () 
	{
		$this->loadModel ('Topic');
		$this->loadModel ('Question');
		$this->loadModel ('Answer');
		$topics = $this->Topic->find ('all');
		$this->set('data',$topics);
		if ($this->request->is('post')) 
		{
			//pr($this->request->data);
			$data	= $this->request->data;
			 $this->Question->create();
			if ($this->Question->save($data)) 
			{
				$data1['Answer']['question_id']	 	= 	$this->Question->getLastInsertID();
				$right_answer									=	$data['RightAnswer'];
				foreach ($data['Answer'] as $info) 
				{
					foreach ($info as $key=>$value) 
					{			
						if ($key == $right_answer)
						{
							$data1['Answer']['right_question'] 	= '1';		
						}
						else
						{
							$data1['Answer']['right_question'] 	= '0';		
						}
						$data1['Answer']['answer']	 			= $value;			
						$data1['Answer']['status'] 				= 1;		
						$this->Answer->create();
						$this->Answer->save($data1);
					}
				}	
				$this->Session->setFlash(__('The Question And Answers has been saved'));
				$this->redirect(array('action' => 'questions_answers'));
			} 
			else 
			{
				$this->Session->setFlash(__('The Question and Answers could not be saved. Please, try again.'));
			}
		}
	}
	
	public function admin_questions_answers() {
		$this->loadModel('Question');
		$this->loadModel('Answer');	
		$this->loadModel('Topic');	
		$data	= $this->Topic->find('all');
		$this->set ('data',$data);
		$conditions = array ();		
		
		if	($this->request->is('post'))	{
			$keyword = trim($this->request->data['keyword']);
			if	($keyword != '')	{
				$conditions = array(
					"OR" => array(
						"Question.question LIKE" => "%$keyword%", 
						"Topic.name LIKE" => "%$keyword%" ,
						"Topic.id " => "$keyword" 
					)
				);
			}	else	{
				$ads = $this->paginate('Question') ;
				$this->set('contents',$ads);
				$this->Session->setFlash("Pls Choose some keywords to search..");
			}
			$this->Session->write('condtn', $conditions);	
			$this->paginate 	=	array('limit'=>10,'conditions' =>$conditions);				
			$ads 				= 	$this->paginate('Question');
			$this->set('contents',$ads);
		}
		else 
		{
			if(empty($conditions))
			{
				if ($this->Session->check('condtn') && empty($this->request->data)) {
					$conditions = $this->Session->read('condtn');    
				} 
				else {
					$this->Session->delete('condtn');
					$conditions = array();
				}
			}
			//pr ($conditions);die;
			$this->paginate 	=	array('limit'=>10,'conditions' =>$conditions);				
			$ads 				= 	$this->paginate('Question');
			$this->set('contents',$ads);
		}
		$this->Session->write ('question_csv',$conditions);
	}	
	
	function admin_question_csv()
	{
		$this->loadModel ('Question');
		$this->autoRender = false;		
		$cond	=	$this->Session->read ('question_csv');
		//pr($cond);die;
		@$info123 = $this->Question->find('all',array ('conditions'=>$cond));
		//echo "<pre>";print_r($info123);die;
		$data = "Sr. No,Topic,Question,Right Answer,\n";
		$name = 'Question';
		$filename = "Questions.csv";
		$i = 1;
		foreach($info123 as $info)
		{ 
			$data .= $i."," ;
			$data .=$info['Topic']['name'].",";
			$data .=$info['Question']['question'].",";
			//$data .=$info['Question']['question'].",";
			foreach ($info['Answer'] as $info1) {
				if($info1['right_question'] == 1) {
					$data .=  $info1['answer'].","."\n";
				}
			} 
			$i++;
		}
		//pr($data);die;
		$fp = fopen('files/QuestionReport/'.$filename,"w");
		if($fp)
		{
			fwrite($fp,$data);
		 	header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream'); 
			header('Content-Disposition: attachment; filename='.$name.'_Report_'.date("d/m/Y").".csv");
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public'); 
			header('Content-Length: ' . filesize('files/QuestionReport/'.$filename));
			/* ob_clean(); */
			readfile('files/QuestionReport/'.$filename);
			unlink('files/QuestionReport/'.$filename); 
			fclose($fp);
			flush();
			exit;	
		}
		
	}
	
	public function admin_edit_questions_answers($id = null) {
		$this->loadModel ('Question');
		$this->loadModel ('Answer');
		$this->loadModel ('Topic');
		$topics = $this->Topic->find ('all');
		$this->set('data',$topics);
		$question = $this->Question->find('first',array('conditions'=>array('Question.id'=>$id)));
		$this->set(compact('question'));
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid Question'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			//pr($this->request->data);die;
			$data	= $this->request->data;
			$data['Question']['id'] 	= $id;
			$answerId 						=	$data['Question']['answer_id'];
			$this->Question->create();
			if ($this->Question->save($data)) {
				$data1['Answer']['id']	 					= $answerId;
				$data1['Answer']['question_id']	 	= $id;
				$data1['Answer']['answer1']	 			= $data['Question']['answer1'];			
				$data1['Answer']['answer2']				= $data['Question']['answer2'];			
				$data1['Answer']['answer3'] 			= $data['Question']['answer3'];			
				$data1['Answer']['answer4'] 			= $data['Question']['answer4'];			
				$data1['Answer']['right_question'] 	= $data['Question']['right_question'];			
				$data1['Answer']['status'] 				= 1;		
				//pr($data1);die;
				 $this->Answer->create();
				if ($this->Answer->save($data1)) {
					$this->Session->setFlash(__('The Question And Answers has been saved'));
					$this->redirect(array('action' => 'questions_answers'));
				}
			} else {
				$this->Session->setFlash(__('The Question and Answers could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Topic->read(null, $id);
		}		
	}
	
	public function admin_check_answer ($id = Null) {
		$this->set ('question_id',$id);
		$this->loadModel ('Topic');
		$this->loadModel ('QuestionAnswer');		
		$this->QuestionAnswer->virtualFields = array(
			'wrong_answer_count' => 'SELECT count(id) FROM question_answers where QuestionAnswer.question_id='.$id.' and question_answers.answer_status = 0',
			'right_answer_count' => 'SELECT count(id) FROM question_answers where QuestionAnswer.question_id='.$id.' and question_answers.answer_status = 1',
			'right_answer' => 'SELECT answer FROM answers where QuestionAnswer.answer_id = answers.id',
			'user_answer_status' => 'SELECT right_question FROM answers where QuestionAnswer.answer_id = answers.id',
			'total' => 'SELECT count(id) FROM question_answers where question_answers.question_id='.$id.'',
			);
		if	($this->request->is('post'))	{
			$keyword = trim($this->request->data['keyword']);
			if	($keyword != '')	{
				$conditions = array(
					"OR" => array(
						"User.email LIKE" => "%$keyword%", 
						"Question.question LIKE" => "%$keyword%" 
					)
				);
				$this->paginate = array(
					'conditions' =>$conditions,
					'contain'=>array(
						'User'=>array('id','username','email','status'),'Topic','Question'=>array(
							'Answer'=>array('id','answer','right_question')
						)
					)
				);
				
				$data =	$this->paginate('QuestionAnswer');
				$this->set ('data',$data);
				if	(empty($data))		{
					$this->Session->setFlash("No Record found with this keyword please use another one.");
				}
			}	else	{
				$data =	$this->paginate('QuestionAnswer');
				$this->set ('data',$data);
				$this->Session->setFlash("Pls Choose some keywords to search..");
			}
		}
		else 
		{	
			$this->paginate = array(
				'contain'=>array(
					'User'=>array('id','username','email','status'),'Topic','Question'=>array(
						'Answer'=>array('id','answer','right_question')
					)
				),
				'conditions'=>array(
					'QuestionAnswer.question_id' =>$id,
				)
			);
			$data =	$this->paginate('QuestionAnswer');
			$this->set ('data',$data);
			//pr($data);die;
		}
	}
	
	public function admin_add_question_csv () 
	{
		ini_set('memory_limit', '256M');
		$this->loadModel ('Question');
		$this->loadModel ('Answer');
		$topics = $this->Topic->find ('all');
		$this->set('data',$topics);
		if (!empty($this->data))
		{	
			$data = $this->data;
			if(!empty($data['Question']['profile_image']['name']))
			{
				$member_img = $data['Question']['profile_image'];
				$medium = 'files/Question Csv/';
				$imgName = pathinfo($member_img['name']);
				$ext = strtolower($imgName['extension']);
				//pr($imgName);die;
				if( $ext == 'csv' )
				{
					$newImgName = $data['Question']['profile_image']['name'].'-'.time().".".$ext;
					if(move_uploaded_file($data['Question']['profile_image']['tmp_name'],$medium = 'files/Question Csv/'.$newImgName))
					{  
						//echo "jjj";die;
						$file = fopen('files/Question Csv/'.$newImgName,"r");
                        $i = 1;
						$error = array();
						while(!feof($file))
						{  
						    $temp = array();
							$temp['Question'] = array();
							$user_details = array();
							//pr(fgetcsv($file));die;
							$info =	fgetcsv($file);
							//pr($info);die;
							if(!empty($info) ){
								foreach( $info as $key => $val ) {
									//pr($key);die;
									switch( $key ) {
										case 0:
											$user_details['question'] = $val;
											break;			
										case 1:
											$user_details['topic_id'] = $data['Question']['topic_id'];
											break;
										default : break;
									}
								}
							}	
                            $temp['Question'] =  $user_details ;
							$continue = 0;
							$error[$i] = array();
                                                        
                            $date = date('Y-m-d:h:i:s');
							$temp['Question']['status'] = 0;
							if( isset( $temp['Question']['question'] ) && !empty( $temp['Question']['question'] ) ) {
							   
							} else {
								$error[$i] = array_merge($error[$i],array('question'));
								$continue = true;
                            }
							$i++; 
							if( $continue ) {		
								continue;
							} 
							if( $i > 1 ) {
								//echo "kk";
								//pr($info);die;
								$this->Question->save($temp);
								$this->Question->create();
								$data1['Answer']['question_id']	 	= 	$this->Question->getLastInsertID();
								for ($i = 1; $i<7; $i++) 
								{	
									if ($i == 1)
									{
										$data1['Answer']['right_question'] 	= '1';		
									}
									else
									{
										$data1['Answer']['right_question'] 	= '0';		
									}
									$data1['Answer']['answer']	 			= $info[$i];			
									$data1['Answer']['status'] 				= 1;		
									$this->Answer->create();
									$this->Answer->save($data1);					
								}										
							}                            							
						}
						//echo $i;
						//pr($temp);die;
						$last_index =  count($error);
						unset($error[$last_index]);
						array_shift($error);
						$check = false;
						foreach($error as $err){
						    if( !empty( $err ) ) {
								//echo "Some Errors in the File CSV file following is the serial number of users having problem ";
								$check = true;
								break;
							}
							
						}
						fclose($file);
						
						if($check){
							//prx($error);
						}
						$this->Session->setFlash(__('File Upload Successfully'));
						$this->redirect(array('action' => 'questions_answers'));
					}
				} else { 
					$this->Session->setFlash(__('File Upload Error'));
					$this->redirect(array('action' => 'questions_answers'));
				}
			} else {
				$this->Session->setFlash(__('File Upload Error'));
				$this->redirect(array('action' => 'questions_answers'));
			}
		}
		
	}
	public function admin_view_answer ($id =Null) {
		$this->loadModel ('Question');
		$data = $this->Question->find ('first',array('conditions'=>array('Question.id'=>$id)));
		$this->set ('data',$data);
		//pr($data);die;
	}
}
