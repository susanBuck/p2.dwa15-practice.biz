<?php
class practice_controller extends base_controller {
	
	
	/*-------------------------------------------------------------------------------------------------
	Demonstrating Classes/Objects
	-------------------------------------------------------------------------------------------------*/
	public function display_image(){
		
		// Because of autoloading, we don't have to include image
		//require(APP_PATH.'/libraries/Image.php');

		/*
		Instantiate an Image object using the "new" keyword
		Whatever params we use when instantiating are passed to __construct 
		*/
		$imageObj = new Image('http://placekitten.com/1000/1000');

		/*
		Call the resize method on this object using the object operator (single arrow ->) 
		which is used to access methods and properties of an object
		*/
		$imageObj->resize(200,200);

		# Display the resized image
		$imageObj->display();

	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Testing email on live server with not SMTP settings
	-------------------------------------------------------------------------------------------------*/
	public function test_email() {
		echo Utils::alert_admin('Testing email from live server', '');
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Demonstrating two different ways to render a view
	-------------------------------------------------------------------------------------------------*/
	public function test_render() {
		
		# Setup view
			$this->template->content = View::instance('v_index_index');
			
		# Render template
		# Either one of these works
			#echo $this->template;
			echo $this->template->render();
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Demonstrating PHP Warning when a param is not defaulted and not passed
	-------------------------------------------------------------------------------------------------*/
	public function test_not_null_var($message) {
		
		if($message != NULL) {
			echo $message;
		}
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Demonstrating vague MySQL errors on live server
	-------------------------------------------------------------------------------------------------*/
	public function test_db_error() {
		
		$q = "SELECT * FROM posts";
		echo DB::instance(DB_NAME)->select_rows($q);
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Time tests
	-------------------------------------------------------------------------------------------------*/
	public function test_time() {
	
		$full_moon = 1326119760; # Jan 9, 2012 07:30 GMT

		# Shows the time in your app's timezone
		echo "<br>App TZ: ".Time::display($full_moon);
	
		# Hard code in the timezone you want to display
		echo "<br>Los Angeles TZ: ".Time::display($full_moon, '', 'America/Los_Angeles');
		
		# Or, assuming you know your user's timezone, pass it in as a variable
		//echo "<br>User's TZ: ".Time::display($full_moon, '', $this->user->timezone);

		
	}
	
	

} # eoc