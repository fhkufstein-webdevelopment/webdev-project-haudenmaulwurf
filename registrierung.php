<?php

echo $this->header;
?>
<link href="registrierung.css" rel="stylesheet"/>
<div class="modal fade<?php if($registerError):?> in<?php endif; ?>" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="registerModalLabel">Registrierung</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <p class="col-xs-12">
Wir benötigen folgende Angaben um Sie für unseren Dienst registrieren zu können:
                    </p>

                    <form method="post" action="login" class="col-xs-12">

                        <div class="form-group">
                            <label for="name">Benutzername:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Benutzernamen eingeben">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Passwort (mindestens 8 Zeichen):</label>
                            <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Bitte Passwort eingeben (mind. 8 Zeichen)">
                        </div>
                        <div class="form-group">
                            <label for="pwd2">Passwort (wiederholen):</label>
                            <input type="password" name="pwd2" class="form-control" id="pwd2" placeholder="Bitte das Passwort wiederholen">
                        </div>

                        <input type="hidden" name="action" value="register">
                        <?php
                        /* Verbindung aufnehmen*/
                        $name = $_POST["name"];$pwd=$_POST["pwd"];
                        $con = new MySQLi("localhost", "root", "", "");if ($con->connect_error) {echo "Fehler bei der Verbindung: " . mysqli_connect_error();exit();}
                        $sql = "INSERT INTO  (name, pwd) VALUES ('$name', '$pwd')";
                        $ergebnis = mysqli_query($con, $sql)or die("Fehler bei der Datenbankabfrage.");
                        echo "Danke für die Anmeldung, es handelt sich um $name $pwd.  Viel Spass im Spiel";
                        ?>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
                <button type="button" class="btn btn-primary">Registrieren</button>
            </div>
        </div>
    </div>
</div>

<?php
echo $this->footer;
?>

