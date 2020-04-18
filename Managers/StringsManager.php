<?php

class StringsManager extends Manager{

    public function getAllLocalStrings()
    {
        $r = $this->_db->prepare('
            SELECT stringName, content FROM strings 
            INNER JOIN stringslocal
            ON strings.id = stringslocal.id
            AND stringslocal.lang = :lang');
        $r->bindValue(':lang', htmlspecialchars($_GET['lang']));
        $r->execute();

        $strings = [];
        while($a = $r->fetch(PDO::FETCH_ASSOC))
        {
            $strings[$a['stringName']] = $a['content'];
        }
        return $strings;
    }
}