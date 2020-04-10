<?php

class RulesController extends Controller
{
    protected $viewFileName = "rules"; //this will be the View that gets the data...
    protected $loginRequired = true;


    public function run()
    {
        $this->view->title = 'rules';
        $this->view->username = $this->user->username;
    }
}