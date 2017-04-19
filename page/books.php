<?php

require ROOT . 'models/books.php';


$book_paginate= new Pagination;
$book_paginate->set_db($db);

$query="select * from book where status = 1 order by {$book_paginate->sortField} {$book_paginate->sortOrder} LIMIT $book_paginate->page_number , $book_paginate->perPage";
$query_count="SELECT count(id) as total FROM `book` WHERE status=1";

$book_paginate->Paginate($query,$query_count);