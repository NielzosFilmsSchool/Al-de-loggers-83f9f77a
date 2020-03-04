<?php
class MyLogger
{
    public $origin;

    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    public function log($message, $level) 
    {
        switch($level){
        case "WARNING":
            $this->warning($message);
            break;
        case "ERROR":
            $this->error($message);
            break;
        case "INFO":
            $this->info($message);
            break;
        case "DEBUG":
            $this->warning($message);
            break;
        }
    }

    public function warning($message)
    {
        $this->_logWithTime("WARNING: ", $message);
    }

    public function error($message)
    {
        $this->_logWithTime("ERROR: ", $message);
    }
    
    public function info($message)
    {
        $this->_logWithTime("INFO: ", $message);
    }

    public function debug($message)
    {
        $this->_logWithTime("DEBUG: ", $message);
    }

    private function _logWithTime($type, $message)
    {
        echo "[".date("d,M,Y h:i:s")."] $this->origin - $type $message".PHP_EOL;
    }
}

$logger = new MyLogger();
$logger->setOrigin("origin test");
$logger->log("log message", "INFO");
$logger->warning("warning message");
