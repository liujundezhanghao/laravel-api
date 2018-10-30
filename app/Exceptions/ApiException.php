<?php
/**
 * Created by PhpStorm.
 * User: liujun
 * Date: 2018/10/29
 * Time: 12:41
 */


namespace App\Exceptions;

class ApiException extends \Exception
{
    public function __construct($msg='',$code=422)
    {
        parent::__construct($msg, $code);
    }
}
