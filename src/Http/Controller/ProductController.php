<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Http\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Maverickslab\Integration\BigCommerce\Store\Repository\ProductRepository;
use Exception;

/**
 * Product controller
 *
 * @author cosman
 *        
 */
class ProductController extends BaseController
{

    /**
     *
     * @var ProductRepository
     */
    protected $repository;

    /**
     *
     * @param Request $request
     * @param JsonResponse $response
     * @param ProductRepository $repository
     */
    public function __construct(Request $request, JsonResponse $response, ProductRepository $repository)
    {
        parent::__construct($request, $response);
        
        $this->repository = $repository;
    }

    /**
     * Imports all products from BigCommerce
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getProductImport(): JsonResponse
    {
        try {
            $importedProducts = $this->repository->import();
            $savedProducts = $this->repository->save(...$importedProducts);
            unset($importedProducts);
            return $this->jsonCollection($savedProducts, count($savedProducts));
        } catch (Exception $e) {
            return $this->exception($e);
        }
    }

    /**
     * Posts new products to BigCommerce, with copies saved locally
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function postProduct(): JsonResponse
    {
        // TODO: Accept and validate user inputs
        $products = [];
        
        try {
            $savedProducts = $this->repository->save(...$products);
            $exporedProducts = $this->repository->export(...$savedProducts);
            return $this->jsonCollection($exporedProducts, count($exporedProducts));
        } catch (Exception $e) {
            return $this->exception($e);
        }
    }
}