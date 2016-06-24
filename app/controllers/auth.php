<?php 

class Auth extends Controller 
{
	public function login($email = '', $password = '') 
	{
		$user = $this->model('User');
		$user->email = $email;
		$user->password = $password;
		$response = [];
		$result = $user->validateUser();
		$response[] = $result;
		if($result == 'success')
		{
			//Store userId in cookie and return firstname and lastname
			setcookie('app_user_id',$user->userId);
			$response[] = $user->firstname;
			$response[] = $user->lastname;
		}
		echo implode(',',$response);
	}
}

?>