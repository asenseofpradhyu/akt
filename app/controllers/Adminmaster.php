<?php
class Adminmaster extends Controller
{
	public function __construct()
	{



		$this->adminMasterModel = $this->model('AdminmasterModel');
	}

	public function index()
	{
		if (isLoggedInAdmin()) {
			redirect('adminmaster/admindashboard');
		}

		// Init data
		$data = [
			'username' => '',
			'password' => '',
			'username_err' => '',
			'password_err' => '',
		];

		// $this->view('inc/navbar', $data);
		$this->view('adminmaster/adminlogin', $data);
	}



	public function adminlogin()
	{

		// Check for POST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Process form
			// Sanitize POST data
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			// Init data
			$data = [
				'username' => trim($_POST['username']),
				'password' => trim($_POST['password']),
				'username_err' => '',
				'password_err' => '',
			];

			// Validate username
			if (empty($data['username'])) {
				$data['username_err'] = 'Please enter Username';
			}

			// Validate Password
			if (empty($data['password'])) {
				$data['password_err'] = 'Please enter password';
			}

			// Check for user/username
			if ($this->adminMasterModel->findUserByUsername($data['username'])) {
				// User found
			} else {
				// User not found
				$data['username_err'] = 'No user found';
			}

			// Make sure errors are empty
			if (empty($data['username_err']) && empty($data['password_err'])) {
				// Validated
				// Check and set logged in user
				$loggedInUser = $this->adminMasterModel->login($data['username'], $data['password']);

				if ($loggedInUser) {
					// Create Admin Session
					$this->createUserAdminSession($loggedInUser);
					redirect('adminmaster/admindashboard');
				} else {
					$data['password_err'] = 'Password incorrect';

					$this->view('adminmaster/adminlogin', $data);
				}
			} else {
				// Load view with errors
				$this->view('adminmaster/adminlogin', $data);
			}
		} else {
			// Init data
			$data = [
				'username' => '',
				'password' => '',
				'username_err' => '',
				'password_err' => '',
			];

			// Load view
			$this->view('adminmaster/adminlogin', $data);
		}
	}

	public function admindashboard()
	{
		if (!isLoggedInAdmin()) {
			redirect('adminmaster/adminlogin');
		} else {
			$this->view('adminmaster/admindashboard');
		}
		// $this->view('adminmaster/admindashboard');
	}


	public function createUserAdminSession($user)
	{
		$_SESSION['admin_account_id'] = $user->admin_account_id;
		$_SESSION['admin_username'] = $user->admin_username;
		$_SESSION['admin_token'] = $user->admin_token;
		// redirect('adminmaster/admindashboard');
	}

	public function logoutAdmin()
	{
		unset($_SESSION['admin_account_id']);
		unset($_SESSION['admin_username']);
		unset($_SESSION['admin_token']);
		session_destroy();
		redirect('adminmaster/adminlogin');
	}
}
