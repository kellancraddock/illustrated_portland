<?php

	require_once('../app/models/BlogModel.php');
	
	class BlogController extends Zend_Controller_Action
	{
	
		public function init()
		{
			$this->blog_model = new BlogModel();
		}
		
		public function indexAction()
		{
			$this->view->entries = $this->blog_model->getAll();
		}
		
		public function singleAction()
		{
			$arguments = array($this->_request->getParam('id'));
			$this->view->entry = $this->blog_model->getOne($arguments);
		}
		
		
		public function rssAction()
		{
			$this->_helper->layout->setLayout('rss');
			
			//Create an array for our feed

			$feed = array();

			//Setup some info about our feed

			$feed['title']        = "IllustratedPortland.com RSS Feed";

			$feed['link']         = 'http://www.illustratedportland/blog/rss';

			$feed['charset']   = 'utf-8';

			$feed['language'] = 'en-us';

			//$feed['published'] = time();

			$feed['entries']   = array();//Holds the actual items
			
			foreach($this->blog_model->getAll() as $story){

				$entry = array(); //Container for the entry before we add it on
				
				$entry['title'] = $story['title']; //The title that will be displayed for the entry
				
				$entry['link'] = '/blog/single/id/' . $story['id']; //The url of the entry
				
				$entry['url'] = '/blog/single/id/' . $story['id']; //The url of the entry
				
				$entry['description'] = $story['description']; //Short description of the entry
				
				$entry['content'] = $story['content']; //Long description of the entry
				
				$feed['entries'][] = $entry;
				
			}
			
			$feedObj = Zend_Feed::importArray($feed, 'rss');
			
			$this->view->feed = $feedObj->send();

		}
		
	}
	
?>