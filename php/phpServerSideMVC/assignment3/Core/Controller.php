<?php

/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
class Controller
{
    /**
     * The view to be loaded
     */
    protected $view = null;
    /**
     * The query got from the urls.
     */
    protected $query = null;

    /**
     * The constructor to create a new view;
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @param string $modelName represents name of the model to be loaded.
     * require the input file.
     *
     */
    protected function loadModel($modelName)
    {
        $modelFileName = ROOT_PATH . '/model/' . $modelName . '.php';
        require_once('Model.php');
        require_once($modelFileName);
    }

    /**
     * @param string $query represents name of the model to be loaded.
     * require the input file.
     *
     */
    public function loadQuery($query)
    {
        $this->query = $query;
    }
}

;
