<?php
class Pagination
{
    public $db;
    public $sortField='';
    public $sortOrder='';
    
    public $page_book='';
    public $perPage='';
    
    public $start ='';
    
    public $books;
    
    public $total='';
    public $pages='';
    
    
    public function set_db($db)
    {
        $this->db=$db;
    }
    
    public  function Paginate()
    {   
         $this->sortField = requestGet('sort', 'price');
        if (!in_array(strtolower($this->sortField), getSortedFields())) {
             $this->sortField = 'price';
        }
        
        $this->sortOrder= requestGet('order', 'asc');
        if (!in_array(strtolower($this->sortOrder), ['asc', 'desc'])) {
             $this->sortOrder = 'asc';
            }
        
        $this->page_book = isset($_GET['page_book']) ? $_GET['page_book'] : 1;
        $this->perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 40 ? $_GET['per-page'] : 10;
        
        $this->start= ($this->page_book > 1)? ($this->page_book * $this->perPage)- $this->perPage : 0;
        $this->books=$this->db->prepare("select * from book where status = 1 order by {$this->sortField} {$this->sortOrder} LIMIT $this->page_book,$this->perPage");
        $this->books->execute();
        $this->books=$this->books->fetchAll(PDO::FETCH_ASSOC); 
        $this->total=$this->db->query("SELECT count(id) as total FROM `book` WHERE status=1")->fetch()['total'];
        $this->pages= ceil($this->total / $this->perPage);
       
    }






//Pages


}