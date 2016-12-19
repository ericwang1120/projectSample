<?php

/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
class UserController extends Controller
{
    /**
     * Login page of the system
     */
    public function loginPage()
    {
        $this->view->show('loginView', 0);
    }

    /**
     * Login page of the system
     */
    public function registerPage()
    {
        $this->view->show('registerView', 0);
    }

    /**
     * Login the system
     */
    public function login()
    {
        $this->loadModel('UserModel');
        $this->loadModel('NoticeModel');

        if (isset($_POST['userName']) && isset($_POST['userPassword'])) {

            $userName = $_POST['userName'];
            $userPassword = $_POST['userPassword'];
            $userModel = new UserModel();

            if ($userModel->getValidation($userName, $userPassword)) {
                $user = $userModel->getValidation($userName, $userPassword);
                $_SESSION['userID'] = $user->getUserID();
                $_SESSION['userFullName'] = $user->getUserFullName();

                $noticeData = new NoticeModel("Login successfully! Redirect in 2 seconds.", "../User/welcome");
                $this->view->show('noticeView', $noticeData->getData());
                exit();
            } else {
                $noticeData = new NoticeModel("Incorrect username or password! Redirect in 2 seconds.", "../View/loginView.php");
                $this->view->show('noticeView', $noticeData->getData());
                exit();
            }
        } elseif (isset($_SESSION['userID'])) {
            $noticeData = new NoticeModel("You have already logged in! Redirect in 2 seconds.", "../User/welcome");
            $this->view->show('noticeView', $noticeData->getData());
            exit();
        } else {
            $noticeData = new NoticeModel("Please login! Redirect in 2 seconds.", "../View/loginView.php");
            $this->view->show('noticeView', $noticeData->getData());
        }
    }

    /**
     * Register
     */
    public function register()
    {
        if (isset($_POST['userName'])) {
            $this->loadModel('UserModel');
            $this->loadModel('NoticeModel');

            $userModel = new UserModel();

            try {
                $userModel->register( $_POST['userName'], $_POST['userPassword'],$_POST['userFullName'], $_POST['userEmail']);
                $noticeData = new NoticeModel("Register successful! Redirect in 2 seconds.", "../User/loginPage");
            } catch (Exception $e) {
                $noticeData = new NoticeModel($e->getMessage(), "../User/loginPage");
            }

            $this->view->show('noticeView', $noticeData->getData());
        }
    }

    /**
     * Log out the system
     */
    public function logout()
    {
        $this->loadModel('NoticeModel');
        unset($_SESSION['userID']);
        $noticeData = new NoticeModel("Log out successful! Redirect in 2 seconds.", "../User/loginPage");
        $this->view->show('noticeView', $noticeData->getData());
    }

    /**
     * Check if the user has already existed
     */
    public function checkIfExisted()
    {
        $userName = "";
        if (isset($_GET['userName'])) {
            $userName = $_GET['userName'];
        }
        $this->loadModel('UserModel');
        try {
            $user = new UserModel();
            $user->getIfExisted($userName);
            echo "Valid username!";
        } catch (Exception $e) {
            echo "Existed username!";
        }
    }

    /**
     *
     */
    public function welcome()
    {
        $this->view->show("welcomeView");
    }
}
