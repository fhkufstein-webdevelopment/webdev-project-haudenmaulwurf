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
        $id = intval($userid);
      //  $sql = "SELECT points, tmsp FROM score WHERE user_id =" .intval($userid);
        $sql = "SELECT points, tmsp FROM score WHERE user_id = $id ORDER BY points DESC LIMIT 5";
        $result = $db->query($sql);


        if($db->numRows($result) > 0) {     //Wenn in der Abfrage die Anzahl der Ausgaben größer ist als 0, dann...

            $scoreArray = array();

            while($row = $db->fetchObject($result))  //solange ein Eintrag aus der Variable result als Arrayinhalt in die Variable row geschrieben wird führe die Schleife aus
            {
                $scoreArray[] = $row;
            }

            return $scoreArray;
        }
        else {
            return null;
        }

    }

    public static function getTotalScores(){
        $db = new Database();

        $sql = "SELECT score.points, `user`.name FROM score LEFT JOIN `user` on score.user_id = user.id ORDER BY points DESC LIMIT 5";
        $result = $db->query($sql);

        if($db->numRows($result) > 0) {     //Wenn in der Abfrage die Anzahl der Ausgaben größer ist als 0, dann...

            $scoreArray = array();

            while($row = $db->fetchObject($result))  //solange ein Eintrag aus der Variable result als Arrayinhalt in die Variable row geschrieben wird führe die Schleife aus
            {
                $scoreArray[] = $row;
            }

            return $scoreArray;
        }
        else {
            return null;
        }

    }

    public static function deleteScore($id)
    {
        $db = new Database();

        $sql = "DELETE FROM score WHERE id=".intval($id);
        $db->query($sql);
    }
}