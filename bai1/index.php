<?php
    class MyRectangle{
        public $a, $b;
        function Cong2So($a, $b){
            return $a + $b;
        }
        function get(){
            return $this->Cong2So($this->a, $this->b);
        }
    }

    $r = new MyRectangle();
    $r->a = 10;
    $r->b = 20;
    echo $r->get();
?>