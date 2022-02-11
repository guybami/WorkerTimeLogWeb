<?php

/* Custom exception logger
 * Author: Guy Bami 
 * * Class used to log error occured in application
 * @author Guy Bami
 * Created: 30.10.13
 * Last update: 30.10.13
 */

class ExceptionLogger extends Exception {

    var $message;

    function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code);
        if (!is_null($previous)) {
            $this->previous = $previous;
        }
    }

    public function errorMessage() {
        //error message
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
                . ': <b>' . $this->getMessage() . '</b> ';
        return $errorMsg;
    }

    public static function logException($e) {
        if (!isset($e)) {
            echo "No Exception defined.";
        }
        echo "An exception occured: " . $e->getMessage() . "<br />";
    }

    public function getErrorMessage() {
        return $this->errorMessage();
    }

    /**
     * jTraceEx() - provide a Java style exception trace
     * @param $exception
     * @param $seen      - array passed to recursive calls to accumulate trace lines already seen
     *                     leave as NULL when calling this function
     * @return array of strings, one entry per trace line
     */
    public static function jTraceEx($e, $seen = null) {
        $starter = $seen ? 'Caused by: ' : '';
        $result = array();
        if (!$seen)
            $seen = array();
        $trace = $e->getTrace();
        $prev = null; // $e->getPrevious();
        $result[] = sprintf('%s%s: %s', $starter, get_class($e), $e->getMessage());
        $file = $e->getFile();
        $line = $e->getLine();

        while (true) {
            $current = "$file:$line";
            if (is_array($seen) && in_array($current, $seen)) {
                $result[] = sprintf(' ... %d more', count($trace) + 1);
                break;
            }
            $result[] = sprintf(' at %s%s%s(%s%s%s)', count($trace) && array_key_exists('class', $trace[0]) ? str_replace('\\', '.', $trace[0]['class']) : '', count($trace) && array_key_exists('class', $trace[0]) && array_key_exists('function', $trace[0]) ? '.' : '', count($trace) && array_key_exists('function', $trace[0]) ? str_replace('\\', '.', $trace[0]['function']) : '(main)', $line === null ? $file : basename($file), $line === null ? '' : ':', $line === null ? '' : $line);
            if (is_array($seen))
                $seen[] = "$file:$line";
            if (!count($trace))
                break;
            $file = array_key_exists('file', $trace[0]) ? $trace[0]['file'] : 'Unknown Source';
            $line = array_key_exists('file', $trace[0]) && array_key_exists('line', $trace[0]) && $trace[0]['line'] ? $trace[0]['line'] : null;
            array_shift($trace);
        }
        $result = join("\n", $result);
        if ($prev)
            $result .= "\n" . self::jTraceEx($prev, $seen);

        return $result;
    }
    
    function errorHandler( $errno, $errstr, $errfile, $errline, $errcontext)
    {
      echo 'Into '.__FUNCTION__.'() at line '.__LINE__.
      "\n\n---ERRNO---\n". print_r( $errno, true).
      "\n\n---ERRSTR---\n". print_r( $errstr, true).
      "\n\n---ERRFILE---\n". print_r( $errfile, true).
      "\n\n---ERRLINE---\n". print_r( $errline, true).
      "\n\n---ERRCONTEXT---\n".print_r( $errcontext, true).
      "\n\nBacktrace of errorHandler()\n".
      print_r( debug_backtrace(), true);
    }
    
    
    public static function logErrorToFile($message){
        $suffix = date('d.m.Y'); // date('d.m.Y H:i:s');
        $logFileName = "../Logs/webErrorsLog." . $suffix . ".log";
        $messageLog = "[" . date('d.m.Y H:i:s') . "]: " . $message;
        // log errors into file
        error_log($messageLog . "\n\n", 3, $logFileName);
    }

}
