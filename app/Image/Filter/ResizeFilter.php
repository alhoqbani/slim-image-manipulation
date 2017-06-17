<?php

namespace App\Image\Filter;

use App\Image\Filter\Contracts\FilterInterface;
use Intervention\Image\Image;

class ResizeFilter extends FilterAbstract implements FilterInterface
{
    
    public function apply(array $options)
    {
        // TODO: Implement apply() method.
    }
    
    /**
     * Applies filter to given image
     *
     * @param  \Intervention\Image\Image $image
     *
     * @return \Intervention\Image\Image
     */
    public function applyFilter(Image $image)
    {
        // TODO: Implement applyFilter() method.
    }
}