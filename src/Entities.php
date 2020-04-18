<?php
require_once 'Entity.php';
class EntityRepository
{
    protected $Entities = array();

    public function __construct()
    {
        $this->Entities = array(new Entity("Metal"), new Entity("Space Plankton"));
    }
    public function GetRandomEntity(){
        $m = sizeof($this->Entities);
        $i = rand(0,$m-1);
        return($this->Entities[$i]);
    }
}