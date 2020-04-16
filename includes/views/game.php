<?php

echo $this->header;

?>
<div class="innerBody">
    <div id="additionalItems">
        <div id="pointsCounter">Punkte:</div>
        <div id="timer">Zeit</div>
    </div>
    <div id="game" class="noshow"></div>

    <div id="buttons">
        <button class="easyButton difficultyButton" value="1">Easy</button>
        <button class="mediumButton difficultyButton" value="2">Medium</button>
        <button class="hardButton difficultyButton" value="3">Hard</button>
        <button class="impossibleButton difficultyButton" value="999">Impossible</button>
    </div>
    <div id="endArea">
        <button id="endButton">Zeige Highscores</button>
    </div>
    <div class="audioControllers">
        <button class="muteButton"><img src="./images/unmutedButton.png" id="mute"></i></button>
        <br>
        <button class="volumeButton volumeDown"><b>--</b></i></button>
        <button class="volumeButton volumeUp"><b>++</b></i></button>
    </div>
</div>
<script type="text/javascript" src="js/game.js"></script>
<?php

echo $this->footer;

?>
