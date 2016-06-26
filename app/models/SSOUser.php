<?php 
require_once '../app/models/User.php';

class SSOUser extends User 
{
	public function validateUser()
	{
		// In this case, the full logic would likely include calling a service using SAML to validate the user. 
		// For purposes of this assignment I am going to assume the SSO is successful and just return the same
		// user information as a successful authentication of a non SSO login form.
		$this->username = 'robert_brown';
		$this->firstname = 'Robert';
		$this->lastname = 'Brown';
		$this->userId = 'rb1234567890';
		return 'success';
	}
}