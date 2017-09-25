<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Http\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

/**
 * Base controller
 *
 * @author cosman
 *        
 */
class BaseController
{

    /**
     *
     * @var Request
     */
    protected $request;

    /**
     *
     * @var JsonResponse
     */
    protected $response;

    public function __construct(Request $request, JsonResponse $response)
    {
        $this->request = $request;
        
        $this->response = $response;
    }

    /**
     * Composes a JSON response
     *
     * @param mixed $payload
     * @param int $httpCode
     * @param string $message
     * @param array $headers
     * @return JsonResponse
     */
    protected function respond($payload = null, int $httpCode = JsonResponse::HTTP_OK, string $message = 'OK', array $headers = []): JsonResponse
    {
        return $this->response->setData(array(
            'code' => $httpCode,
            'message' => $message,
            'payload' => $payload
        ));
    }

    /**
     * Returns a given payload as a JSON response
     *
     * @param mixed $payload
     * @return JsonResponse
     */
    protected function json($payload = null): JsonResponse
    {
        return $this->respond($payload);
    }

    /**
     * Returns a collection as a JSON reponse
     *
     * @param array $collection
     * @param int $total
     * @param int $page
     * @return JsonResponse
     */
    protected function jsonCollection(array $collection = [], int $total = 0, int $page = 1): JsonResponse
    {
        return $this->respond(array(
            'collection' => $collection,
            'total' => $total,
            'page' => $page
        ));
    }

    /**
     * Returns an error as a JSON response
     *
     * @param mixed $payload
     * @param int $httpCode
     * @param string $message
     * @return JsonResponse
     */
    protected function error($payload = null, int $httpCode = JsonResponse::HTTP_INTERNAL_SERVER_ERROR, string $message = null): JsonResponse
    {
        return $this->respond($payload, $httpCode, $message);
    }

    /**
     * Converts a given exception to a JSON response
     *
     * @param \Exception $exception
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function exception(\Exception $exception): JsonResponse
    {
        $code = JsonResponse::HTTP_INTERNAL_SERVER_ERROR;
        $payload = null;
        $message = $exception->getMessage();
        
        if (($exception instanceof ServerException) || ($exception instanceof ClientException) && $exception->hasResponse()) {
            $responseData = json_decode($exception->getResponse()
                ->getBody()
                ->getContents());
            $code = $responseData->data->status;
            $message = $responseData->title;
        }
        
        return $this->respond($payload, $code, $message);
    }
}