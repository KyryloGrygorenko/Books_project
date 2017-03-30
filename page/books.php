<?php

require ROOT . 'models/books.php';

echo $sortField = requestGet('sort', 'price');
echo $sortOrder = requestGet('order', 'asc');

$books = findAllBooks($link, $sortField, $sortOrder);