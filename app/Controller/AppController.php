<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
//Flash = is for redirect
class AppController extends Controller {
    public $helpers = array('Js');

    public $components = array(
        'DebugKit.Toolbar', 
        'Session', 
        'RequestHandler',
        'Flash',
        'Auth' => array(
			// user will redirect to index page
			'loginRedirect' => array('controller' => 'users', 'action' => 'index'),

			// user will redirect to logout page 
			'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),

			// user will redirect here if the page accessed is forbidden
			'loginAction' => array('controller' => 'users', 'action' => 'login'),

			// if a user tries to login a page that is not authorized to access
			'authError' => 'your account is not valid',

            // where our app authorization is going to occur and we used callback method
            'authorize' => array('Controller')
		)
    ); 

    //callback function for authorize this will return true or false if the logged in user has permission to access the page
    public function isAuthorized($user){
        // specific user to the Usercontroller(isAuthorized($user)) for edit and delete
        return true;
    }

    // pages can be access by non-logged in users
    public function beforeFilter(){
		$this->Auth->allow('index', 'view');
		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->user());
	}
}
