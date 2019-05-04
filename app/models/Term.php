<?php

class Term extends Eloquent {
    public function getLastYear(){
        return Term::orderBy('year','DESC')->first()->year;
    }
}
