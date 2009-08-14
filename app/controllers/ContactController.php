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
			$valid_email = new Zend_Validate_EmailAddress();
			if ($valid_email->isValid($posts['Email'])) {
				
			} else {
				foreach ($valid_email->getMessages() as $message) {
					$error[] = "Email $message\n";
				}
			}
			
			foreach ($posts as $key => $post) {
				if ($validatorChain->isValid($post)) {
				
				} else {
					foreach ($validatorChain->getMessages() as $message) {
						$error[] = "$key $message\n";
					}
				}
			}
			
			if (count($error) != 0) {
				$this->view->alerts = $error;
			} else {
				$to      = 'illustratedpdx@gmail.com';
				$subject = 'Email from Illustrated Portland';
				$message = $posts['Message'];
				$headers = "From: {$posts['First Name']} {$posts['Last Name']} <{$posts['Email']}>";
				mail( $to, $subject, $message, $headers );
				
				//$this->view->alerts = array("Thank You! Your message has been sent.");
			}
			
			
		}
		
	}
	
?>