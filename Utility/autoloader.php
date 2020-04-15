<?php

spl_autoload_register(function($class){
    $Classesfolders = ['Controllers', 'Models', 'Views'];
    foreach($Classesfolders as $folder){
        $file = $folder.'/'.$class.'.php';
        if(file_exists($file)){
            include_once($file);
        break;
        }
    }
});