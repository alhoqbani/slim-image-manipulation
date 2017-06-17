<?php

namespace App\Http\Controllers;

use App\Models\User;
use Intervention\Image\ImageManagerStatic;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Storage\Exceptions\FileNotFoundException;

/**
 * @property  \Slim\Views\Twig      $view
 * @property  \Slim\Router          router
 * @property \App\Storage\S3Storage $storage
 * @property \App\Image\Manipulator image
 */
class HomeController extends BaseController
{
    
    /**
     * Index Page
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param                                          $args
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        try {
            $file = $this->storage->get($args['path'])->getContents();
            
            $image = $this->image->load($file);
            
        } catch (FileNotFoundException $e) {
            return $response->withStatus(404)->write($e->getMessage());
        }
        
        return $response->withHeader('Content-Type', 'image/jpg')->write($image->stream());
    }
}
