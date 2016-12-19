<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
class BadTransException extends Exception
{
    /**
     * BadTransException constructor.
     * @param null $message message to throw
     * @param int $code exception code
     */
    public function __construct($message = null, $code = 0)
    {
        if (!$message) {
            throw new $this('Unknown '. get_class($this));
        }
        parent::__construct($message, $code);
    }
}

/**
 * Class BadRegisterException
 */
class BadRegisterException extends Exception
{
    /**
     * BadRegisterException constructor.
     * @param null $message message to throw
     * @param int $code exception code
*/
    public function __construct($message = null, $code = 0)
    {
        if (!$message) {
            throw new $this('Unknown '. get_class($this));
        }
        parent::__construct($message, $code);
    }
}

/**
 * Class BadAddAccountException
 */
class BadAddAccountException extends Exception
{
    /**
     * BadAddAccountException constructor.
     * @param null $message message to throw
     * @param int $code exception code
     */
    public function __construct($message = null, $code = 0)
    {
        if (!$message) {
            throw new $this('Unknown ' . get_class($this));
        }
        parent::__construct($message, $code);
    }
}
