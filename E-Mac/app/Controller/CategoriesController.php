<?php
class CategoriesController extends AppController 
{    
	public function beforeFilter() 
	{
		parent::beforeFilter();
		$this->Auth->allow(array('categorylist','post_category'));
	}	
	public function index() {
        $data = $this->Category->generateTreeList(null, null, null, '&nbsp;&nbsp;&nbsp;');
        $this->Category->recursive = 0;
        $this->set('categories', $this->paginate());
    }

    public function company_category() 
	{
        $this->set("categories",$this->Category->find("all",array('conditions'=>array("Category.status"=>"1"))));
    }

    public function post_category() 
	{
        $this->set("categories",$this->Category->find("all",array('conditions'=>array("Category.status"=>"1"))));
    }

	public function view($id = null) 
	{
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}
	public function add() 
	{
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		$parentCategories = $this->Category->ParentCategory->find('list');
		$this->set(compact('parentCategories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Category->read(null, $id);
		}
		$parentCategories = $this->Category->ParentCategory->find('list');
		$this->set(compact('parentCategories'));
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('Category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        public function admin_main() {}

/**
 * admin_index method
 *
 * @return void
 */
	 public function admin_index() {
		if($this->request->is('post')){
			$keyword = trim($this->request->data['keyword']);
            $this->set('categories',$this->Category->find('all',array('conditions'=>array("Category.name LIKE"=>"%$keyword%"),'order'=>'Category.id DESC')));
	}else{
		$this->Category->recursive = 0;
		$this->paginate = array('limit' =>10, 'order'=>'Category.id DESC');
		$this->set('categories', $this->paginate());
	}
	 $this->set('cates',$this->Category->find('all'));
	}
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
				$this->request->data['Category']['status'] = 1;	
				$categoryName = $this->request->data['Category']['name'];		
				$categoryExist = $this->Category->find('first',array('conditions'=>array('Category.name'=>$categoryName)));
				if(empty($categoryExist)){
					$this->Category->create();
					if ($this->Category->save($this->request->data)) {				
							$this->Session->setFlash(__('The category has been saved'));
							$this->redirect(array('action' => 'index'));
					} else {
							$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
					}
				}  else {
					$this->Session->setFlash(__('This Category is already exist.plz try another category.'));
				}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function admin_edit($id = null) {
        $this->Category->id = $id;
		$x= $this->Category->find('first',array('conditions'=>array('Category.id'=>$id)));
        if (!$this->Category->exists()) {
                throw new NotFoundException(__('Invalid category'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {           
			if ($this->Category->save($this->request->data)) {		
				$this->Session->setFlash(__('The category has been updated successfully.'));
				$this->redirect(array('action' => 'index'));
			} else {
					$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
        } else {
                $this->request->data = $this->Category->read(null, $id);
        }
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->Category->delete($id,true)) {
			$this->Session->setFlash(__('Category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function admin_activate($id = null)
    {
        $this->Category->id = $id;
        if ($this->Category->exists()) {
            $x = $this->Category->save(array(
                'Category' => array(
                    'status' => '1'
                )
            ));
            $this->Session->setFlash("Category activated successfully.");
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            $this->Session->setFlash("Unable to activate Category.");
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        
    }
    
    
    public function admin_block($id = null)
    {
        $this->Category->id = $id;
        if ($this->Category->exists()) {
            $x = $this->Category->save(array(
                'Category' => array(
                    'status' => '0'
                )
            ));
            $this->Session->setFlash("Category blocked successfully.");
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            $this->Session->setFlash("Unable to block Category.");
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        
    }
	public function admin_deleteall($id = null){
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        foreach ($this->request['data']['Category'] as $k) {
            $this->Category->id = (int) $k;
            if ($this->Category->exists()) {
                $this->Category->delete($k,true);
            }
            
        }
        
        $this->Session->setFlash(__('Selected Category were removed.'));
      //  $this->redirect($this->data['currentloc']);
	  $this->redirect(array(
                'action' => 'index'
            ));
    }
	public function admin_activateall($id = null){
		if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        
        foreach ($this->request['data']['Category'] as $k => $v) {	
		if($k == $v){
			$this->Category->id = $v;
			if ($this->Category->exists()) {
				$x = $this->Category->save(array(
					'Category' => array(
						'status' => "1"
					)
					
				));
	        $this->Session->setFlash(__('Selected Category Activated.', true));					
			} else {
				$this->Session->setFlash("Unable to Activate Category.");
			}
		}
            
        }
		$this->Session->setFlash("Please select atleast one category.");
		$this->redirect($this->data['currentloc']);
    }
		
	public function admin_deactivateall($id = null){
		if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        
        foreach ($this->request['data']['Category'] as $k => $v) {	
		if($k == $v){
			$this->Category->id = $v;
			if ($this->Category->exists()) {
				$x = $this->Category->save(array(
					'Category' => array(
						'status' => "0"
					)
					
				));
	        $this->Session->setFlash(__('Selected Category Deactivated.', true));					
			} else {
				$this->Session->setFlash("Unable to Deactivated Category.");
			}
		}
            
        }
		$this->Session->setFlash("Please select atleast one category.");
		$this->redirect($this->data['currentloc']);
    }
	
	
	
	     public function categorylist() {   
           
                        $resp =  $this->Category->find('all',array("field"=>array("id","name"),'conditions'=>array('Category.status'=>1),'order'=>"Category.name ASC"));         
						$this->loadModel('Image');                
                        foreach ($resp as $re){
								$im = $this->Image->find('first',array('conditions'=>array('Image.status'=>1,'Image.category_id'=>$re['Category']['id']),'order'=>"Image.id DESC")); 
                                                                if(!empty($im['Image']['image'])){
                                                                    $img = FULL_BASE_URL.  $this->webroot.'files/images/'.$im['Image']['image'];
                                                                }
                                                                else{
                                                                    $img=FULL_BASE_URL.  $this->webroot.'files/images/No_Image.png';
                                                                }
								
								$abc[] = array('id'=> $re['Category']['id'],'name'=>$re['Category']['name'],'image'=>$img);
                        }
                        $response = $abc;
                        $this->set('response',$response);
                        $this->render('ajax','ajax');
                   
                  }
					
					
				
			
	
	
	
}
