<?php
class Pagination
{
    public $db;
    public $sortField;
    public $sortOrder;
    public $page_number;
    public $perPage;
    public $start;
    public $items;
    public $total;
    public $pages;
    
    
    public function set_db($db)
    {
        $this->db=$db;
    }
    
    
    
    public function __construct()
	{
		$this->sortField = requestGet('sort', 'price');
        if (!in_array(strtolower($this->sortField), getSortedFields())) {
             $this->sortField = 'price';
        }
        
        $this->sortOrder= requestGet('order', 'asc');
        if (!in_array(strtolower($this->sortOrder), ['asc', 'desc'])) {
             $this->sortOrder = 'asc';
        }
        
        $this->page_number = isset($_GET['page_number']) ? $_GET['page_number'] : 1;
        $this->perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 40 ? $_GET['per-page'] : 10;
        
        $this->start= ($this->page_number > 1)? ($this->page_number * $this->perPage)- $this->perPage : 0;
	}
    
    public  function Paginate($query,$query_count)
    {   
        $this->items=$this->db->prepare($query);
        $this->items->execute();
        $this->items=$this->items->fetchAll(PDO::FETCH_ASSOC); 
        $this->total=$this->db->query($query_count)->fetch()['total'];
        $this->pages= ceil($this->total / $this->perPage);
    }

}