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
}

