<?php
/**
 * 输出逻辑封装
 *
 * @author  yaoxiaowei
 */

class   Output {

    /**
     * 默认消息输出
     */
    const   MESSAGE_DEFAULT = 'OK';

    /**
     * 输出结果
     *
     * @param   int     $code       代码
     * @param   string  $message    信息
     * @param   array   $data       数据
     */
    static  public  function display ($code, $message = self::MESSAGE_DEFAULT, $data = NULL) {

        global  $EXCEPTION_OUTPUT_FORMAT;
        $format     = isset($EXCEPTION_OUTPUT_FORMAT)   ? $EXCEPTION_OUTPUT_FORMAT  : 'json';
        $viewData   = self::fetch($code, $message, $data);

        switch ($format) {
            case    'json'  :
                header('Content-Type: text/json; charset=utf-8');
                echo        json_encode($viewData, JSON_UNESCAPED_UNICODE);
                exit;

            case    'html'  :
                header('Content-Type: text/html; charset=utf-8');
                Template::getInstance()->display('prompt/error.tpl', $viewData);
                exit;
        }
    }


    /**
     * 获取固定格式的结果
     *
     * @param   int     $code       代码
     * @param   string  $message    信息
     * @param   array   $data       数据
     * @return  array               输出数据
     */
    static  public  function fetch ($code, $message, $data = NULL) {

        $viewData   = NULL === $data
                    ? array(
                        'code'      => $code,
                        'message'   => $message
                    )
                    : array(
                        'code'      => $code,
                        'message'   => $message,
                        'data'      => $data
                    );

        return      $viewData;
    }
}
