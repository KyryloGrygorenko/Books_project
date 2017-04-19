<h1>Authors</h1> 
<style type="text/css">
    .book-item {
        width: 100px;
        height: 200px;
        float: left;
        border: 1px solid black;
        margin: 0 0 5px 5px;
        padding:10px;
    }
    
    .book-item div {
        height: 50px;
        font-weight: bold;
        
    }
</style>
<form action="/index.php" method="get" >
    <input type="hidden" name="page" value="books"/>
    Sort by: 
    <select name='sort'>
        <option value="price">Price</option>
        <option value="title">Title</option>
    </select>
    
    Order: 
    <select name='order'>
        <option value="asc">ASC</option>
        <option value="desc">DESC</option>
    </select>
    Items per page
    <select name='per-page'>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
        <option value="25">25</option>
        <option value="30">30</option>
    </select>
    
    <button>Go</button>
</form>

    <div class='books'>
        <?php foreach ($authors_paginate->items as $key=>$value): ?>
            <div class='book-item'>
                 <div><?=$value['AuthorName']?></div>
                <hr>
                <?=$value['BookTitle'] ?>
                <br>
                <br>
            </div>  
        <?php endforeach ?>
        <br clear='both'>
        <br>
    <div>
         
         
     <div class="pagination">
        <?php
        for($x =1; $x<= $authors_paginate->pages; $x++ ):?>

            <a href="?page=authors&sort=title&order=asc&page_number=<?php echo $x; ?>&per-page=<?php echo $authors_paginate->perPage; ?>"> <?php echo $x; ?>  </a>

        <?php endfor;?>
    </div>
    
</div>