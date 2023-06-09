<?php

namespace app\notas\models;
use app\notas\libs\Database;

class Note extends Database{

    private string $uuid;

    public function __construct(private string $title, private string $content)
    {
        parent::__construct();

        $this->uuid = uniqid();
    }
    public function save(){
        $query = $this->connect()->prepare("INSERT INTO notes (uuid, title, content, updated) VALUES(:uuid, :title, :content, NOW()");
        $query->execute(['title' => $this->title, 'uuid' => $this->uuid, 'content' => $this->content]);

    }

    public function update(){
        $query  = $this->connect()->prepare("UPDATE notes SET title = :title, content = :content, updated = NOW() WHERE uuid = :uuid");
        $query->execute(['title' => $this->title, 'uuid' => $this->uuid, 'content' => $this->content])
    }

    public function getUUID(){
        return $this->uuid;
    }

    public function setUUID($value){
        $this->uuid = $value;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($value){
        $this->title = $value;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($value){
        $this->content = $value;
    }
}

