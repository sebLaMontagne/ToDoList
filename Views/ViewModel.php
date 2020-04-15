<?php

class ViewModel
{
    public function __construct($template, $view, array $data = [])
    {
        // appeler le stringManager ici ? (avant l'appel à la view en tout cas)
        ob_start();
        include('Views/'.$view.'.html');
        $content = ob_get_clean();
        $title = 'provisional';
        include('Views/'.$template.'.html');
    }
}