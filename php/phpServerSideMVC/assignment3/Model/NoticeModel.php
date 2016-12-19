<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */

class NoticeModel
{
    /**
     * message to return
     */
    private $msg;
    /**
     * page to redirect to
     */
    private $redirectURL;


    /**
     * NoticeModel constructor.
     * @param string $inputMsg
     * @param string $inputURL
     */
    public function __construct($inputMsg, $inputURL)
    {
        $this->msg=$inputMsg;
        $this->redirectURL=$inputURL;
    }

    /**
     * @return array of message and URL
     */
    public function getData()
    {
        $noticeData=array("msg"=>$this->msg,"URL"=>$this->redirectURL);
        return $noticeData;
    }
}
