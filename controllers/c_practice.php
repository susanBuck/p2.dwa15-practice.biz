<?php
class practice_controller extends base_controller {
	
	public function test1() {
		
		require(APP_PATH.'libraries/Image.php');
		
		$imageObj = new Image('http://placekitten.com/1000/1000');
		
		$imageObj->resize(200,200);
		
		//$imageObj->display();
	
	}
	
	public function test_email() {
		
		echo Utils::alert_admin('Testing email from live server', '');
		
	}
	
	public function test2() {
		
		
		# Static
		echo Time::now();
		
	}
	
	public function test3() {
		
		# Setup view
			$this->template->content = View::instance('v_index_index');
			
	
		# Render template
			echo $this->template->render();
		
		
	}
	
	public function say_message($message = String) {
		
		if($message != NULL) {
			echo $message;
		}
		
	}
	
	
	
	
}