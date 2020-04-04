<?php
class GameModel
{
    public static function createAndSaveScore($userid, $score, $tmsp)
    {
        $db = new Database();   //neue Datenbankverbindung

        //prevent SQL Injection:
        $userid = $db->escapeString($userid);
        $score = $db->escapeString($score);
        $tmsp = $db->escapeString($tmsp);

        $sql = "INSERT INTO game(`points`, `tmsp`, `userid`) VALUES('".$score."','".$tmsp."','".$userid."')";
        $db->query($sql);
    }

    public static function getScoreForOneUserById($userid)
    {
        $db = new Database();

        $sql = "SELECT points, tmsp FROM score WHERE user_id =" .intval($userid);
        $result = $db->query($sql);

        if($db->numRows($result) > 0) {     //Wenn in der Abfrage die Anzahl der Ausgaben größer ist als 0, dann...
            while($row = mysqli_fetch_object($result))  //solange ein Eintrag aus der Variable result als Arrayinhalt in die Variable row geschrieben wird führe die Schleife aus
            {
                echo $row->points;
                echo "<br>";


            }
            echo "<br>";
        }
        else {
            echo "<h1>Sie haben noch keine Scores</h1>";
        }


        /*if ($db->numRows($result) > 0) {
            $scoreArray = array();

            while ($row = $db->fetchObject($result)) {
                $scoreArray[] = $row;
            }
            return $scoreArray;
        }
        return null;*/
    }

    public static function getTotalScores(){
        $db = new Database();

        $sql = "SELECT points, tmsp FROM score ";
        $result = $db->query($sql);

        if($db->numRows($result) > 0) {     //Wenn in der Abfrage die Anzahl der Ausgaben größer ist als 0, dann...
            while($row = mysqli_fetch_object($result))  //solange ein Eintrag aus der Variable result als Arrayinhalt in die Variable row geschrieben wird führe die Schleife aus
            {
                echo $row->points;
                echo "<br />";
            }

        }
        else {
            echo "<h1>Es gibt noch keine Scores</h1>";
        }

    }



    public static function deleteScore($id)
    {
        $db = new Database();

        $sql = "DELETE FROM score WHERE id=".intval($id);
        $db->query($sql);
    }
}