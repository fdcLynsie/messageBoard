<?php
App::uses('AppModel', 'Model');

class User extends AppModel {

	public $name = 'User';
	public $displayField = 'name';

	public $validate = array(
		'name' => array(			
			'lengthBetween' => array(
				'rule' => array('lengthBetween',5,20),
				'message' => 'Please enter 5-20 characters.',				
			),
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Name is required.',
			),
		),
		'email' => array(			
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Email is required.'
			),
			'required' => array(
				'rule' => array('email'),
				'message' => 'Please enter a valid Email.'
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'Provided Email already exists.'
			)
		),
		'gender' => array(		
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please select a gender.',
			),
		),
		'birthdate' => array(		
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a birthdate.',
			),
		),
		'hubby' => array(		
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please enter a hobby.',
			),
		),
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Password is required.',
			),
			'Match Passwords' => array(
				'rule' => 'matchPasswords',
				'message' => 'Passwords do not match.',
			)
		),
		'confirm_password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Please confirm your password.',
			),
		),
	);

	public function matchPasswords($data){
		if($data['password'] == $this->data['User']['confirm_password']){
			return true;
		}

		$this->invalidate('confirm_password','Passwords do not match.');
		return false;
	}

	//this is called right before a new user will be saveed into the db
	public function beforeSave($data= Array()){
		if(isset($this->data['User']['password'])){
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		return true;
	}
}
