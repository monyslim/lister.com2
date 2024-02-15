<?php 


class Cat{


	public $name;

	public $skin_color;
	public $height;

	public function __construct($name){
		$this->name = $name;
	}

	public function make_sound($sound){

		echo "{$this->name} is {$sound}ing<br>";

	}
}



$lion = new Cat('lion');


$cat = new Cat('cat');


$lion->make_sound('Roar');


$cat->make_sound('Meow');


