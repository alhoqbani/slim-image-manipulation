<?php

namespace App\Image\Filter;

use App\Image\Filter\Contracts\FilterInterface;

class Rotate extends FilterAbstract implements FilterInterface
{
    
    function __invoke($options)
    {
        return $this->apply($options);
    }
    
    public function apply($options)
    {
        $this->image->rotate($options);
        
        return $this->image;
    }
}