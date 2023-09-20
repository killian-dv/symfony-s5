<?php

namespace App\Services;

use Symfony\Component\String\Slugger\AsciiSlugger;
class Slugify
{
    public function generateSlug(string $inputText): string
    {
        $slugger = new AsciiSlugger();
        $slug = $slugger->slug($inputText);

        return $slug;
    }
}