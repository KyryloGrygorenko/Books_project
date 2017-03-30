<h1>Books</h1>

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
    
    <button>Go</button>
</form>

<div class='books'>
    <?php foreach ($books as $key => $book) : ?>
        <div class='book-item'>
            <div><?=$book['title']?></div>
            <hr>
            <?=$book['price']?>
            <br>
            <br>
            <a href="/index.php?page=book_item&amp;id=<?=$book['id']?>">Details</a>
        </div>
    <?php endforeach ?>
</div>
<br clear='both'>
