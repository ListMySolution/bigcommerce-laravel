<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Http\Controller;

use Maverickslab\Integration\BigCommerce\Store\Repository\ProductCategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Exception;

/**
 * Product category controller
 *
 * @author cosman
 *        
 */
class ProductCategoryController extends BaseController
{

    /**
     *
     * @var ProductCategoryRepository
     */
    protected $repository;

    /**
     *
     * @param Request $request
     * @param JsonResponse $response
     * @param ProductCategoryRepository $repository
     */
    public function __construct(Request $request, JsonResponse $response, ProductCategoryRepository $repository)
    {
        parent::__construct($request, $response);
        
        $this->repository = $repository;
    }

    /**
     * Import product categories from BigCommerce
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getCategoriesImport(): JsonResponse
    {
        try {
            $importedCategories = $this->repository->import();
            $savedCategories = $this->repository->save(...$importedCategories);
            unset($importedCategories);
            return $this->jsonCollection($savedCategories, count($savedCategories));
        } catch (Exception $e) {
            return $this->exception($e);
        }
    }

    /**
     * Exports a collection of categories to BigCommerce
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function postCategoriesExport(): JsonResponse
    {
        // TODO:: Accept and validate user input
        $categories = [];
        try {
            $exportedCategories = $this->repository->export($categories);
            
            return $this->jsonCollection($exportedategories, count($exportedategories));
        } catch (Exception $e) {
            return $this->exception($e);
        }
    }
}