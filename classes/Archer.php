<?php

class Archer extends Character
{
    private $weakPoint = false;
    private $twoArrows = false;

    public function __construct($name) {
        parent::__construct($name);
        $this->damage = 12;
        $this->arrows = 5;
    }

    public function turn($target) {
        $rand = rand(1, 10);
        if ($this->arrows == 0) {
            $status = $this->dagger($target)." Flèches: $this->arrows";

        } else if ($rand > 8 && !$this->weakPoint && !$this->twoArrows) {
            $status = $this->weakpoint($target)." Flèches: $this->arrows";

        } else if ($this->arrows >=2 && ($rand <= 8 && $rand > 6) && !$this->twoArrows && !$this->weakPoint){
            $status = $this->twoArrows($target)." Flèches: $this->arrows";

        } else {
            $status = $this->attack($target)." Flèches: $this->arrows";
        }
        return $status ;
    }

    public function attack($target) {
        if ($this->weakPoint) {
            $rand = rand(15, 30)/10;
            $weakPointDamage = $this->damage * $rand;
            $target->setHealthPoints($weakPointDamage);
            $this->arrows -= 1;
            $status = "$this->name tir en plein dans le mille de $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
            $this->weakPoint = false;

        } else if ($this->twoArrows){
            $twoArrowsDamage = $this->damage * 2;
            $target->setHealthPoints($twoArrowsDamage);
            $this->arrows -= 2;
            $status = "$this->name tir deux fléches sur $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
            $this->twoArrows = false;

        }  else {
            $target->setHealthPoints($this->damage);
            $this->arrows -= 1;
            $status = "$this->name tir une fléche sur $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
            
        }
        
        return $status;
    }

    public function weakPoint() {
        $this->weakPoint = true;
        $status = "$this->name vise un point faible !";
        return $status;
    }

    public function twoArrows(){
        $this->twoArrows = true;
        $status = "$this->name sort 2 flèches !";
        return $status;
    }

    public function dagger($target) {
        $dagger = $this->damage/2;
        $target->setHealthPoints($dagger);
        $status = "$this->name donne un coup de dague à $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }
}