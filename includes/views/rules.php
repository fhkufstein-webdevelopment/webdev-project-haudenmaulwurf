<?php

echo $this->header;

?>


<div class="main"><br><br><br>
<div class="innerBorder">

<h1>Spielregeln</h1>
    <button type="submit" id="back_home" onclick="window.open('./home','_self')" >Home</button>
    <fieldset>
        <ol>
            <br>
            <li>Regel: Pro getroffenem <font color="#a52a2a">braunen</font> Maulwurf erhält man EINEN Punkt</li>
            <br>
            <li>Regel: Pro getroffenem <font color="#ffd700">gelben</font> Maulwurf erhält man ZWEI Punkte</li>
            <br>
            <li>Regel: Alle Maulwürfe müssen innerhalb des vorgegebenen Zeitfensters erledigt werden, um Punkte zu erhalten</li>
            <br>
            <li>VORSICHT!: Werden <font color="red">ROTE</font> Maulwürfe getroffen gibt es pro erledigtem Maulwurf EINEN Punkt ABZUG!</li>
        </ol>
        <p>Viel Spaß und Augen auf!</p>
    </fieldset>

</div>
</div>
<?php

echo $this->footer;

?>