<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
class View
{
    /**
     * @param string $view_file the file name of view to be shown
     * @param array $data data to pass to the view
     * @return bool false if not existed
     */
    public function show($view_file, $data=array())
    {
        $view_footer_name= ROOT_PATH.DS.'View'.DS.'footer.php';
        $view_file_name = ROOT_PATH.DS.'View'.DS.$view_file.'.php';

        if (!file_exists($view_file_name)) {
            return false;
        }

        require_once($view_file_name);
        return true;
    }
};
