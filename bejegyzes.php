<?php
class Bejegyzes {
    private $id;
    private $tartalom;
    private $datum;

    public static function osszes() : array {
        //Későbbiekben nem jó ez a megoldás...
        global $db;
        $t = $db -> query("SELECT * FROM bejegyzesek ORDER BY datum DESC")
            -> fetchAll();
        $eredmeny = [];

        foreach ($t as $elem) {
            $bejegyzes = new Bejegyzes();
            $bejegyzes -> id = $elem['id'];
            $bejegyzes -> tartalom = $elem['tartalom'];
            $bejegyzes -> datum = new DateTime($elem['datum']);
            $eredmeny[] = $bejegyzes;
        }

        return $eredmeny;
    }
}