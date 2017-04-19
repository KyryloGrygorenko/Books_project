<?php

require ROOT . 'models/books.php';

// $sortField = requestGet('sort', 'price');
// $sortOrder = requestGet('order', 'asc');

// $page_book = isset($_GET['page_book']) ? $_GET['page_book'] : 1;
// $perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 40 ? $_GET['per-page'] : 10;
// $start = ($page_book > 1)? ($page_book * $perPage)- $perPage : 0;

// //$books = findAllBooks($link, $sortField, $sortOrder,$start,$perPage);

//     if (!in_array(strtolower($sortField), getSortedFields())) {
//         $sortField = 'price';
//     }
    
//     if (!in_array(strtolower($sortOrder), ['asc', 'desc'])) {
//         $sortOrder = 'asc';
//     }

// $books = $db->prepare("
//     select * from book where status = 1 order by {$sortField} {$sortOrder} LIMIT $page_book,$perPage
// ");

// $books->execute();
// $books = $books->fetchAll(PDO::FETCH_ASSOC);

// //Pages

// $total= $db->query("SELECT count(id) as total FROM `book` WHERE status=1")->fetch()['total'];
// $pages= ceil($total / $perPage);
$book_paginate= new Pagination;
//$db=new PDO('mysql:dbname=mvc; host=localhost', 'root', '');
$book_paginate->set_db($db);
$book_paginate->Paginate();