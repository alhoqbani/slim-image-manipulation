<?php

namespace App\Image\Filter;

use App\Image\Filter\Contracts\FilterInterface;

class Greyscale extends FilterAbstract implements FilterInterface
{
    
    function __invoke($options)
    {
        return $this->apply($options);
    }
    
    public function apply($options)
    {
        $this->image->greyscale();
        
        return $this->image;
    }
}