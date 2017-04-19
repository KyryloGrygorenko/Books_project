<?php
require ROOT . 'models/authors.php';

$authors = findAllAuthors($link);
//print_r($authors);