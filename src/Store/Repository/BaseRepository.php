<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Repository;

use GuzzleHttp\Psr7\Response;
use Maverickslab\BigCommerce\BigCommerce;
use Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface;
use Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriter;
use stdClass;

/**
 * Base repsitory class
 *
 * @author cosman
 *        
 */
abstract class BaseRepository
{

    /**
     *
     * @var BigCommerce
     */
    protected $bigCommerce;

    /**
     *
     * @var RepositoryWriterInterface
     */
    protected $repositoryWriter;

    public function __construct(BigCommerce $bigCommerce, RepositoryWriterInterface $repositoryWriter = null)
    {
        $this->bigCommerce = $bigCommerce;
        
        $this->repositoryWriter = null === $repositoryWriter ? new RepositoryWriter() : $repositoryWriter;
    }

    /**
     * Decodes a response
     *
     * @param Response $response
     * @param bool $closeStream
     * @return stdClass|NULL
     */
    protected function decodeResponse(?Response &$response, bool $closeStream = true): ?stdClass
    {
        if (null === $response) {
            return null;
        }
        
        $content = json_decode($response->getBody()->getContents());
        
        if ($closeStream) {
            $response->getBody()->close()
        }
        
        // Make BigCommerce API v2 response compactible with v3
        if (! ($content instanceof stdClass) || ! isset($content->data)) {
            $tempContent = new stdClass();
            $tempContent->data = $content;
            
            $content = $tempContent;
        }
        
        return $content;
    }
}