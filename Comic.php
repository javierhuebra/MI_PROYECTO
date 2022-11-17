<?php

require 'Book.php';
class Comic extends Book
{
    public function __construct(
        $author,
        $title,
        $price,
        $stock,
        $id,
        private array $illustrators,
        private int $vol,
    )
    {
        parent::__construct($author, $title, $price, $stock, $id);
    }

    public function mostrarInfo()
    {
        $result = "<p><b>Volumen:<b> $this->vol</p>";
        $ul = "<ul> --illustrators --";
        foreach($this->illustrators as $illustrator){
            $ul.= "<li>$illustrator</li>";
        }
        $ul.="</ul>";

        echo parent::mostrarInfo();
        return $result .= $ul;
    }
}

$comic1 = new Comic(
    'El bananero',
    'Spiderman: el hombre que araña',
    125,
    45,
    1,
    ["ilus 1", "ilus 2", "ilus 3"],
    4
);

echo $comic1->mostrarInfo();
?>