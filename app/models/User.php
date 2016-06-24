<?php 

class User 
{
	public $username;
	public $firstname;
	public $lastname;
	public $userId;
	public $email;
	public $password; 
	
	public function validateUser()
	{
		// Normally this would be were the database lookup code would go. For this assignment, I am hardcoding values
		if($this->email === 'test@test.com' && $this->password === 'abc123') 
		{
			$this->username = 'john_smith';
			$this->firstname = 'John';
			$this->lastname = 'Smith';
			$this->userId = 'js987654321';
			return 'success';
		}
		else 
		{
			return 'fail';
		}
	}
}

?>