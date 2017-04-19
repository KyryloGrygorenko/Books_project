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
    <div class='books'>
        <?php 
        foreach ($authors as $key=>$value): ?>
            <div class='book-item'>
            <div><?=$authors[$key]['AuthorName']?></div>
            <hr>
            <?=$authors[$key]['BookTitle']?>
            <br>
            <br>
          
            </div>
        <?php endforeach ?>
     <div>
         <br clear='both'>