<?php
function findAllAuthors($link)
{
    
   
    $sql = "SELECT a.name as AuthorName,b.title as BookTitle FROM `book_author` ba, book b, author a where ba.book_id=b.id and ba.author_id = a.id;
";
       $res = mysql_get_result($link, $sql);
    
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
    
}