<?php

namespace App\Storage;

use App\Storage\Contracts\StorageInterface;
use App\Storage\Exceptions\FileNotFoundException;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;

class S3Storage implements StorageInterface
{
    
    /**
     * @var \Aws\S3\S3Client
     */
    private $client;
    /**
     * @var array
     */
    private $config;
    
    
    /**
     * S3Storage constructor.
     *
     * @param \Aws\S3\S3Client $client
     * @param array            $config
     */
    public function __construct(S3Client $client, array $config)
    {
        $this->client = $client;
        $this->config = $config;
    }
    
    /**
     * @param $filename
     *
     * @return \GuzzleHttp\Psr7\Stream|null
     */
    public function get($filename)
    {
        try {
            return $this->client->getObject([
                'Bucket' => $this->config['bucket_name'],
                'Key'    => $filename,
            ])->get('Body');
        } catch (S3Exception $e) {
            $exception = $this->routeException($e);
            throw $exception;
        }
    }
    
    public function getClient()
    {
        return $this->client;
    }
    
    protected function routeException(S3Exception $e)
    {
        if ($e->getAwsErrorCode() == 'NoSuchKey') {
            throw new FileNotFoundException('The required file could not be found');
        } else {
            return $e;
        }
    }
}