<?php

namespace App\Image\Filter;

use App\Image\Filter\Contracts\FilterInterface;

class Rotate extends FilterAbstract implements FilterInterface
{
    
    function __invoke($options)
    {
        return $this->apply($options);
    }
    
    public function apply(array $options)
    {
        if ( ! is_numeric($options[0])) {
            $this->image;
        };
        $this->image->rotate($options[0] ?? 0, $options[1] ?? null);
        
        return $this->image;
    }
}