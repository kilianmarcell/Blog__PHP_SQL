<?php
class Bejegyzes {
    private $id;
    private $tartalom;
    private $datum;

    public function __construct(string $tartalom, DateTime $datum) {
        $this -> tartalom = $tartalom;
        $this -> datum = $datum;
    }

    public function uj() {
        global $db;

        $db -> prepare('INSERT INTO bejegyzesek (tartalom, datum) VALUES (:tartalom, :datum')
            -> execute([
                ':tartalom' => $this -> tartalom,
                ':datum' => $this -> datum -> format('Y-m-d H:i:s')
        ]);
    }

    public function getTartalom() : string {
        return $this -> tartalom;
    }

    public function getDatum() : DateTime {
        return $this -> datum;
    }

    public static function osszes() : array {
        //Későbbiekben nem jó ez a megoldás...
        global $db;
        $t = $db -> query("SELECT * FROM bejegyzesek ORDER BY datum DESC")
            -> fetchAll();
        $eredmeny = [];

        foreach ($t as $elem) {
            $bejegyzes =    new Bejegyzes($elem['tartalom'],
                            new DateTime($elem['datum']));
            $bejegyzes -> id = $elem['id'];
            $eredmeny[] = $bejegyzes;
        }

        return $eredmeny;
    }
}