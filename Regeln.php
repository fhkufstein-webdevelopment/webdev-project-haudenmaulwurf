<?php
include_once ('Regeln.css');
echo $this->header;
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Regeln</title>
    <link href="Regeln.css" rel="stylesheet">
</head>
<body>
<h1>Spielregeln</h1>
    <fieldset>
        <ol>
            <br>
            <br>
            <li>Regel: Pro getroffenem <font color="#a52a2a">braunen</font> Maulwurf erhält man EINEN Punkt</li>
            <br>
            <li>Regel: Pro getroffenem <font color="#ffd700">gelben</font> Maulwurf erhält man ZWEI Punkte</li>
            <br>
            <li>Regel: Alle Maulwürfe müssen innerhalb des vorgegebenen Zeitfensters erledigt werden, um Punkte zu erhalten</li>
            <br>
            <li>VORSICHT!: Werden <font color="red">ROTE</font> Maulwürfe getroffen gibt es pro erledigtem Maulwurf EINEN Punkt ABZUG!</li>
        </ol>
        <p>Viel Spaß und Augen auf</p>
    </fieldset>

</body>
</html>
<?php
echo $this->footer;
?>