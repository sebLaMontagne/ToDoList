<?php

/**
 * return an array with an instance of all controllers in the application in the form : $controllers['task'] = new TaskController();
 */
function controllers_setup(){
    // On récupère les noms de tous les fichiers de controllers existants
    $brutControllers = scandir('Controllers');
    // liste des instances des controllers de l'application
    $controllers = []; 
    foreach($brutControllers as $controller)
    {
        // On se débarrasse des déchets créés par scandir 
        if($controller != '.' && $controller != '..'){
            // nom du fichier, sans extension
            $instanceName = pathinfo($controller)['filename'];
            // nom du controller, sans 'Controller' à la fin
            $keyName = preg_replace('@^([A-Z][a-z]+)(Controller)$@','$1',$instanceName);

            $controllers[$keyName] = new $instanceName;
        }
    }

    return $controllers;
}