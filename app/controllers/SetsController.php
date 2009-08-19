<?php
	class SetsController extends Zend_Controller_Action
	{
		public function indexAction()
		{
				header("Location: /");
		}
		
		public function downloadAction()
		{
			
			if ($this->_request->getParam('donated')) {
				$this->view->alert = "Thank You For Donating";
			}
				
			$this->_helper->layout->setLayout('splittest');
		}
		
	}
	
?>