<?php
	App::uses('CakeSession', 'Model/Datasource');
	App::uses('BaseAuthenticate', 'Controller/Component/Auth');
	App::uses('CakeEmail', 'Network/Email');
	
	class FacebookAuthenticate extends BaseAuthenticate {

		var $settings = array(
		   "app_id" => "479754455411339",
		   "app_secret" => "d2896f0c91db6dd6f1348b72f818a24a",
		   "url" => "http://linked.apnaphp.com/Loginwith/login"
		); 
		
        public function authenticate(CakeRequest $request, CakeResponse $response) {
           $session = new CakeSession();
            if (isset($request->query) && isset($request->query['code']) && isset($request->query['state'])) {			
                if($request->query['state'] == $session->read('state')) {
                    $token_url = "https://graph.facebook.com/oauth/access_token?"
                        . "client_id=" . $this->settings["app_id"]
                        . "&redirect_uri=" . urlencode($this->settings["url"])
                           . "&client_secret=" . $this->settings["app_secret"]
                           . "&code=" . $request->query['code'];
                           
                    $response = file_get_contents($token_url);
                    $params = null;
                    parse_str($response, $params);
                    if (isset($params['access_token'])) {
                        $graph_url = "https://graph.facebook.com/me?access_token=".$params['access_token'];
                         $fb_user = json_decode(file_get_contents($graph_url));
                         
                         App::uses('User', 'Model');
                        $User = new User();
                        $user = $User->find("first",array("conditions" => array("username" => "facebook-".$fb_user->username)));
                        
                        if (!$user) {
                            $user = array(
                                "User" => array(                                    
                                                                        "username" => "facebook-".$fb_user->username,
									"password" => $fb_user->id,
									"usertype_id" => "3",
									"first_name" => $fb_user->first_name,
									"last_name" => $fb_user->last_name,
									"email" => $fb_user->email,
									"register_date" => date("Y-m-d"),
									//"user_ip" => get_ip_address(),
									//"city" => $fb_user->location->name != "" ? $fb_user->location->name : "NA",
									"home_town" => $fb_user->hometown->name != "" ? $fb_user->location->name : "NA",
                                	"status" => "Active"
									
                                )
                            );
                            $User->create();
                            $User->save($user);
                            //debug($User->validationErrors);
                            //exit;
                            $content = "<hr />\nDear, user you are successfuly registered.<br /> <br /><b>Email ID: </b>".$fb_user->email." <br /><b>Username: </b> "."facebook-".$fb_user->username."<br /><b>Note: </b> You have been Successfuly Authenticate to our App via Facebook.<br>Next time click Login with Facebook to access your accout on doorstep.";
                            $l = new CakeEmail();
                            $l->template('signup', 'fancy')
                            ->emailFormat('html')
                            ->subject("Registration Successful..")
                            ->to($fb_user->email)
                            ->from("no-reply@academatch.com")
                            ->send($content);
                            $user = $User->find("first",array("conditions" => array("User.username" => "facebook-".$fb_user->username)));
                        }
                        return $user["User"];
                    }
                }
            }    
            return false;        
        }    
    	
	}
?>