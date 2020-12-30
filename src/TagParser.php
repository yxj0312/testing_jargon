<?php

namespace App;

class TagParser {
    public function parse(string $tags): array
    {
        // ? means the previous char or set is optional
        // Look for comma and then a  space, and that space is optional
        // [ ] means char classes: provide a list of char, that are acceptable
        // I accept one either a comma or a pipe
        
        // Option 1
        // $tags = preg_split('/[,|] ?/', $tags);

        // return array_map(function ($tag){
        //     return trim($tag);
        // }, $tags);

        // return array_map(fn($tag) => trim($tag), $tags);

        // Option 2

        return preg_split('/ ?[,|!] ?/', $tags);
    }
}