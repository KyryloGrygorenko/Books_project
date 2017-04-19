<?php

// NOT READY YET....coding is in progress

require ROOT . 'models/authors.php';

//$authors = findAllAuthors($link);

$authors_paginate= new Pagination;
$authors_paginate->set_db($db);

$query="SELECT a.name as AuthorName,b.title as BookTitle FROM `book_author` ba, book b, author a where ba.book_id=b.id and ba.author_id = a.id LIMIT $authors_paginate->page_number , $authors_paginate->perPage";
$query_count="SELECT count(id) as total FROM `book_author` ";


$authors_paginate->Paginate($query,$query_count);


