<?php


class Responce {
  private $responce;
  private $code;
  /**
   * set responce properties
   * @param integer $code — http responce code
   * @param string $message — message to users
   * @param string $status — responce status
   * @param array $data — responce additional data
   * @return void 
   */
  function __construct($code = 500, $message, $status = 'SERVER_ERROR', $result = []){
    $this->code = $code;
    $this->responce = [
      'result' => $result,
      'status' => $status,
      'message' => $message
    ];
  }

  /**
   * Get responce JSON format
   * When calling an object as a function
   * @return string — JSON responce data
   */
  function __invoke(){
    header('Content-Type: application/json');
    http_response_code($this->code);
    return json_encode($this->responce, JSON_UNESCAPED_UNICODE );
  }
}