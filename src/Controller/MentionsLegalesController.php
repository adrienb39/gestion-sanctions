<?php

namespace App\Controller;

class MentionsLegalesController
{
    public function mentionsLegales() {
        require __DIR__ . "/../../templates/mentions/legal.php";
    }
}