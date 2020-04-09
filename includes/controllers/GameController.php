<?php

class GameController extends Controller
{
    protected $viewFileName = "scoreboard"; //this will be the View that gets the data...
    protected $loginRequired = true;

    public function run()
    {
        $this->view->title = 'scoreboard';
        $this->view->username = $this->user->username;

        $this->checkForSaveScorePost();
        $this->view->userscores = GameModel::getScoreForOneUserById($this->user->id);

        $this->view->scores = GameModel::getTotalScores();
    }

    private function checkForSaveScorePost()
    {
        if(isset($_POST['action']) && $_POST['action'] == 'saveScore') {
            $score = $_POST['score'];
            $userid = 2;


            GameModel::createAndSaveScore($userid, $score);


            $jsonResponse = new JSON();
            $jsonResponse->result = true;
            $jsonResponse->setMessage("Saved the score!");
            $jsonResponse->send();
        }

    }


}