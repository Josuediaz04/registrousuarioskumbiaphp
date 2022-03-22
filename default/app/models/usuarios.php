<?php 
    class Usuarios extends ActiveRecord{
        public function getUsuarios($page,$ppage=20){
         return $this->paginate("page: $page ", "per_page: $ppage", 'order: id asc');
        }
    }

?>