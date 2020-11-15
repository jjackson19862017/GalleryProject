<?php 

class Paginate {
    public $current_page;
    public $items_per_page;
    public $items_total_count;


    public function __construct($page, $items_per_page, $items_total_count){
        $this->current_page =(int)$page;
        $this->items_per_page =(int)$items_per_page;
        $this->items_total_count =(int)$items_total_count;

    } // End of construct

    public function next() {
        return $this->current_page + 1;
    } // End of next

    public function previous() {
        return $this->current_page - 1;
    } // End of previous

    public function page_total() {
        return ceil($this->items_total_count / $this->items_per_page); // Info Rounds up to the nearest integer
    } // End of page_total 

    public function has_previous()
    {
        return $this->previous() >= 1 ? true : false;
    } // End of has_previous 


    public function has_next()
    {
        return $this->next() <= $this->page_total() ? true : false;
    } // End of has_next 

    public function offset()
    {
        return ($this->current_page - 1) * $this->items_per_page;
    } // End of offset 
    




    
} // End of Paginate 

?>