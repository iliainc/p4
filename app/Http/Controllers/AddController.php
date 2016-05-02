<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddController extends Controller
{
    public function getIndex()
    {
        return view('add.index');
    }
    public function getCreateBook()
    {
        // print 'CreateBook controller';
        # Instantiate a new Book Model object
        $book = new \App\Book();

        # Set the parameters
        # Note how each parameter corresponds to a field in the table
        $book->title = 'Harry Potter';
        $book->author = 'J.K. Rowling';
        $book->published = 1997;
        $book->cover = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
        $book->purchase_link = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';

        # Invoke the Eloquent save() method
        # This will generate a new row in the `books` table, with the above data
        $book->save();

        echo 'Added: '.$book->title;
    }
    public function getReadBook()
    {
        // print 'ReadBook controller';
        $books = \App\Book::all();

        # Make sure we have results before trying to print them...
        if(!$books->isEmpty()) {

            // Output the books
            foreach($books as $book) {
                echo $book->title.'<br>';
            }
        }
        else {
            echo 'No books found';
        }
    }
    public function getUpdateBook()
    {
        // print 'UpdateBook controller';
        # First get a book to update
        $book = \App\Book::where('author', 'LIKE', '%Scott%')->first();

        # If we found the book, update it
        if($book) {

            # Give it a different title
            $book->title = 'The Really Great Gatsby';

            # Save the changes
            $book->save();

            echo "Update complete; check the database to see if your update worked...";
        }
        else {
            echo "Book not found, can't update.";
        }
    }
    public function getDeleteBook()
    {
        // print 'DeleteBook controller';
        # First get a book to delete
        $book = \App\Book::where('author', 'LIKE', '%Scott%')->first();

        # If we found the book, delete it
        if($book) {

            # Goodbye!
            $book->delete();

            return "Deletion complete; check the database to see if it worked...";

        }
        else {
            return "Can't delete - Book not found.";
        }
    }

}
