<?php

namespace App\Image;

use App\Image\Filter\Greyscale;
use Intervention\Image\ImageManager;

class Manipulator
{
    
    /**
     * @var \Intervention\Image\ImageManager
     */
    protected $manger;
    
    /**
     * @var \Intervention\Image\Image
     */
    protected $image;
    /**
     * @var array
     */
    private $availableFilters;
    
    /**
     * Manipulator constructor.
     *
     * @param \Intervention\Image\ImageManager $manger
     * @param array                            $filters
     */
    public function __construct(ImageManager $manger, array $filters)
    {
        $this->manger = $manger;
        $this->availableFilters = $filters;
    }
    
    public function load($file)
    {
        $this->image = $this->manger->make($file);
        
        return $this;
    }
    
    public function stream()
    {
        return $this->image->stream();
    }
    
    public function withFilters(array $filters)
    {
        
        foreach ($filters as $filter => $options) {
            if (array_key_exists($filter, $this->availableFilters)) {
                $filter = $this->availableFilters[$filter];
                (new $filter($this->image))($options);
            };
        }
        
        return $this;
    }
    
    
}