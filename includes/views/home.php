<?php
echo $this->header;

?>

<div class ="home_main">
    <br><br><br><br>
<div class = "home_inner">

<h1>Hau den Maulwurf </h1>
    <p><h3>Lass die Maulwürfe nicht entkommen!</h3></p>
    <br><br><br>
    <div class = "buttons">

            <button type="submit" id="start_game" onclick="window.open('./game','_self')" >Spiel starten</button>
            <button type="submit" id="view_rules" onclick="window.open('./rules','_self')">Spielregeln</button>
            <button type="submit" id="view_score" onclick="window.open('./scoreboard','_self')">Highscore</button>

    </div>

</div>
</div>
<?php

echo $this->footer;

?>






