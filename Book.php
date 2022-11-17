<?php
class Book
{
    public function __construct(
        private string $author,
        private string $title,
        private float $price,
        private int $stock,
        private int $id
    )
    {
    }
    public function mostrarInfo()
    {
        return "<p><b>Author</b>: $this->author <br> 
        <b>Title:</b> $this->title <br> 
        <b>Price:</b> $this->price <br> 
        <b>Stock:</b> $this->stock <br> 
        <b>Id:</b> $this->id <br> </p>";
    }
}



$book1 = new Book(
    "Jack London",
    "Los ojos del perro siberiano",
    200.50,
    100,
    1
);

$book2 = new Book(
    "Pedro Picapiedra",
    "Dinosaurios e imperios",
    200.50,
    100,
    1
);




/* echo $book1->mostrarInfo();
echo $book2->mostrarInfo(); */


?>