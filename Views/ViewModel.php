<?php

class ViewModel
{
    public function __construct($template, $view, array $data = [])
    {
        $stringManager = new StringsManager;
        $strings = $stringManager->getAllLocalStrings();

        $title = $strings['home_title'];
        ob_start();
        include('Views/'.$view.'.html');
        $content = ob_get_clean();
        include('Views/'.$template.'.html');
    }
}