<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
session_start();

/**
 * Class Dispatcher
 */
class Dispatcher
{
    /**
     * get the path of the request.
     */
    private $path;
    /**
     * This is the query from the urls (like ?variable=1234).
     */
    private $query;
    /**
     * session.to be controlled.
     */
    protected $session;

    /**
     * Set path to the $path..
     */
    public function __construct()
    {
        //get url from the users.
        $this->path = $_SERVER['REQUEST_URI'];
    }

    /**
     * The main function of the class.
     * @return String Status.
     */
    public function run()
    {
        //explode the url
        $requestURL = str_replace(array("'", '"', '\\', '/'), '', $_SERVER['REQUEST_URI']);

        //if it is the root folder, redirect to the login Page.
        if ($requestURL == 'assignment3') {
            header('Location:' . INDEX_URL . DS . 'User' . DS . 'loginPage');
            exit();
        }
        //get query from the url.
        if (isset(parse_url($this->path)['query'])) {
            $this->query = parse_url($this->path)['query'];
        }

        //store the query into an array
        parse_str($this->query, $this->query);

        //get path from the url.
        $this->path = parse_url($this->path)['path'];
        $this->path = trim($this->path, '/');

        $paths = explode('/', $this->path);

        //get the name of controller and method
        array_shift($paths);

        $control = array_shift($paths);

        $method = array_shift($paths);

        //default by index
        if ($control == '') {
            $control = 'index';
        }
        if ($method == '') {
            $method = 'index';
        }

        //get the full path of the controller
        $control_file_name = ROOT_PATH . DS . 'Controller' . DS . $control . 'Controller.php';

        //session control. If a user didn't login, redirect to the home Page.

        //Pages which ignore session control
        $ignoreArray = array("Userlogin", "UserregisterPage", "UserloginPage","Userregister","UsercheckIfExisted");

        if (!in_array($control . $method, $ignoreArray)) {
            if (!isset($_SESSION['userID'])) {
                header('Location:' . INDEX_URL);
                exit();
            }
        }

        //if the controller file didn't exist.
        if (file_exists($control_file_name)) {
            require_once($control_file_name);

            $controllerName = $control . 'Controller';
            if (class_exists($controllerName)) {
                //new a control if exists.
                $control = new $controllerName();
                $control->loadQuery($this->query);
                if (method_exists($controllerName, $method)) {
                    //get a method if exists.
                    $control->$method();
                } else {
                    return 'ERROR_404';
                }
            } else {
                return 'ERROR_404';
            }
        } else {
            return 'ERROR_404';
        }
    }
}
