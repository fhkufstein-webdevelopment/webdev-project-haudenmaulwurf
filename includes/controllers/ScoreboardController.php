<?php

class ScoreboardController extends Controller
{
    protected $viewFileName = "scoreboard"; //this will be the View that gets the data...
    protected $loginRequired = true;

    public function run()
    {
        $this->view->title = 'scoreboard';
        $this->view->username = $this->user->username;

        $this->checkForSaveScorePost();
        $this->view->userscores = ScoreboardModel::getScoreForOneUserById($this->user->id);

        $this->view->scores = ScoreboardModel::getTotalScores();
    }

    private function checkForSaveScorePost()
    {
        if(isset($_POST['action']) && $_POST['action'] == 'saveScore') {
            $score = $_POST['score'];
            $userid = $this->user->id;

            ScoreboardModel::createAndSaveScore($userid, $score);

            $jsonResponse = new JSON();
            $jsonResponse->result = true;
            $jsonResponse->setMessage("Saved the score!");
            $jsonResponse->send();
        }

    }


}