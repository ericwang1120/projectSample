<?php
/**
 * 159339Assignment2
 * XIN WANG 15397438
 */

/**
 * Class Dispatcher
 */
require_once("dbHandler.php");

class Dispatcher
{
    /**
     * get the path of the request.
     */
    private $path;

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
        $this->path = parse_url($this->path)['path'];
        $this->path = trim($this->path, '/');

        $method = $_SERVER['REQUEST_METHOD'];

        $request = explode('/', $this->path);
        array_splice($request, 0, 2);

        $table = $request[0];
        $key = null;
        if (isset($request[1])) {
            $key = $request[1];
            array_splice($request, 0, 2);
        }
        $condition = array();

        if (isset($request[1])) {
            $keyArray = array();
            $valueArray = array();
            for ($i = 0; $i < count($request) / 2; $i++) {
                $keyArray[] = $request[$i * 2];
                $valueArray[] = $request[$i * 2 + 1];
            }
            $condition = array_combine($keyArray, $valueArray);
        }

        $db = new dbHandler($table);

        switch ($method) {
            case 'GET':
                if ($key == "all") {
                    print($db->selectAll($condition));
                } else {
                    print $db->selectByID($key);
                }
                break;
            case 'PUT':
                //print($db->update($key, $put));
                break;
            case 'POST':
                if ($key == null) {
                    print($db->add($_POST));
                } else {
                    print($db->update($key, $_POST));
                }
                break;
            case 'DELETE':
                $db->delete($key);
                break;
        }
    }
}
