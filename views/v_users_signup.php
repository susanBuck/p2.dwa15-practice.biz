<h2>Sign Up</h2>

<form method='POST' action='/users/p_signup'>

	<input type='hidden' name='token' value='<?=$token?>'>

	First Name <input type='text' name='first_name'><br>
	Last Name <input type='text' name='last_name'><br>
	Email <input type='text' name='email'><br>
	Password <input type='password' name='password'><br>
	
	<input type='submit' value='Sign Up'>
	

</form>