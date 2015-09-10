<?php
	#Project : E-Mac
	App::uses('AppController', 'Controller');
	class WebservicesController extends AppController 
	{
		public $uses = array('Category','AllVideo','VideoComment','VideoLike','VideoDislike','VideoView','User','UserFollower','FavoriteVideo');
  		public function beforeFilter() 
		{
			parent::beforeFilter();
			$this->Auth->allow(array('signup','login','forgot','admin_reset','changepass','myProfile','profile_edit','categories','add_video','all_videos','all_videos_of_user','all_videos_by_category_id','like_video','dislike_video','comment_video','views_video','trim_video','total_dislikes','video_details','video_comments','user_follower','testing','favorite_video','user_favorite_video','user_following','get_product_by_bar_code','get_products_by_ingredients','get_products_by_ingredients_and_category'));
		}	
		
		# //http://dev414.trigma.us/E-Mac/Webservices/signup?username=gurudutt1&first_name=guru&last_name=sharma&profile_image=profileimage2.png&email=gurudutt.sharma@trigma.in&register_type=facebook&password=123456&conpassword=123456
		public function signup () 
		{
			if ($_REQUEST['password'] != $_REQUEST['conpassword'])  {
				$response    = 	array('status'=>0,'message'=>'Password  and Conform Password does not match.');
				echo json_encode($response);
				exit;
			}
			$data['User']['username']		=	isset ($_REQUEST['username']) ? $_REQUEST['username'] : '';
			$data['User']['first_name']		=	isset ($_REQUEST['first_name']) ? $_REQUEST['first_name'] : '';
			$data['User']['last_name']		=	isset ($_REQUEST['last_name']) ? $_REQUEST['last_name'] : '';
			$data['User']['profile_image']	=	isset ($_REQUEST['profile_image']) ? $_REQUEST['profile_image'] : '';
			$data['User']['email']				=	isset ($_REQUEST['email']) ? $_REQUEST['email'] : '';
			$data['User']['register_type']	=	isset ($_REQUEST['register_type']) ? $_REQUEST['register_type'] : '';		
			$data['User']['status'] 				=	1;
			$data['User']['register_date'] 	= 	date ("Y-m-d"); 
			$data['User']['usertype_id']  	=  7;
			
			if ($_REQUEST['register_type']	==	"facebook")  {	
				$data['User']['fb_id']  			=  @$_REQUEST['fb_id'];		
				$getFbIDStatus 					=  $this->User->find('first',array('conditions'=>array('User.fb_id'=>$_REQUEST['fb_id'])));
				if (empty($getFbIDStatus))  {
					$fbexist 						= 	$this->User->find('first',array('conditions'=>array('AND'=>array('User.fb_id'=>$_REQUEST['fb_id']))));
					if (empty($fbexist))  {						
						$this->User->create();               
						if ($this->User->save($data)) {
							$user_id  				= 	$this->User->getLastInsertID();
							$this->User->query ("update users set password= '' where id = '".$user_id."'");
							$response 			= 	array('status'=>1,'message'=>'User Register Successfully with facebook','user_id'=>$user_id);
							echo json_encode($response);die;
						}  else  {
							$response				= 	array('status'=>0,'message'=>'Please try again');
							echo json_encode($response);die;
						}
					}  else  {
						$response					= 	array('status'=>3,'message'=>'Facebook id exist, please try another email');
						echo json_encode($response);die;
					} 			
				}  else  {
					$response 					= 	array('status'=>3,'message'=>'facebook id  already exist, please try another user');
					echo json_encode($response);die;
				}
			}  	else if($_REQUEST['register_type']== "manual")  {					
				//$data['User']['password']  	=  @$_REQUEST['password'];
				$data['User']['password']  	=  AuthComponent::password($_REQUEST['password']);
				$exist 								= 	$this->User->find("first", array("conditions" => array("User.username" => $data['User']['username'])));
				if (empty($exist))  {
					$emailexist 					= 	$this->User->find('first',array('conditions'=>array('AND'=>array('User.email'=>$data['User']['email']))));
					if (empty($emailexist))  {
						$this->User->create();               
						if ($this->User->save($data)) {
							$user_id    			=  $this->User->getLastInsertID();							
							if(@$_REQUEST['profile_image']!='') {  
								$name				=  $user_id."profileImage.png";
								$this->User->saveField('profile_image',$name);
								@$_REQUEST['profile_image']	=  str_replace('data:image/png;base64,', '', @$_REQUEST['profile_image']);
								$_REQUEST['profile_image'] 		=  str_replace(' ', '+',$_REQUEST['profile_image']);
								$unencodedData						=  base64_decode($_REQUEST['profile_image']);
								$pth 											=  WWW_ROOT.'files' . DS . 'profileimage' . DS .$name;
								file_put_contents($pth, $unencodedData);
							 }
							 $isf	 			= 	$this->User->find('first',array('conditions'=>array('User.id'=>$user_id)));
							$user_id		=	isset ($isf['User']['id']) ? $isf['User']['id'] : '';	
							$username	=	isset ($isf['User']['username']) ? $isf['User']['username'] : '';								
							$email			=	isset ($isf['User']['email']) ? $isf['User']['email'] : '';	
							$contact		=	isset ($isf['User']['contact']) ? $isf['User']['contact'] : '';	
							$usertype_id	=	isset ($isf['User']['usertype_id']) ? $isf['User']['usertype_id'] : '';	
							
							$response = array (
								'status' 			=> 1,
								'message'		=> 'User Register Successfully',
								'user_id' 		=> $user_id,
								'username'	=> $username,
								'image'			=> FULL_BASE_URL.$this->webroot.'files' . DS . 'profileimage'. DS .$isf['User']['profile_image'],
								'email'			=> $email,
								'usertype_id'	=> $usertype_id							
							);
							echo json_encode($response);die;
						}  else  {
							$response			= 	array('status'=>0,'message'=>'Please try again');
							echo json_encode($response);die;
						}
					}  else  {
						$response						= 	array('status'=>3,'message'=>'Email id exist, please try another email');
						echo json_encode($response);die;
					} 					
				}  else  {
					$response 							= 	array('status'=>3,'message'=>'Student already exist, please try another user');
					echo json_encode($response);die;
				}		
			}
			exit;			
		}
		
		// http://dev414.trigma.us/E-Mac/Webservices/login?email=gurudutt.sharggmya@trigma.in&password=123456
		function login ($u = null,$p = null)	
		{
			$this->request->data['User']['username']	=	$_REQUEST['email'];
			$this->request->data['User']['password']	= 	$_REQUEST['password'];                 
			$usern 			= 	$this->request->data['User']['username'];
			$us 				= 	$this->User->find("first", array("conditions" => array("OR"=>array("User.email"=>$usern,"User.username" => $usern))));
			
			if (empty($us))  {
				$response =	array('message'=>"Invalid username and password",'status' =>0);
				echo json_encode($response);exit; 				
			}
			if ($us['User']['status'] != '1') { 
				$response =	array('message'=>"Your account has been blocked by Administrator",'status' =>0);
				echo json_encode($response);exit; 
			}
			App::Import('Utility', 'Validation'); 
			$pass 			=	AuthComponent::password($this->data['User']['password']); 
			$user 			=	$this->request->data['User']['username'];
			$isf 				= 	$this->User->find(
				'first', array(
					'conditions' 	=> array(
						'AND' 		=> array(
							'OR'=>array(
								'User.email' 		=> $user,
								"User.username" => $user
							), 
							'User.password' => $pass
						)
					)
				)
			);
			if (!$isf) {
				$response = 	array('message'=>"Invalid Password",'status' =>0);
				echo json_encode($response);exit; 					
			} 
			$resp 			= 	"You have successfully logged-In";
			$type 			=	$isf['User']['usertype_id'];						
				
			$user_id		=	isset ($isf['User']['id']) ? $isf['User']['id'] : '';
			$username	=	isset ($isf['User']['username']) ? $isf['User']['username'] : '';
			$email			=	isset ($isf['User']['email']) ? $isf['User']['email'] : '';
			$first_name	=	isset ($isf['User']['first_name']) ? $isf['User']['first_name'] : '';
			$last_name	=	isset ($isf['User']['last_name']) ? $isf['User']['last_name'] : '';
			$followers		=	isset ($isf['User']['followers']) ? $isf['User']['followers'] : '';
			$followings	=	isset ($isf['User']['last_name']) ? $isf['User']['followings'] : '';
			$videos			=	isset ($isf['User']['last_name']) ? $isf['User']['videos'] : '';
			$profile_image	=	isset ($isf['User']['profile_image']) ? FULL_BASE_URL.$this->webroot.'files' . DS . 'profileimage'. DS .$isf['User']['profile_image'] : '';
			
			$response		=	array (
				'message'	=> $resp,
				'user_id' 	=> $user_id,
				'username'=> $username,
				'email'		=> $email,
				'first_name'=> $first_name,
				'last_name'=> $last_name,
				'followers'	=> $followers,
				'followings'	=> $followings,
				'videos'		=> $videos,
				'profile_image'	=> $profile_image,
				'status'		=> 1
			);
			//pr ($response);die;
			echo json_encode($response);exit; 
		}
		
		// http://dev414.trigma.us/E-Mac/Webservices/forgot?email=gurudutt.sharma@trigma.in
		public function forgot () 
		{
			$email 						= 	$_REQUEST['email'];
			$fu 							= 	$this->User->find('first', array('conditions' => array('User.email' => $email)));
			if (empty($fu)) {  
				$response[] 			= array('message'=>"Email does not exist");
				echo json_encode($response);exit;		
			}
		
			if ($fu['User']['status'] != "1") {
				$response[] 			= array('message'=>"Your account has been blocked by Administrator");
				echo json_encode($response);exit;
			}
			
			$name = $fu['User']['email'];
			if  ($fu['User']['username'] != '')  {
				$name = $fu['User']['username'];
			} 
			$key 						=	Security::hash(String::uuid(), 'sha512', true);
			$hash 						= 	sha1($fu['User']['email'] . rand(0, 100));
			$url 							= 	Router::url(array('controller' => 'admin/users', 'action' => 'reset'), true) . '/' . $key . '#' . $hash;
			$ms 							= 	"<p>Hi <br/>".$name.",<br/><a href=".$url.">Click here</a> to reset your password.</p><br /> ";
			$fu['User']['token'] 		= $key;
			$this->User->id 		= $fu['User']['id'];
			if ($this->User->saveField('token', $fu['User']['token'])) {
				$l 							= new CakeEmail();
				$l->emailFormat ('html')->template ('signup', 'fancy')->subject ('Reset Your Password')->to ($email)->from ('gurudutt.sharma@trigma.in')->send($ms);
				$response[]			= array('message'=>"Check Your Email To Reset your password");
				echo json_encode($response);
				exit;
			} 	else {				
				$response[] 			= array('message'=>"Please try again");
				echo json_encode($response);
				exit;                                
			}
		}
		
		//	http://dev414.trigma.us/N-110BB/Webservices/reset?email=gurudutt.sharma@trigma.in
		public function admin_reset($token = null) 
		{
			$this->User->recursive = -1;
			if (!empty($token)) {
				$u = $this->User->findBytoken($token);
				if ($u) {
					$this->User->id = $u['User']['id'];
					if (!empty($this->data)) {
					    if ($this->data['User']['password'] != '') {
							if ($this->data['User']['password_confirm'] != '') {
								if ($this->data['User']['password'] != $this->data['User']['password_confirm']) {
									$this->Session->setFlash("Both the passwords are not matching...");
									return;
								}
								$this->User->data = $this->data;
								$this->User->data['User']['username'] = $u['User']['username'];
								$new_hash = sha1($u['User']['username'] . rand(0, 100)); //created token
								$this->User->data['User']['token'] = $new_hash;
								if ($this->User->validates(array('fieldList' => array('password', 'password_confirm')))) {
									//	if($this->request->data['User']['password'] == $this->request->data['User']['confirm_password'] ){
									if ($this->User->save($this->User->data)) {
										echo "Your password has been updated";
										exit;
									}
								} else {
									$this->set('errors', $this->User->invalidFields());
								}
							} else {
								$this->Session->setFlash("Both fields are required...");
								return;
							}
						} else {
								$this->Session->setFlash("Both fields are required...");
								return;
							}
					}
				} else {
					$this->Session->setFlash('Token Corrupted, Please Retry.the reset link <a style="cursor: pointer; color: rgb(0, 102, 0); text-decoration: none; background: url("http://files.adbrite.com/mb/images/green-double-underline-006600.gif") repeat-x scroll center bottom transparent; margin-bottom: -2px; padding-bottom: 2px;" name="AdBriteInlineAd_work" id="AdBriteInlineAd_work" target="_top">work</a> only for once.');
				}
			}
		}
		
		//    4. http://dev414.trigma.us/E-Mac/webservices/changepass?email=gurudutt.sharma@trigma.in&opass=123456&cpass=gurudutt&newpass=gurudutt
		public function changepass () 
		{         
			$result			=  array();
			$password 	=	AuthComponent::password($_REQUEST['opass']);
			$em				=	$_REQUEST['email'];
			$pass			=	$this->User->find('first',array('conditions'=>array('OR'=>array('User.username'=>$em,'User.email' => $em))));

			if (!empty($pass))  {
				$result['message']				=	"Your email id does not exist.";  
				echo json_encode($result);
				exit;
			}

			$result['user_id']	=	@$pass['User']['id'];
			if ($pass['User']['password']==$password) {
				if ($_REQUEST['newpass'] != $_REQUEST['cpass'] ) {
					$result['message']="New password and Confirm password field do not match";                          
				}	else  {
					$_REQUEST['opass'] 	= $_REQUEST['newpass'];
					$this->User->id 			= $pass['User']['id'];
					if($this->User->exists())	{
						$pass	= array('User'=>array('password'=>$_REQUEST['newpass']));
						if($this->User->save($pass)) {
						   $result['message']	=	"Password updated";     
							$result[]	=	array(
								'status'		=>1,
								'message'	=>'Password updated'
							);
						}
					}
				}
			}	else {
				$result['message']				=	"Your old password did not match.";                             
			}        
			echo json_encode($result);
			exit;
		}
		
		//http://dev414.trigma.us/E-Mac/webservices/myProfile?id=207
		public function myProfile() 
		{  
			$id	=	$_REQUEST['id'];
			$this->User->id	=	$id;
			if($this->User->exists	())  {    
				$user=$this->User->find ('all',array('conditions'=>  array('User.id'=>$id)));
				foreach ($user as $key => $value) {
					$url 				= FULL_BASE_URL.$this->webroot.'files' .DS. 'profileimage';
					$username 	= !empty($value['User']['username'])?$value['User']['username'] :'';
					$email			= !empty($value['User']['email'])?$value['User']['email'] :'';
					$first_name	=	isset ($value['User']['first_name']) ? $value['User']['first_name'] : '';
					$last_name	=	isset ($value['User']['last_name']) ? $value['User']['last_name'] : '';
					$followers		=	isset ($value['User']['followers']) ? $value['User']['followers'] : '';
					$followings	=	isset ($value['User']['last_name']) ? $value['User']['followings'] : '';
					$videos			=	isset ($value['User']['last_name']) ? $value['User']['videos'] : '';
					$profile_image	=	isset ($value['User']['profile_image']) ? FULL_BASE_URL.$this->webroot.'files' . DS . 'profileimage'. DS .$value['User']['profile_image'] : '';
			
					$data			=  array (
						'id'			=>$value['User']['id'],
						'username'=>$username,
						'first_name'=>$first_name,
						'last_name'=>$last_name,
						'email'		=>$email,
						'followers'	=>$followers,
						'followings'	=>$followings,
						'profile_image'=>$profile_image,
						'videos'	=>$videos,
						'status'		=>1
					);
				}        
				echo json_encode($data);exit;
			} else {
				$data = array('status'=>0,'msg'=>'Invalid User');
				 echo json_encode($data);exit;
			}    
		}
		
		// http://dev414.trigma.us/E-Mac/webservices/profile_edit?id=207&username=gurudutt1&location=guru&profile=sharma&profile_image=profileimage2.png&dob=456&first_name=guru123&last_name=sharma123
		public function profile_edit () 
		{
			$this->loadModel('User');
			$this->User->id = $_REQUEST['id'];
			if (!$this->User->exists()) 
			{	
				throw new NotFoundException(__('Invalid user'));
			}
			$user_email_exist	=	$this->User->find ('first',array('conditions'=>array('User.id'=>$_REQUEST['id'])));
			$result	=  array ();
			if (!empty($user_email_exist)) {
										
				if(!empty($_REQUEST['username']))  {
					$this->request->data['User']['username']	= $_REQUEST['username'];
				} 		
				if(!empty($_REQUEST['location']))  {
					$this->request->data['User']['location']	= $_REQUEST['location'];
				} 		
				if(!empty($_REQUEST['profile']))  {
					$this->request->data['User']['profile']	= $_REQUEST['profile'];
				} 		
				if(!empty($_REQUEST['dob']))  {
					$this->request->data['User']['dob']	= $_REQUEST['dob'];
				} 
				if(!empty($_REQUEST['first_name']))  {
					$this->request->data['User']['first_name']	= $_REQUEST['first_name'];
				} 		
				if(!empty($_REQUEST['last_name']))  {
					$this->request->data['User']['last_name']	= $_REQUEST['last_name'];
				} 				
								
				$id = $_REQUEST['id'];
			
				if ($this->User->save($this->request->data)) {
					if(isset($_REQUEST['profile_image']) && !empty($_REQUEST['profile_image']))  {
						$ti=date('Y-m-d-g:i:s');
						$dname= $ti.$id."image.png";
						$this->User->saveField('profile_image',$dname);
						@$_REQUEST['profile_image']= str_replace('data:image/png;base64,', '', $_REQUEST['profile_image']);
						$_REQUEST['profile_image'] = str_replace(' ', '+',$_REQUEST['profile_image']);
						$unencodedData=base64_decode($_REQUEST['profile_image']);
						$pth3 = WWW_ROOT.'files' . DS . 'profileimage'. DS .$dname;
						file_put_contents($pth3, $unencodedData);
					}
					$user	=	$this->User->find('first',array('conditions'=>  array('User.id'=>$id)));	
					if (!empty($user['User']['profile_image'])){
						$profileImage = FULL_BASE_URL.$this->webroot.'files' . DS . 'profileimage'. DS .$user['User']['profile_image'];
					} else {
						$profileImage = '';
					}
					$user_id		=	isset ($user['User']['id']) ? $user['User']['id'] : '';
					$username	=	isset ($user['User']['username']) ? $user['User']['username'] : '';
					$email			=	isset ($user['User']['email']) ? $user['User']['email'] : '';
					$first_name	=	isset ($user['User']['first_name']) ? $user['User']['first_name'] : '';
					$last_name	=	isset ($user['User']['last_name']) ? $user['User']['last_name'] : '';
					$followers		=	isset ($user['User']['followers']) ? $user['User']['followers'] : '';
					$followings	=	isset ($user['User']['last_name']) ? $user['User']['followings'] : '';
					$videos			=	isset ($user['User']['last_name']) ? $user['User']['videos'] : '';
					$profile_image	=	isset ($user['User']['profile_image']) ? FULL_BASE_URL.$this->webroot.'files' . DS . 'profileimage'. DS .$user['User']['profile_image'] : '';
					
					$result['id']					= $user['User']['id']; 
					$result['username']		= $user['User']['username']; 
					$result['first_name']	= $user['User']['first_name']; 
					$result['last_name']		= $user['User']['last_name']; 
					$result['followers']		= $user['User']['followers']; 
					$result['followings']		= $user['User']['followings']; 
					$result['videos']			= $user['User']['videos']; 
					$result['profile_image']			= $profile_image; 
					$result['email']			= $user['User']['email']; 
					$result['location']			= $user['User']['location']; 
					$result['profile']			= $user['User']['profile']; 
					$result['dob']			= $user['User']['dob']; 
					$result['message']		= 'The details has been updated';
				} 
				else {
					$result['message']= 'The details could not be saved. Please, try again.';    
				}
				echo json_encode($result);
				exit();
			} else {
				$result['message']= 'Somthing error eccor';    
				echo json_encode($result);
				exit();
			}
		}	
		
		//http://dev414.trigma.us/E-Mac/Webservices/categories
		public function categories () 
		{
			$data 	= 	$this->Category->find ('all');
			//pr ($data);die;
			if (empty($data)) {
				$response[] = array('status'=>0,'msg'=>'no category found.');
				echo json_encode ($response);exit;
			}	
			foreach($data as $value) {
				$response[]	=	array(
					'status'				=>1,
					'category_id'		=>$value['Category']['id'],
					'category_name'=>$value['Category']['name'],										
					'image'				=>FULL_BASE_URL.$this->webroot.'files' . DS . 'categoryimages'. DS .$value['Category']['image']										
				);
			}
			//pr ($response);
			echo json_encode($response);exit;
		}		
		
		//http://dev414.trigma.us/E-Mac/Webservices/add_video?user_id=2285&category_id=1&full_video=video.mp4&small_video=small_video.mp4&title=video&description=video is for nation
		public function add_video ()
		{
			if ($_REQUEST['user_id'] 			== '' or 
				$_REQUEST['full_video'] 		== '' or  
				$_REQUEST['small_video']		== '' or 
				$_REQUEST['category_id'] 	== '' or 
				$_REQUEST['title']					== '' or
				$_REQUEST['description']		== '' 
			)  {
				$response[] = array('status'=>0,'msg'=>'error:wrong parameters.');
				echo json_encode ($response);exit;
			}
			$data['AllVideo']['user_id']				=	$_REQUEST['user_id'];
			$data['AllVideo']['category_id']		=	$_REQUEST['category_id'];
			$data['AllVideo']['full_video']			=	$_REQUEST['full_video'];
			$data['AllVideo']['small_video']			=	$_REQUEST['small_video'];
			$data['AllVideo']['title']					=	$_REQUEST['title'];
			$data['AllVideo']['description']			=	$_REQUEST['description'];
			$data['AllVideo']['total_likes']			=	0;
			$data['AllVideo']['total_dislikes']		=	0;
			$data['AllVideo']['total_comments']	=	0;
			$data['AllVideo']['total_views']			=	0;
			$data['AllVideo']['date']					=	date("Y-m-d H:i:s");
			
			if ($this->AllVideo->save ($data))  {
				$response[] = array('status'=>0,'msg'=>'success.');
				echo json_encode ($response);exit;
			}  else  {
				$response[] = array('status'=>0,'msg'=>'error.');
				echo json_encode ($response);exit;
			}			
		}
		
		//http://dev414.trigma.us/E-Mac/Webservices/all_videos
		public function all_videos ()
		{
			$data 	= 	$this->AllVideo->find ('all',array('contain'=>array('Category.name','User.username')));
			if (empty($data)) {
				$response[] = array('status'=>0,'msg'=>'no video found.');
				echo json_encode ($response);exit;
			}	
			foreach($data as $key=>$value) {
				$response[]	=	array(
					'status'			=> 1,
					'id'				=> $value['AllVideo']['id'],
					'user_id'		=> $value['AllVideo']['user_id'],										
					'category_id'	=> $value['AllVideo']['category_id'],										
					'category_name'	=> $value['Category']['name'],										
					'full_video'		=> FULL_BASE_URL.$this->webroot.'files' . DS . 'full_videos'. DS .$value['AllVideo']['full_video'],										
					'small_video'	=> FULL_BASE_URL.$this->webroot.'files' . DS . 'small_videos'. DS .$value['AllVideo']['small_video'],										
					'thumbnail_images'	=> FULL_BASE_URL.$this->webroot.'files' . DS . 'thumbnail_images'. DS .$value['AllVideo']['thumbnail_images'],
					'title'				=> $value['AllVideo']['title'],										
					'description'	=> $value['AllVideo']['description'],										
					'total_likes'		=> $value['AllVideo']['total_likes'],										
					'total_dislikes'		=> $value['AllVideo']['total_dislikes'],										
					'total_comments' =>$value['AllVideo']['total_comments'],										
					'total_views'	=>$value['AllVideo']['total_views'],										
					'date' 			=> $value['AllVideo']['date'], 										
					'username'	=> $value['User']['username'], 										
					'cat_name'		=> $value['Category']['name'], 										
				);
			}
			//pr ($response);die;
			echo json_encode($response);exit;					
		}
		
		//http://dev414.trigma.us/E-Mac/Webservices/all_videos_of_user?user_id=2285
		public function all_videos_of_user ()
		{
			if ($_REQUEST['user_id'] == '')  {
				$response[] = array('status'=>0,'msg'=>'error:wrong parameters.');
				echo json_encode ($response);exit;
			} else {
				$user_id	=	$_REQUEST['user_id'] ;
			}
			$data 	= 	$this->AllVideo->find ('all',array('conditions'=>array('AllVideo.user_id'=>$user_id),'contain'=>array('Category.name','User.username')));
			//pr ($data);die;
			if (empty($data)) {
				$response[] = array('status'=>0,'msg'=>'no video found.');
				echo json_encode ($response);exit;
			}	
			foreach($data as $key=>$value) {
				$response[]	=	array(
				'status'			=> 1,
				'id'				=> $value['AllVideo']['id'],
				'user_id'		=> $value['AllVideo']['user_id'],										
				'category_id'	=> $value['AllVideo']['category_id'],										
				'category_name'	=> $value['Category']['name'],										
				'full_video'		=> $value['AllVideo']['full_video'],										
				'small_video'	=> $value['AllVideo']['small_video'],										
				'title'				=> $value['AllVideo']['title'],										
				'description'	=> $value['AllVideo']['description'],										
				'total_likes'		=> $value['AllVideo']['total_likes'],										
				'total_dislikes'		=> $value['AllVideo']['total_dislikes'],										
				'total_comments' =>$value['AllVideo']['total_comments'],										
				'total_views'	=>$value['AllVideo']['total_views'],										
				'date' 			=> $value['AllVideo']['date'], 										
				'username'	=> $value['User']['username'], 										
				'cat_name'		=> $value['Category']['name'], 									
				);
			}
			//pr ($response);
			echo json_encode($response);exit;
						
		}
		
		//http://dev414.trigma.us/E-Mac/Webservices/all_videos_by_category_id?category_id=1
		public function all_videos_by_category_id ()
		{
			if ($_REQUEST['category_id'] == '')  {
				$response[] = array('status'=>0,'msg'=>'error:wrong parameters.');
				echo json_encode ($response);exit;
			} else {
				$category_id	=	$_REQUEST['category_id'] ;
			}
			$data 	= 	$this->AllVideo->find ('all',array('conditions'=>array('AllVideo.category_id'=>$category_id),'contain'=>array('Category.name','User.username')));
			if (empty($data)) {
				$response[] = array('status'=>0,'msg'=>'no video found.');
				echo json_encode ($response);exit;
			}	
			foreach($data as $key=>$value) {
				$response[]	=	array(
				'status'			=> 1,
				'id'				=> $value['AllVideo']['id'],
				'user_id'		=> $value['AllVideo']['user_id'],										
				'category_id'	=> $value['AllVideo']['category_id'],										
				'category_name'	=> $value['Category']['name'],										
				'full_video'		=> $value['AllVideo']['full_video'],										
				'small_video'	=> $value['AllVideo']['small_video'],										
				'title'				=> $value['AllVideo']['title'],										
				'description'	=> $value['AllVideo']['description'],										
				'total_likes'		=> $value['AllVideo']['total_likes'],										
				'total_dislikes'		=> $value['AllVideo']['total_dislikes'],										
				'total_comments' =>$value['AllVideo']['total_comments'],										
				'total_views'	=>$value['AllVideo']['total_views'],										
				'date' 			=> $value['AllVideo']['date'], 										
				'username'	=> $value['User']['username'], 										
				'cat_name'		=> $value['Category']['name'], 									
				);
			}
			 //pr ($response);die;
			echo json_encode($response);exit;
						
		}
		
		//http://dev414.trigma.us/E-Mac/Webservices/like_video?user_id=2285&video_id=1
		public function like_video ()
		{
			if ($_REQUEST['user_id'] == '' or $_REQUEST['video_id'] == '')  {
				$response[] = array('status'=>0,'msg'=>'error:wrong parameters.');
				echo json_encode ($response);exit;
			} else {
				$user_id	=	$_REQUEST['user_id'];
				$video_id	=	$_REQUEST['video_id'];
			}
			
			$exist	=	$this->VideoLike->find('first',array('conditions'=>array('AND'=>array('VideoLike.user_id'=>$user_id,'VideoLike.all_video_id'=>$video_id)),'contain'=>array()));
			if (!empty($exist)) {
				$response[] = array('status'=>0,'msg'=>'error: you already like this video.');
				echo json_encode ($response);exit;
			}
			
			$data['VideoLike']['user_id']	=	$_REQUEST['user_id'];
			$data['VideoLike']['all_video_id']	=	$_REQUEST['video_id'];
			$data['VideoLike']['date']			=	date("Y-m-d H:i:s");
			
			if ($this->VideoLike->save ($data))  {
				$id		=	$this->VideoLike->getLastInsertId();
				$videos	=	$this->AllVideo->find('first',array('conditions'=>array('AllVideo.id'=>$video_id),'contain'=>array()));
				$update['AllVideo']['id']	=	$video_id;
				$update['AllVideo']['total_likes']	=	$videos['AllVideo']['total_likes'] + 1;
				if ($this->AllVideo->save ($update))  {
					$response[] = array('status'=>0,'msg'=>'success.');
					echo json_encode ($response);exit;
				}
			}  else  {
				$response[] = array('status'=>0,'msg'=>'error.');
				echo json_encode ($response);exit;
			}			
		}
		
		//http://dev414.trigma.us/E-Mac/Webservices/dislike_video?user_id=2285&video_id=1
		public function dislike_video ()
		{
			if ($_REQUEST['user_id'] == '' or $_REQUEST['video_id'] == '')  {
				$response[] = array('status'=>0,'msg'=>'error:wrong parameters.');
				echo json_encode ($response);exit;
			} else {
				$user_id	=	$_REQUEST['user_id'];
				$video_id	=	$_REQUEST['video_id'];
			}
			
			$exist	=	$this->VideoDislike->find('first',array('conditions'=>array('AND'=>array('VideoDislike.user_id'=>$user_id,'VideoDislike.all_video_id'=>$video_id)),'contain'=>array()));
			if (!empty($exist)) {
				$response[] = array('status'=>0,'msg'=>'error: you already like this video.');
				echo json_encode ($response);exit;
			}
			
			$data['VideoDislike']['user_id']	=	$_REQUEST['user_id'];
			$data['VideoDislike']['all_video_id']	=	$_REQUEST['video_id'];
			$data['VideoDislike']['date']			=	date("Y-m-d H:i:s");
			
			if ($this->VideoDislike->save ($data))  {
				$id		=	$this->VideoDislike->getLastInsertId();
				$videos	=	$this->AllVideo->find('first',array('conditions'=>array('AllVideo.id'=>$video_id),'contain'=>array()));
				$update['AllVideo']['id']	=	$video_id;
				$update['AllVideo']['total_dislikes']	=	$videos['AllVideo']['total_dislikes'] + 1;
				if ($this->AllVideo->save ($update))  {
					$response[] = array('status'=>0,'msg'=>'success.');
					echo json_encode ($response);exit;
				}
			}  else  {
				$response[] = array('status'=>0,'msg'=>'error.');
				echo json_encode ($response);exit;
			}			
		}
		
		//http://dev414.trigma.us/E-Mac/Webservices/favorite_video?user_id=2285&video_id=1
		public function favorite_video ()
		{
			if ($_REQUEST['user_id'] == '' or $_REQUEST['video_id'] == '')  {
				$response[] = array('status'=>0,'msg'=>'error:wrong parameters.');
				echo json_encode ($response);exit;
			} else {
				$user_id	=	$_REQUEST['user_id'];
				$video_id	=	$_REQUEST['video_id'];
			}
			
			$exist	=	$this->FavoriteVideo->find('first',array('conditions'=>array('AND'=>array('FavoriteVideo.user_id'=>$user_id,'FavoriteVideo.all_video_id'=>$video_id)),'contain'=>array()));
			if (!empty($exist)) {
				$response[] = array('status'=>0,'msg'=>'error: you already like this video.');
				echo json_encode ($response);exit;
			}
			
			$data['FavoriteVideo']['user_id']	=	$_REQUEST['user_id'];
			$data['FavoriteVideo']['all_video_id']	=	$_REQUEST['video_id'];
			$data['FavoriteVideo']['date']			=	date("Y-m-d H:i:s");
			
			if ($this->FavoriteVideo->save ($data))  {
				$response[] = array('status'=>0,'msg'=>'success.');
				echo json_encode ($response);exit;
			}  else  {
				$response[] = array('status'=>0,'msg'=>'error.');
				echo json_encode ($response);exit;
			}			
		}
		
		
		//http://dev414.trigma.us/E-Mac/Webservices/comment_video?user_id=2285&video_id=1&comment=hello
		public function comment_video ()
		{
			if ($_REQUEST['user_id'] == '' or $_REQUEST['video_id'] == '')  {
				$response[] = array('status'=>0,'msg'=>'error:wrong parameters.');
				echo json_encode ($response);exit;
			} else {
				$user_id	=	$_REQUEST['user_id'];
				$user_id	=	$_REQUEST['user_id'];
				$video_id	=	$_REQUEST['video_id'];
			}
			
			$data['VideoComment']['user_id']		=	$_REQUEST['user_id'];
			$data['VideoComment']['all_video_id']	=	$_REQUEST['video_id'];
			$data['VideoComment']['comment']	=	$_REQUEST['comment'];
			$data['VideoComment']['date']			=	date("Y-m-d H:i:s");
			
			if ($this->VideoComment->save ($data))  {
				$id		=	$this->VideoComment->getLastInsertId();
				$videos	=	$this->AllVideo->find('first',array('conditions'=>array('AllVideo.id'=>$video_id),'contain'=>array()));
				$update['AllVideo']['id']	=	$video_id;
				$update['AllVideo']['total_comments']	=	$videos['AllVideo']['total_comments'] + 1;
				if ($this->AllVideo->save ($update))  {
					$response[] = array('status'=>0,'msg'=>'success.');
					echo json_encode ($response);exit;
				}
			}  else  {
				$response[] = array('status'=>0,'msg'=>'error.');
				echo json_encode ($response);exit;
			}			
		}
		
		
		//http://dev414.trigma.us/E-Mac/Webservices/views_video?user_id=2285&video_id=1
		public function views_video ()
		{
			if ($_REQUEST['user_id'] == '' or $_REQUEST['video_id'] == '')  {
				$response[] = array('status'=>0,'msg'=>'error:wrong parameters.');
				echo json_encode ($response);exit;
			} else {
				$user_id	=	$_REQUEST['user_id'];
				$video_id	=	$_REQUEST['video_id'];
			}
			
			$data['VideoView']['user_id']	=	$_REQUEST['user_id'];
			$data['VideoView']['all_video_id']	=	$_REQUEST['video_id'];
			$data['VideoView']['date']			=	date("Y-m-d H:i:s");
			
			if ($this->VideoView->save ($data))  {
				$id		=	$this->VideoView->getLastInsertId();
				$videos	=	$this->AllVideo->find('first',array('conditions'=>array('AllVideo.id'=>$video_id),'contain'=>array()));
				$update['AllVideo']['id']	=	$video_id;
				$update['AllVideo']['total_views']	=	$videos['AllVideo']['total_views'] + 1;
				if ($this->AllVideo->save ($update))  {
					$response[] = array('status'=>0,'msg'=>'success.');
					echo json_encode ($response);exit;
				}
			}  else  {
				$response[] = array('status'=>0,'msg'=>'error.');
				echo json_encode ($response);exit;
			}			
		}
		
		//http://dev414.trigma.us/E-Mac/Webservices/user_favorite_video?user_id=2285
		public function user_favorite_video ()
		{
			if ($_REQUEST['user_id'] == '')  {
				$response[] = array('status'=>0,'msg'=>'error:wrong parameters.');
				echo json_encode ($response);exit;
			} else {
				$user_id	=	$_REQUEST['user_id'];
			}
			
			$info	=	$this->FavoriteVideo->find('all',array('conditions'=>array('FavoriteVideo.user_id'=>$user_id)));
			if (empty($info)) {
				$response[] = array('status'=>0,'msg'=>'no data found.');
				echo json_encode ($response);exit;
			}
			//pr ($value);die;
			foreach ($info as $value)  {
			$response[]	=	array(
				'status'			=> 1,
				'id'				=> $value['FavoriteVideo']['id'],
				'user_id'		=> $value['FavoriteVideo']['user_id'],										
				'category_id'	=> $value['FavoriteVideo']['all_video_id'],										
				'video_name'	=> $value['AllVideo']['title'],										
				'full_video'		=> FULL_BASE_URL.$this->webroot.'files' . DS . 'full_videos'. DS .$value['AllVideo']['full_video'],										
				'small_video'	=> FULL_BASE_URL.$this->webroot.'files' . DS . 'full_videos'. DS .$value['AllVideo']['small_video'],										
				'thumbnail_images'	=> FULL_BASE_URL.$this->webroot.'files' . DS . 'thumbnail_images'. DS .$value['AllVideo']['thumbnail_images'],										
				'title'				=> $value['AllVideo']['title'],										
				'description'	=> $value['AllVideo']['description'],										
				'total_likes'		=> $value['AllVideo']['total_likes'],										
				'total_dislikes'		=> $value['AllVideo']['total_dislikes'],										
				'total_comments' =>$value['AllVideo']['total_comments'],										
				'total_views'	=>$value['AllVideo']['total_views'],										
				'date' 			=> $value['AllVideo']['date'], 										
				'username'	=> $value['User']['username'], 										
			);	
			}
			//pr ($response);
			echo json_encode($response);exit;		
		}
		
		//http://dev414.trigma.us/E-Mac/Webservices/video_details?video_id=3
		public function video_details ()
		{
			if ($_REQUEST['video_id'] == '')  {
				$response[] = array('status'=>0,'msg'=>'Wrong Parametes .');
				echo json_encode ($response);exit;
			}
			$value 	= 	$this->AllVideo->find ('first',array('conditons'=>array('AllVideo.id'=>$_REQUEST['video_id']),'contain'=>array('Category.name','User.username')));
			if (empty($value)) {
				$response[] = array('status'=>0,'msg'=>'no video found.');
				echo json_encode ($response);exit;
			}	
			$response[]	=	array(
				'status'			=> 1,
				'id'				=> $value['AllVideo']['id'],
				'user_id'		=> $value['AllVideo']['user_id'],										
				'category_id'	=> $value['AllVideo']['category_id'],										
				'category_name'	=> $value['Category']['name'],										
				'full_video'		=> $value['AllVideo']['full_video'],										
				'small_video'	=> $value['AllVideo']['small_video'],										
				'title'				=> $value['AllVideo']['title'],										
				'description'	=> $value['AllVideo']['description'],										
				'total_likes'		=> $value['AllVideo']['total_likes'],										
				'total_dislikes'		=> $value['AllVideo']['total_dislikes'],										
				'total_comments' =>$value['AllVideo']['total_comments'],										
				'total_views'	=>$value['AllVideo']['total_views'],										
				'date' 			=> $value['AllVideo']['date'], 										
				'username'	=> $value['User']['username'], 										
				'cat_name'		=> $value['Category']['name'], 										
			);	
			//pr ($response);
			echo json_encode($response);exit;					
		}
		
		//http://dev414.trigma.us/E-Mac/Webservices/video_comments?video_id=1
		public function video_comments ()
		{
			$this->VideoComment->contain(array('User','AllVideo'=>array('User.id','User.username','User.email','User.followers','User.followings','User.register_date','User.profile_image','User.contact')));
			$data 	= 	$this->VideoComment->find ('all');
			//pr ($data);die; 
			if (empty($data)) {
				$response[] = array('status'=>0,'msg'=>'no video found.');
				echo json_encode ($response);exit;
			}	
			foreach($data as $key=>$value) {
				$response[]	=	array(
					'status'			=> 1,
					'id'				=> $value['VideoComment']['id'],
					'user_id'		=> $value['VideoComment']['user_id'],										
					'video_id'		=> $value['VideoComment']['all_video_id'],										
					'comment'		=> $value['VideoComment']['comment'],										
					'date'				=> $value['VideoComment']['date'],										
					'username'	=> $value['User']['username'],										
					'title'				=> $value['AllVideo']['title'],										
					'description'	=> $value['AllVideo']['description'],										
					'total_likes'		=> $value['AllVideo']['total_likes'],										
					'total_dislikes'		=> $value['AllVideo']['total_dislikes'],										
					'total_comments' =>$value['AllVideo']['total_comments'],										
					'total_views'	=>$value['AllVideo']['total_views'],										
					'date' 			=> $value['AllVideo']['date'], 										
					'username'	=> $value['User']['username'], 										
				);
			}
			//pr ($response);die;
			echo json_encode($response);exit;					
		}
		
		//http://dev414.trigma.us/E-Mac/Webservices/user_follower?user_id=1
		public function user_follower ()
		{
			$data 	= 	$this->User->find ('first',array('conditions'=>array('User.id'=>$_REQUEST['user_id']),'contain'=>array('Following'=>array('User'),'Follower'=>array('User','Follower1'))));
			//pr ($data);die; 
			if (empty($data)) {
				$response[] = array('status'=>0,'msg'=>'no video found.');
				echo json_encode ($response);exit;
			}	
			$id 				= $data['User']['id'];
			$username	= $data['User']['username'];		
			foreach($data['Follower'] as $key=>$value) {
				//pr ($value);die;
				$response[]		=	array(
					'status'			=> 1,
					'id'				=> $id,
					'username'	=> $username,										
					'follower_id'	=> $value['Follower1']['id'],										
					'follower_username'	=> $value['Follower1']['username'],										
					'followers_email'		=> $value['Follower1']['email'],										
					'followers_followers'	=> $value['Follower1']['followers'],										
					'followers_followings'	=> $value['Follower1']['followings'],										
					'followers_videos'		=> $value['Follower1']['videos'],										
					'followers_profile_image'	=> FULL_BASE_URL.$this->webroot.'files' . DS . 'profileimage'. DS .$value['Follower1']['profile_image'],								
				);
			}
			//pr ($response);die;
			echo json_encode($response);exit;					
		}
		
		//http://dev414.trigma.us/E-Mac/Webservices/user_following?user_id=1
		public function user_following ()
		{
			$data 	= 	$this->User->find ('first',array('conditions'=>array('User.id'=>$_REQUEST['user_id']),'contain'=>array('Following'=>array('User'))));
			//pr ($data);die; 
			if (empty($data)) {
				$response[] = array('status'=>0,'msg'=>'no video found.');
				echo json_encode ($response);exit;
			}	
			$id 				= $data['User']['id'];
			$username	= $data['User']['username'];		
			foreach($data['Following'] as $key=>$value) {
				//pr ($value);die;
				$response[]		=	array(
					'status'			=> 1,
					'id'				=> $id,
					'username'	=> $username,										
					'follower_id'	=> $value['User']['id'],										
					'follower_username'	=> $value['User']['username'],										
					'followers_email'		=> $value['User']['email'],										
					'followers_followers'	=> $value['User']['followers'],										
					'followers_followings'	=> $value['User']['followings'],										
					'followers_videos'		=> $value['User']['videos'],										
					'followers_profile_image'	=> FULL_BASE_URL.$this->webroot.'files' . DS . 'profileimage'. DS .$value['User']['profile_image'],								
				);
			}
			//pr ($response);die;
			echo json_encode($response);exit;					
		}
		
		//http://dev414.trigma.us/E-Mac/Webservices/testing?user_id=2260
		public function testing() 
		{
			Configure::write('debug',2);
			App::import('Vendor', 'factual-php-driver-master',array('file'=>'factual-php-driver-master/Factual.php'));
			
			$tableName = "products-cpg";
			
			$factual_api_key     = "ivg1N0ckRGOCBEh0WuZihMDY9T7DYzZmVXifYu5o";
            $factual_api_sec     = "tE9hakw2MiU643lfDYcustbrdJ5p8g9da4vi5oB1";
            $mapbox_access_token = "YOUR_MAPBOX_ACCESS_TOKEN";
            $mapbox_map_id       = "YOUR_MAP_ID";            
			/** instantiate Factual driver **/
            $factual = new Factual($factual_api_key, $factual_api_sec);
            //Search for products containing the word "shampoo"
			
			$query = new FactualQuery;
			//$query->search("shampoo");
			$query->field("upc")->equal("080878053605"); 
			$res = $factual->fetch($tableName, $query); 
			echo "<pre>";print_r($res->getData());			
			die;
		}	
		
		//http://dev414.trigma.us/E-Mac/Webservices/get_product_by_bar_code?barcode=080878053605
		public function get_product_by_bar_code () 
		{
			$barcode = $_REQUEST['barcode'];
			if ($_REQUEST['barcode']  == '')  {
				$response[] = array('status'=>0,'msg'=>'Wrong parameters.');
				echo json_encode ($response);exit;
			}
			Configure::write('debug',2);
			App::import('Vendor', 'factual-php-driver-master',array('file'=>'factual-php-driver-master/Factual.php'));
			
			$tableName = "products-cpg";
			
			$factual_api_key     = "ivg1N0ckRGOCBEh0WuZihMDY9T7DYzZmVXifYu5o";
            $factual_api_sec     = "tE9hakw2MiU643lfDYcustbrdJ5p8g9da4vi5oB1";
            $mapbox_access_token = "YOUR_MAPBOX_ACCESS_TOKEN";
            $mapbox_map_id       = "YOUR_MAP_ID";            
			/** instantiate Factual driver **/
            $factual = new Factual($factual_api_key, $factual_api_sec);
            //Search for products containing the word "shampoo"
			
			$query = new FactualQuery;
			//$query->search("shampoo");
			$query->field("upc")->equal($barcode); 
			$res = $factual->fetch($tableName, $query); 
			echo "<pre>";print_r($res->getData());			
			die;
		}	
		
		//http://dev414.trigma.us/E-Mac/Webservices/get_products_by_ingredients?ingredients=Pork
		public function get_products_by_ingredients () 
		{
			$ingredients = $_REQUEST['ingredients'];
			Configure::write('debug',2);
			App::import('Vendor', 'factual-php-driver-master',array('file'=>'factual-php-driver-master/Factual.php'));
			
			$tableName = "products-cpg-nutrition";  //https://www.factual.com/data/t/products-cpg-nutrition/schema
			
			$factual_api_key     = "ivg1N0ckRGOCBEh0WuZihMDY9T7DYzZmVXifYu5o";
            $factual_api_sec     = "tE9hakw2MiU643lfDYcustbrdJ5p8g9da4vi5oB1";
            $mapbox_access_token = "YOUR_MAPBOX_ACCESS_TOKEN";
            $mapbox_map_id       = "YOUR_MAP_ID";            
			/** instantiate Factual driver **/
            $factual = new Factual($factual_api_key, $factual_api_sec);
            //Search for products containing the word "shampoo"
			
			$query = new FactualQuery;
			//$query->search("shampoo");
			//$query->limit('all');
			$query->offset('40'); //https://www.factual.com/data/t/healthcare-providers-us#offset=40
			$query->field("ingredients")->equal($ingredients); 
			$res = $factual->fetch($tableName, $query); 
			echo "<pre>";print_r($res->getData());			
			die;
		}	
		
		//http://dev414.trigma.us/E-Mac/Webservices/get_products_by_ingredients_and_category
		public function get_products_by_ingredients_and_category () 
		{
			Configure::write('debug',2);
			App::import('Vendor', 'factual-php-driver-master',array('file'=>'factual-php-driver-master/Factual.php'));
			
			$tableName = "products-cpg-nutrition";  //https://www.factual.com/data/t/products-cpg-nutrition/schema
			
			$factual_api_key     = "ivg1N0ckRGOCBEh0WuZihMDY9T7DYzZmVXifYu5o";
            $factual_api_sec     = "tE9hakw2MiU643lfDYcustbrdJ5p8g9da4vi5oB1";
            $mapbox_access_token = "YOUR_MAPBOX_ACCESS_TOKEN";
            $mapbox_map_id       = "YOUR_MAP_ID";            
			/** instantiate Factual driver **/
            $factual = new Factual($factual_api_key, $factual_api_sec);
            //Search for products containing the word "shampoo"
			
			$query = new FactualQuery;
			//$query->search("shampoo");
			//$query->limit('all');
			$query->offset('20'); //https://www.factual.com/data/t/healthcare-providers-us#offset=40
			$query->field("ingredients")->equal("Cocamide Dea"); 
			$query->field("category")->equal("Hair Shampoo"); 
			$res = $factual->fetch($tableName, $query); 
			echo "<pre>";print_r($res->getData());			
			die;
		}	
		
		
		
	}