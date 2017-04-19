<?php

function getSortedFields()
{
    return ['title', 'price'];
}



function findAllBooks($link, $sortField, $sortOrder,$page_book=1,$perPage=10)
{
    if (!in_array(strtolower($sortField), getSortedFields())) {
        $sortField = 'price';
    }
    
    if (!in_array(strtolower($sortOrder), ['asc', 'desc'])) {
        $sortOrder = 'asc';
    }
    
    $sql = "select * from book where status = 1 order by {$sortField} {$sortOrder} LIMIT $page_book,$perPage";
   
    $res = mysql_get_result($link, $sql);
    // todo: make with: while() + mysqli_fetch_assoc()
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}


/*function findAllBooks($link, $sortField, $sortOrder)
{
    if (!in_array(strtolower($sortField), getSortedFields())) {
        $sortField = 'price';
    }
    
    if (!in_array(strtolower($sortOrder), ['asc', 'desc'])) {
        $sortOrder = 'asc';
    }
    
    $sql = "select * from book where status = 1 order by {$sortField} {$sortOrder}";
    $res = mysql_get_result($link, $sql);
    
    
    while(mysqli_fetch_assoc($res) !=null){
        $res2[]=(mysqli_fetch_assoc($res));
    }
    debug($res2);
    return $res2;
    
    // todo: make with: while() + mysqli_fetch_assoc()
   
}*/

 


function findBookById($link, $id)
{
    $id = (int) $id;
    $sql = "select * from book where id = ?";
    
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    
    $res = mysqli_stmt_get_result($stmt);
    
    return mysqli_fetch_assoc($res);
}

