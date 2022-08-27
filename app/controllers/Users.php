<?php
// require $_SERVER['DOCUMENT_ROOT'].'/akt_backend/sendmail.php';
class Users extends Controller
{
    public function __construct()
    {


        $this->NavigationModel = $this->model('NavigationModel');
        $this->userModel = $this->model('UsersModel');
    }

    public function register()
    {

        $mainNav = $this->NavigationModel->getMainNav();
        $subNav = $this->NavigationModel->getSubNav();

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'name' => trim($_POST['Customername']),
                'email' => trim($_POST['Customeremail']),
                'password' => trim($_POST['Customerpassword']),
                'phone' => trim($_POST['Customerphone']),
                'confpassword' => trim($_POST['Customerconfpassword']),
                'check' => isset($_POST['Customercheck']) ? '1' : '0',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'phone_err' => '',
                'confpassword_err' => '',
                'check_err' => '',
                'main_menu' => $mainNav,
                'sub_menu' => $subNav,
            ];

            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
                $data['email_err'] = 'Account Already exist, please try to login.';
            }

            // Check for user/phone
            if ($this->userModel->findUserByPhone($data['phone'])) {
                // User found
                $data['phone_err'] = 'Phone Number Already Exist with another account, please use another number.';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])  && empty($data['confpassword_err']) && empty($data['name_err']) && empty($data['phone_err']) && empty($data['check_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->register($data);

                if ($loggedInUser) {
                    $html = $this->emailTemplate('email/registration', ['username' => $data['name']]);
                    $sendmail = new sendmail();
                    $sendmail->mail_params['tousers'][0]['email'] = $_POST['Customeremail'];
                    $sendmail->mail_params['tousers'][0]['name'] = $_POST['Customername'];
                    $sendmail->mail_params['subject'] = 'Welcome TO Aktwear';
                    $sendmail->mail_params['body'] = $html;
                    $mail_sent = $sendmail->sendMail();
                    // Redirect to login
                    $this->view('pages/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('pages/register', $data);
            }
        } else {

            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confpassword' => '',
                'phone' => '',
                'check' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confpassword_err' => '',
                'phone_err' => '',
                'check_err' => '',
                'main_menu' => $mainNav,
                'sub_menu' => $subNav,
            ];

            // Load view
            $this->view('pages/register', $data);
        }
    }



    // Login

    public function login()
    {

        $mainNav = $this->NavigationModel->getMainNav();
        $subNav = $this->NavigationModel->getSubNav();


        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['customeremail']),
                'password' => trim($_POST['customerpassword']),
                'email_err' => '',
                'password_err' => '',
                'title' => 'AKT Fashion Store',
                'description' => 'NEw MVC',
                'main_menu' => $mainNav,
                'sub_menu' => $subNav,
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter valid email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser && $loggedInUser->customer_password == $data['password']) {
                    // Create Session
                    $this->createCustomerSession($loggedInUser);
                    redirect('');
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('pages/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('pages/login', $data);
            }
        } else {

            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
                'main_menu' => $mainNav,
                'sub_menu' => $subNav,
            ];

            // Load view
            $this->view('pages/login', $data);
        }
    }

    public function myprofile()
    {

        $mainNav = $this->NavigationModel->getMainNav();
        $subNav = $this->NavigationModel->getSubNav();
        $userDetails = $this->userModel->getUserdetails($_SESSION['customer_id']);
        $wishlist = $this->userModel->getWishlistProductSingleImg($_SESSION['customer_id']);

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['customeremail']),
                'password' => trim($_POST['customerpassword']),
                'email_err' => '',
                'password_err' => '',
                'title' => 'AKT Fashion Store',
                'description' => 'NEw MVC',
                'main_menu' => $mainNav,
                'sub_menu' => $subNav,
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter valid email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // Create Session
                    $this->createCustomerSession($loggedInUser);
                    redirect('');
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('pages/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('pages/login', $data);
            }
        } else {

            // Init data
            $data = [
                'user' => $userDetails,
                'wishlist' => $wishlist,
                'main_menu' => $mainNav,
                'sub_menu' => $subNav,
            ];

            // Load view
            $this->view('pages/myprofile', $data);
        }
    }

    public function updateprofile()
    {

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'id' => $_SESSION['customer_id'],
                'email' => trim($_POST['email']),
                'name' => trim($_POST['name']),
                'telephone' => trim($_POST['telephone']),
                'birthdate' => trim($_POST['birthdate']),
                'email_err' => '',
                'name_err' => '',
                'telephone_err' => '',
                'birthdate_err' => '',
                'title' => 'AKT Fashion Store',
                'description' => 'NEw MVC',
                'main_menu' => $mainNav,
                'sub_menu' => $subNav,
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter valid email';
            }

            // Validate Password
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter Name';
            }

            if (empty($data['telephone'])) {
                $data['telephone_err'] = 'Please enter Phone Number';
            }

            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
                // $data['email_err'] = 'Email is already register..';
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['telephone_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->updateCustomer($data);

                if ($loggedInUser) {

                    redirect('users/myprofile');
                } else {
                    // $data['password_err'] = 'Password incorrect';
                    die("Something went Wrong 1!!");
                }
            } else {
                // Load view with errors
                print_r($data);
            }
        }
    }

    public function updatepassword()
    {

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'id' => $_SESSION['customer_id'],
                'old' => trim($_POST['old']),
                'new' => trim($_POST['new']),
                'con' => trim($_POST['con']),
                'old_err' => '',
                'new_err' => '',
                'con_err' => '',
                'main_menu' => $mainNav,
                'sub_menu' => $subNav,
            ];

            // Validate Old
            if (empty($data['old'])) {
                $data['old_err'] = 'Please enter Old Password';
            }

            if (empty($data['new'])) {
                $data['new_err'] = 'Please enter New Password';
            }

            if (empty($data['con'])) {
                $data['con_err'] = 'Please enter Confirm Password';
            }

            // Validate Password
            if (empty($data['new'])) {
                $data['new_err'] = 'Pleae enter New password';
            } elseif (strlen($data['new']) < 8 && !preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $data['new'])) {
                $data['new_err'] = 'Password must contain 8 or more characters of letters, numbers and at least one special character.';
            }

            // Validate Confirm Password
            if (empty($data['con'])) {
                $data['confpassword_err'] = 'Please confirm password';
            } else {
                if ($data['new'] != $data['con']) {
                    $data['confpassword_err'] = 'Passwords do not match';
                }
            }

            // Check for user/email
            if (!$this->userModel->checkoldPassword($data['old'])) {
                // User found
                $data['email_err'] = 'Please Enter Correct Old Password';
            }

            // Make sure errors are empty
            if (empty($data['old_err']) && empty($data['new_err'])  && empty($data['con_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->updateOldPassword($data);

                if ($loggedInUser) {
                    // Redirect to login
                    redirect('users/myprofile');
                }
            } else {
                // Load view with errors
                print_r($data);
            }
        }
    }

    public function resetpassword()
    {
        $this->view('pages/forgot_password');
    }

    public function createCustomerSession($user)
    {
        $_SESSION['customer_id'] = $user->customer_id;
        $_SESSION['customer_email'] = $user->customer_email;
        $_SESSION['customer_name'] = $user->customer_name;
    }

    public function logout()
    {
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_email']);
        unset($_SESSION['customer_name']);
        session_destroy();
        redirect('');
    }

    public function postForgotPassword()
    {
        $email = $_POST['email'];
        $user = $this->userModel->findUserByEmail($email, 1);
        $html = $this->emailTemplate('email/forgot_password', ['username' => $user->customer_name, 'password' => $user->customer_password]);

        // make email parameters
        $sendmail = new sendmail();
        $sendmail->mail_params['tousers'][0]['email'] = $email;
        $sendmail->mail_params['tousers'][0]['name'] = $user->customer_name;
        $sendmail->mail_params['subject'] = 'Forgot Password';
        $sendmail->mail_params['body'] = $html;
        $mail_sent = $sendmail->sendMail();
        if (is_bool($mail_sent)) {
            return redirect('');
        } else {
            die(print_r('Could not send email'));
        }
    }

    public function getStates(){
        $country_id = $_GET['country_id'];
        $states = $this->userModel->getStatesForCountry($country_id);
        echo json_encode($states);
    }
}
