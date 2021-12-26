<?php
namespace services;

use Plasticbrain\FlashMessages\FlashMessages;
use utils\Url;
use utils\Util;

class User
{

    private static $_instance = null;
    static function getInstance(){
        if(empty(self::$_instance))
            self::$_instance = new self();

        return self::$_instance;

    }
    private function __construct()
    {
    }

    function signup(){



            global $conn;

            $hasErrors = false;


            require BASE_PATH . '/libs/gump/gump.class.php';

            $gump = new \GUMP();
            $_POST = $gump->sanitize($_POST);

            $gump->validation_rules(array(
                'username'    => 'required|alpha_numeric|max_len,20|min_len,4',
                'firstname'        => 'required|alpha_space|max_len,30|min_len,2',
                'lastname'        => 'required|alpha_space|max_len,30|min_len,2',
                'email'       => 'required|valid_email',
                'password'    => 'required|max_len,50|min_len,6',
            ));
            $gump->filter_rules(array(
                'username' => 'trim|sanitize_string',
                'firstname'     => 'trim|sanitize_string',
                'lastname'     => 'trim|sanitize_string',
                'password' => 'trim',
                'email'    => 'trim|sanitize_email',
            ));
            $validated_data = $gump->run($_POST);

            $flash = new FlashMessages();
//var_dump($validated_data);
//die('sdkw');

            if($validated_data === false) {
                $hasErrors = true;
                $flash->error($gump->get_readable_errors(true));
            }
            else if ($_POST['password'] !== $_POST['repassword'])
            {
                $hasErrors = true;
                $flash->error('Passwords do not match');
            }
            else {

                $username = $validated_data['username'];
                $email = $validated_data['email'];

                $r = $this->doUserExists($username, $email);


                if(!empty($r)){
                    $hasErrors = true;
                    if( ($r['username'] == $username) && ($r['email'] == $email) ){
                        $flash->error('Username And Email is already taken! try a different one');
                    }
                    else {
                        if ($r['username'] == $username) {
                            $flash->error('Username is already taken! try a different one');
                        }
                        else if ($r['email'] == $email) {
                            $flash->error('Email is already taken! try a different one');
                        }

                    }
                }


                if(!$hasErrors) {

                    $firstname = $validated_data['firstname'];
                    $lastname = $validated_data['lastname'];
                    $email = $validated_data['email'];
                    $pass = $validated_data['password'];
                    $password = password_hash("$pass" , PASSWORD_DEFAULT);
                    $role = $_POST['role'];
                    $gender = $_POST['gender'];
                    $joindate = Util::getToday(true);
                    $query = "INSERT INTO users(username,firstname,lastname, email,password,role, gender,joindate,token) 
VALUES ('$username' , '$firstname', '$lastname', '$email', '$password' , '$role', '$gender', '$joindate', '' )";
                    $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
                    if (mysqli_affected_rows($conn) > 0) {

                        $flash->success('SUCCESSFULLY REGISTERED. Please login', Url::generateLink('login'));
                    }
                    else {
                        $hasErrors = true;
                        $flash->error('Error Occurred');
                    }
                }

        }
            return $hasErrors;

    }

    function login(){

        global $conn;
        $flash = new FlashMessages();

        $username  = $_POST['user'];
        $password = $_POST['pass'];
        mysqli_real_escape_string($conn, $username);
        mysqli_real_escape_string($conn, $password);

        $hasErrors = true;
        $row = $this->doUserExists($username, $username);


        if(!empty($row)){

                $id = $row['id'];
                $username = $row['username'];
                $pass = $row['password'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $role= $row['role'];

                if (password_verify($password, $pass )) {

                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['lastname'] = $lastname;
                    $_SESSION['email']  = $email;
                    $_SESSION['role'] = $role;

                    $hasErrors = false;
                }

            }


        if($hasErrors)
            $flash->error('invalid username/password');

        return !$hasErrors;
    }
    function logout(){
        session_unset();
        session_destroy();
        return true;
    }

    function isLoggedIn(){

        if(!empty($_SESSION['id']))
            return true;
        return false;
    }

    function getLoggedInUserSession(){

        if(self::isLoggedIn()) {

            return [
                'id' => $_SESSION['id'],
                'username' => $_SESSION['username'],
                'firstname' => $_SESSION['firstname'],
                'lastname' => $_SESSION['lastname'],
                'email' => $_SESSION['email'],
                'role' => $_SESSION['role']

            ];
        }
        return false;
    }

    function doUserExists($username = null, $email = null, $bothShouldMatch = false){

        if(empty($username) && empty($email))
            throw new \Exception('Both can not be empty.');

        global $conn;

        $return = [];

        $query = "SELECT * FROM users WHERE ";

        $subQuery = [];
        if(!empty($username))
            $subQuery[] = " (username = '$username')";
        if(!empty($email))
            $subQuery[] = " (email = '$email')";

        if($bothShouldMatch)
            $query .= '(' . implode(' AND ', $subQuery) . ')';
        else
            $query .= '(' . implode(' OR ', $subQuery) . ')';


        $run_check = mysqli_query($conn , $query) or die(mysqli_error($conn));

        $result = mysqli_query($conn , $query) or die (mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
            $return = mysqli_fetch_assoc($result);
        }

        return $return;

    }

    function isAdmin(){

        $data = $this->getLoggedInUserSession();
        if(!empty($data) && ($data['role'] == 'admin'))
            return true;
        return false;

    }
}