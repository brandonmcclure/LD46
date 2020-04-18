<?php
interface StringRepositoryInterface
{
    public function find($name);
}

class StringHardcodedRepository implements StringRepositoryInterface
{
    protected $strings = array(
        "IntroText" => "You awake in darkness, a new being spawned into existence. What do you do?"
    );

    public function find($name){
        return($this->strings[$name]);
    }
}