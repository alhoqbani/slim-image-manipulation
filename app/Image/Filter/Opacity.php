<?php

namespace App\Image\Filter;

use App\Image\Filter\Contracts\FilterInterface;

class Opacity extends FilterAbstract implements FilterInterface
{
    
    public function apply(array $options)
    {
        if ($this->notInRange($options[0], 0, 100)) {
            return $this->image;
        }
//        $this->image->opacity($options[0]); // Peroformance !! will exceed time
        
        return $this->image;
    }
}