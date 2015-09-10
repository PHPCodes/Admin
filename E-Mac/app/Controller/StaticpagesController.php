<?php
App::uses('AppController', 'Controller');
/**
 * Staticpages Controller
 *
 * @property Staticpage $Staticpage
 */
class StaticpagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('about_us','page','why_join'));
    }
    
    
    
	public function index() {
		$this->Staticpage->recursive = 0;
		$this->set('staticpages', $this->paginate());
	}
        
        public function about_us() {		
		$this->set('about', $x = $this->Staticpage->find('first',array('conditions'=>array('Staticpage.title'=>'About'))));
                //debug($x);
	}
        
        public function page($page = null) {		
		$this->set('terms', $x = $this->Staticpage->find('first',array('conditions'=>array('Staticpage.title'=>$page))));
                //debug($x);
	}
        
        public function why_join() {		
		
	}
        
       


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Staticpage->id = $id;
		if (!$this->Staticpage->exists()) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		$this->set('staticpage', $this->Staticpage->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Staticpage->create();
			if ($this->Staticpage->save($this->request->data)) {
				$this->Session->setFlash(__('The staticpage has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staticpage could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Staticpage->id = $id;
		if (!$this->Staticpage->exists()) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Staticpage->save($this->request->data)) {
				$this->Session->setFlash(__('The staticpage has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staticpage could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Staticpage->read(null, $id);
		}
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
		$this->Staticpage->id = $id;
		if (!$this->Staticpage->exists()) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		if ($this->Staticpage->delete()) {
			$this->Session->setFlash(__('Staticpage deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Staticpage was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Staticpage->recursive = 0;
		$this->set('staticpages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Staticpage->id = $id;
		if (!$this->Staticpage->exists()) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		$this->set('staticpage', $this->Staticpage->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Staticpage->create();
			if ($this->Staticpage->save($this->request->data)) {
				$this->Session->setFlash(__('The staticpage has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staticpage could not be saved. Please, try again.'));
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
		$this->Staticpage->id = $id;
		if (!$this->Staticpage->exists()) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Staticpage->save($this->request->data)) {
				$this->Session->setFlash(__('The staticpage has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staticpage could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Staticpage->read(null, $id);
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
		$this->Staticpage->id = $id;
		if (!$this->Staticpage->exists()) {
			throw new NotFoundException(__('Invalid staticpage'));
		}
		if ($this->Staticpage->delete()) {
			$this->Session->setFlash(__('Staticpage deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Staticpage was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	
	
	public function admin_activate($id = null)
    {
        $this->Staticpage->id = $id;
        if ($this->Staticpage->exists()) {
            $x = $this->Staticpage->save(array(
                'Staticpage' => array(
                    'status' => 'Active'
                )
            ));
            $this->Session->setFlash("Staticpage activated successfully.");
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            $this->Session->setFlash("Unable to activate Staticpage.");
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        
    }
    
    
    public function admin_block($id = null)
    {
        $this->Staticpage->id = $id;
        if ($this->Staticpage->exists()) {
            $x = $this->Staticpage->save(array(
                'Staticpage' => array(
                    'status' => 'Deactive'
                )
            ));
            $this->Session->setFlash("Staticpage blocked successfully.");
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            $this->Session->setFlash("Unable to block Staticpage.");
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        
    }
}
