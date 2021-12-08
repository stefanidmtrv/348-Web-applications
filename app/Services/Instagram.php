<?php
namespace App\Services;

//the twitter class is the service and is 
//contacting the instagram API
//the service container is my application
class Instagram{

    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function instaPost($text){
        $var = $text.$this->apiKey;
        dd($var);
    }
}