<?php

class C3PO extends Robot
{
    protected static $numeroDeSerie;
    private $name;
    private $type;

    public function __construct($name = null, $type = "droïde de protocole", $numeroDeSerie = 0)
    {
        self::$numeroDeSerie++;
        $this->name = ($name == null) ? self::$numeroDeSerie : $name;
        $this->type = $type;
    }

    public function __toString()
    {
        return "Je suis le droïde de protocole numéro $this->name, enchanté de vous rencontrer !\n";
    }

    public function dire($str)
    {
        echo "C3PO no $this->name :$str\n";
    }

    public function marcher()
    {
        echo "Je me mets en route, inutile d'insister.\n";
        parent::marcher();
    }

    public function initierProtocole()
    {
        echo "En attente d'interaction utilisateur :\n";
        $var = trim(fgets(STDIN));
        if ($var == "marcher") {
            echo $this->marcher();
        } elseif (substr($var, 0, 4) == "dire") {
            $str = str_replace("\"", "", $var);
            $str = preg_replace("/\s+/", " ", $str);
            $str = substr($str, 4);
            echo $this->dire($str);
        } elseif (substr($var, 0, 5) == "repos") {
            echo "Fin du protocole\n";
        }
    }
}

/*
Parser le string avant le premier espace.
Check si c'est une méthode qui existe dans la classe ou dans les classes parents.
Si elle existe, l'appeler.
Parser le string après la premier espace et l'assigner à str.
*/


$foo = new C3PO();
echo($foo);
$foo->initierProtocole();
