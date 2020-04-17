<?php

class FileNotFoundController extends Controller
{
    protected $viewFileName = "404"; //this will be the View that gets the data...
    protected $loginRequired = false;


    public function run()
    {
        $this->view->title = '404';
        //$this->view->username = $this->user->username;
    }
}