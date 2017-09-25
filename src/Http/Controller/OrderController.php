<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Http\Controller;

use Maverickslab\Integration\BigCommerce\Store\Repository\OrderRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Exception;

/**
 *
 * @author cosman
 *        
 */
class OrderController extends BaseController
{

    /**
     *
     * @var OrderRepository
     */
    protected $repository;

    public function __construct(Request $request, JsonResponse $response, OrderRepository $repository)
    {
        parent::__construct($request, $response);
        
        $this->repository = $repository;
    }

    /**
     * Imports all products from bigcommerce
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getOrderImport(): JsonResponse
    {
        try {
            $importedProducts = $this->repository->import();
            $saveProducts = $this->repository->save(...$importedProducts);
            unset($importedProducts);
            return $this->jsonCollection($saveProducts, count($saveProducts));
        } catch (Exception $e) {
            return $this->exception($e);
        }
    }
}