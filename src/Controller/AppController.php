<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		$this->loadComponent('ERPfunction');
		$this->loadComponent('Usermanage');	

        $this->loadComponent('Auth',[
            'loginRedirect'=>['controller' => 'Dashboard','action'=>'index'
        ],
            'logoutRedirect'=>['controller'=>'Users',"action"=>"login"
        ],
           'authorize' => array('Controller')  
        ]);
		
		// $user_id=$this->request->getSession()->read('user_id');
		// $action_a= $this->request->action;
		// if(!$user_id && $action_a != "printporecord" && $action_a != "printporecordnorate" && $action_a != "mailsalaryslip" && $action_a != "printporecord2" && $action_a != "mailporecord2" && $action_a != "printporecordnorate2" && $action_a != "printworecord" && $action_a != "mailplanningworecord" && $action_a != "printmanualporecord" && $action_a != "printmanualporecordnorate" && $action_a != "printwo" && $action_a != "printassetporecordnorate" && $action_a != "printassetporecord" && $action_a != "printloi" && $action_a != "printloinorate")
		// {
		// 	//var_dump($this->request);
		// 	if($this->name != 'Login')
		// 		$this->redirect(array("controller" => "Login","action" => "index"));	
		// }
		 $user_id=$this->request->getSession()->read('user_id');
		 
		 if(isset($user_id)){
			 date_default_timezone_set("Asia/Kolkata");
			
			$username=$this->request->getSession()->read('Auth.User.username');
			
			$action_a= $this->request->action;
			
			$erp_activitylog = TableRegistry::get('erp_activitylog'); 
			// Store the IP address
			$vister_ip = $this->ERPfunction->getVisIPAddr();
			
			$erp_activitylog_data = $erp_activitylog->newEntity();
			$erp_activitylog_data['username']=$username;
			$erp_activitylog_data['ip_address']=$vister_ip;
			$erp_activitylog_data['activityname']=$action_a;
			$erp_activitylog_data['created_date']= date('Y-m-d H:i:s');
			$erp_activitylog->save($erp_activitylog_data);
		 }
    }

    public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['resetPassword']);
	}
    
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
