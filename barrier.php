<?php
class Barrier {

    private static $barrier = array();
    private static $order = array(); 
    private static $reversMapping = array(); 
    
    
public function call_user_function($function, $event){
   
    $launching = null;
    if (is_array($function)) {
        list($class, $name) = $function;
        $launching = new ReflectionMethod($class, $name);
    } elseif (is_string($function) || is_callable($function)) {
        $launching = new ReflectionFunction($function);
    }

    if (array_values($event) !== $event) {
        $newParameters = [];
        foreach ($launching->getParameters() as $parameter) {
            $value = null;
          
            if (isset($event[$parameter->getName()])) {
                $value = $event[$parameter->getName()];
            } 
            elseif ($parameter->isOptional()) {
                $value = $parameter->getDefaultValue();
            }
        
            $newParameters[] = $value;
        }
       
        $event = $newParameters;
    }

    return call_user_func_array($function, $event);
}

public static function reboot() {
    self::$barrier = array();
    self::$order = array();
}

public static function finish($param) {

    
    if (!isset(self::$barrier[$param])) {
        self::$barrier[$param] = true;
        self::launch($param);
    }

}

public static function once($params, $event) {

    $params = (array)$params;

    $i = count(self::$order); 
    self::$order[$i] = array($event, $params);
    foreach ($params as $param) {
        self::$reversMapping[$param][] = $i;
    }
    
    if (self::launching($params)) {
        call_user_function($event);
    }

}

private static function launch($param) {
    foreach (self::$reversMapping[$param] as $i) {
        list($event, $params) = self::$order[$i];
        if (self::launching($params)) {
            call_user_function($event);
        }
    }
}

private static function  launching($params) {
    return count(array_intersect($params, array_keys(self::$barrier))) == count($params);
}

}


?>