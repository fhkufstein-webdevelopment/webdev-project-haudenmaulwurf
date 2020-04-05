<?php

echo $this->header;

?>

<div class="score_main"><br><br><br><br>
<div class = "score_inner">

<h1>Scoreboard </h1>
    <p><h3>Hier siehst du deine besten Ergebnisse sowie die generellen Highscores</h3></p>
    <br><br>

<div class = "tabelle1">
    <?php if($this->userscores): ?>
        <table class ="userscores">
            <tr>
                <th colspan="2">Deine Highscores</th>

            </tr>
            <?php foreach($this->userscores as $userscoreObj): ?>
                <tr class="td_userscores">
                    <td><?php echo $userscoreObj->tmsp; ?></td>
                    <td class="tabelle1_punkte"><?php echo $userscoreObj->points; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Es sind noch keine HighScore Einträge vorhanden!</p>
    <?php endif; ?>
    <br>
</div>
    <div class ="tabelle2">
<?php if($this->scores): ?>

    <table class ="scores">
        <tr>
            <th colspan="2">Highscores global</th>
        </tr>
        <?php foreach($this->scores as $scoreObj): ?>
            <tr class="td_highscores">
                <td><?php echo $scoreObj->name; ?></td>
                <td class="tabelle2_punkte"><?php echo $scoreObj->points; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Es sind noch keine HighScore Einträge vorhanden!</p>
<?php endif; ?>

</div>
</div>
</div>
<?php

echo $this->footer;

?>









