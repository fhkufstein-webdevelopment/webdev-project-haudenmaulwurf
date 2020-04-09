<?php

class GameController extends Controller
{
    protected $viewFileName = "game"; //this will be the View that gets the data...
    protected $loginRequired = true;

    public function run()
    {
        $this->view->title = 'game';
        $this->view->username = $this->user->username;
    }
}