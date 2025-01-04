<?php
class Book{

public $title;
    public $availableCopies;
    public function __construct($title,$availableCopies){
        $this->title=$title;
        $this->availableCopies=$availableCopies;
}
public function getTitle(){
    return $this->title;

}
public function getAvailableCopies(){



    return $this->availableCopies;
}
public function borrowBook(){

if($this->availableCopies>0){
    $this->availableCopies--;
    return true;
}
return false;
}

public function returnBook(){
    return $this->availableCopies++;

}


}
class Member{
    private $name;
    private $borrowedBooks=[];
    public function __construct($name){
        $this->name=$name;
    }
    public function getName(){

        return $this->name;
    }




    public function borrowBook(Book $book){
        if($book->borrowBook()){
        $this->borrowedBooks[]=$book;
        echo "{$this->name} borrowed '{$book->getTitle()}'.\n";
        }else{
            echo "Sorry, '{$book->getTitle()}' is not available for {$this->name}.\n";
        }
}

    public function returnBook(Book $book){
        foreach($this->borrowedBooks as $key =>$borrowedBook){
            
                if ($borrowedBook === $book) {
                    unset($this->borrowedBooks[$key]);
                    $book->returnBook();
                    echo "{$this->name} returned '{$book->getTitle()}'.\n";
                    return;
                }
                echo "{$this->name} does not have '{$book->getTitle()}' to return.\n";
       
}



        }


}






// Usage

// Create 2 books
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

// Create 2 members
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

// Members borrowing books
$member1->borrowBook($book1); // John Doe borrows The Great Gatsby
$member2->borrowBook($book2); // Jane Smith borrows To Kill a Mockingbird

// Print available copies
echo "Available Copies of '{$book1->getTitle()}': {$book1->getAvailableCopies()}\n";
echo "Available Copies of '{$book2->getTitle()}': {$book2->getAvailableCopies()}\n";
















?>