<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $name = 'Users';
	public $user = array('User','Message');
	public $components = array('Paginator','Session','Flash','RequestHandler');

	//allow method 
	public function beforeFilter(){
		parent::beforeFilter();
		// $this->Auth->allow('add', 'login', 'logout', 'thankYou');
		$this->Auth->allow('add', 'logout');
	}

	// it will only allow to edit/delete the user which is logged in
	// public function isAuthorized($user){
	// 	if (in_array($this->action, array('edit', 'delete'))) {
	// 		$user = $this->Auth->user('id');
	// 		// $users - no id found email and pass only
	// 		if ($user['id'] != $this->request->params['pass'][0]){
	// 			return false;
	// 		}
	// 		return true;
	// 	}
	// }

	public function login(){
		if ($this->request->is('post')){
			//get the loggedin user
			$loggedinUser = $this->User->find('first', array(				
				'conditions' => array(
					'user.email' => $this->request->data['User']['email'],
					'AND'=> array(
						'user.password'=>AuthComponent::password($this->data['User']['password'])
					)
				)
			));

			if ($loggedinUser){
				// echo '<prev>';
				// print_r($loggedinUser); die;
				if($this->Auth->login($this->request->data['User'])){
					//update user last_login_time field 
					$this->User->id = $loggedinUser['User']['id'];
					$this->User->set('last_login_time',date("Y-m-d h:i:s"));

					if($this->User->save()){
						// successful
						return $this->redirect('/users/index');	
					}else {
						$this->Flash->error(__('The date could not be saved. Please, try again.'));
					}	
				} else {
					// failed to log in
					$this->Session->setFlash('Your username/password combination was incorrect');
				}
			} else {
				//failed
				$this->Flash->error(__('Your username/password combination was incorrect'));
			}
		}
		
	}

	public function logout(){
		//get loggedin user	
		$loggedinUser=$this->User->find('first',array(				
			'conditions' => array('user.email' => $this->Auth->user('email'))
		));
		// echo '<prev>';
		// print_r($loggedinUser); die;

		//check if user found
		if($loggedinUser) {
			$this->Auth->logout();
			return $this->redirect('/users/login');		
		} else {
			$this->Flash->error(__('No users found.'));
		}
	}

	
	public function index() {
		$this->User->recursive = 0;	
		//get loggedinUser 		
		$loggedinUser=$this->User->find('first',array(				
			'conditions' => array('user.email' =>$this->Auth->user('email'))
		));
		//check if user found
		if($loggedinUser){
			$loggedinUser=$loggedinUser;
		}
		//pass the data to the view
		$this->set(array('loggedinUser'=>$loggedinUser));
	}

	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			//User = model 
			$this->User->create();

			//get and save the ip address
			$this->request->data['User']['created_ip'] = $this->RequestHandler->getClientIp();

			//save data to database then redirect to thank you page
			if ($this->User->save($this->request->data)) {
				//if the user logged in successfull
				$this->Auth->login($this->request->data['User']);	
				$this->Session->setFlash('The user has been created');
				return $this->redirect(array('action' => 'thankYou'));
			} else {
				//failed
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	public function thankYou(){
		// $this->Flash->success(__('Thank you! Successfully Registered.'));
	}


	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		//if user click the
		if ($this->request->is(array('post', 'put'))) {

			$this->User->id= $id;
			//update modified field
			$this->User->set('modified',date("Y-m-d h:i:s"));
			//update modified_ip field
			$this->request->data['User']['modified_ip']= $this->RequestHandler->getClientIp();
			$img = $this->request->data['User']['image']; //put the data into a var for easy use

			if($img['name']!=''){
				if (!file_exists($img)) {
					//get the extension
					$ext = substr(strtolower(strrchr($img['name'], '.')), 1); 
					//set allowed extensions
					$arr_ext = array('jpg', 'jpeg', 'gif'); 

					//only process if the extension is valid
					if(in_array($ext, $arr_ext))
					{
						//do the actual uploading of the file. First arg is the tmp name, second arg is where we are putting it
						move_uploaded_file($img['tmp_name'],WWW_ROOT.'img/'. $img['name']);	
						//prepare the filename for database entry
						$this->request->data['User']['image'] = $img['name'];
					}
				}else{
					$this->Flash->error(__('This image already exists.'));
				}
			}else{
				$loggedinUser=$this->User->find('first',array(				
					'conditions' => array('user.id' =>$id)
				));
				$this->request->data['User']['image'] = $loggedinUser['User']['image'];
			}

			//save the data
			if ($this->User->save($this->request->data)) {
				// echo '<prev>';
				// print_r($this->request->data); die;
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}

		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}


	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
