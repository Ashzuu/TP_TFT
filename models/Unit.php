<?php

class Unit 
{
    private string $id;
    private string $name;
    private int $cost;
    private string $origin;
    private string $url_img;

    public function get_id():string 
    {
        return $this->id;
    }

    public function get_name():string 
    {
        return $this->name;
    }

    public function get_cost():int 
    {
        return $this->cost;
    }

    public function get_origin():string 
    {
        return $this->origin;
    }

    public function get_url_img():string 
    {
        return $this->url_img;
    }


    public function set_id(string $id):void 
    {
        $this->id = $id;
    }

    public function set_name(string $name):void 
    {
        $this->name = $name;
    }

    public function set_cost(int $cost):void 
    {
        $this->cost = $cost;
    }

    public function set_origin(string $origin):void 
    {
        $this->origin = $origin;
    }

    public function set_url_img(string $url_img):void 
    {
        $this->url_img = $url_img;
    }

}