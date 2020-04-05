<?php

class HomeController extends Controller
{
    protected $viewFileName = "home"; //this will be the View that gets the data...
    protected $loginRequired = true;


    public function run()
    {
        $this->view->title = 'home';
        $this->view->username = $this->user->username;
    }
}