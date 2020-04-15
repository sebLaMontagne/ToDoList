<?php

class DefaultController
{
    public function home()
    {
        $viewModel = new ViewModel('template', 'home');
    }

    public function notFound()
    {
        echo 'toto';
    }
}