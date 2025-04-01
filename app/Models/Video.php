<?php

namespace App\Models;

class Video {
    public function __construct(
        public string $slug,
        public string $name,
        public string $description,
    ) {}
}
