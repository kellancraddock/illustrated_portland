<?php
	class ContactController extends Zend_Controller_Action
	{
		public function indexAction()
		{
			header("Location: /");		
		}
		
		public function mailAction()
		{
			$error = array();
			$posts = array('First Name' => $_POST['first_name'], 'Last Name' => $_POST['last_name'], 'Email' =>$_POST['email'], 'Message' => $_POST['message']);
			
			$validatorChain = new Zend_Validate();
			$validatorChain->addValidator(new Zend_Validate_NotEmpty());
			foreach ($posts as $key => $post) {
				if ($validatorChain->isValid($post)) {
				
				} else {
					foreach ($validatorChain->getMessages() as $message) {
						$error[] = "$key $message\n";
					}
				}
			}
			
			$this->view->alert = $error;
		}
		
	}
	
?>