<?php

namespace App\Image\Filter;

use App\Image\Filter\Contracts\FilterInterface;
use Intervention\Image\Constraint;

class Resize extends FilterAbstract implements FilterInterface
{
    
    public function apply(array $options)
    {
        $this->image->resize(
            $options[0] ?? null, $options[1] ?? null, function (Constraint $constraint) use ($options) {
            if (in_array('upsize', $options)) {
                $constraint->upsize();
            }
            if (in_array('ratio', $options)) {
                $constraint->aspectRatio();
            }
        });
        
        return $this->image;
    }
}