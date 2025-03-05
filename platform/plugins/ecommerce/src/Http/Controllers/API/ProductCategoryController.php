<?php

namespace Botble\Ecommerce\Http\Controllers\API;

use Botble\Base\Http\Controllers\BaseController;
use Botble\Ecommerce\Http\Requests\API\CategoryRequest;
use Botble\Ecommerce\Http\Resources\API\ProductCategoryResource;
use Botble\Ecommerce\Models\ProductCategory;
use Illuminate\Http\JsonResponse;

class ProductCategoryController extends BaseController
{
    /**
     * Get list of product categories
     *
     * @group Product Categories
     * @param CategoryRequest $request
     * @queryParam categories nullable array List of category IDs if you need filter by categories, (e.g. [1,2,3]). No-example
     * @queryParam page int Page number. Default: 1. No-example
     * @queryParam per_page int Number of items per page. Default: 16. No-example
     *
     * @return JsonResponse
     */
    public function index(CategoryRequest $request)
    {
        $categories = ProductCategory::query()
            ->wherePublished()
            ->orderBy('order')
            ->orderBy('created_at', 'DESC')
            ->when($request->input('categories'), function ($query, $categoryIds) {
                return $query->whereIn('id', $categoryIds);
            })
            ->when($request->has('is_featured'), function ($query) use ($request) {
                return $query->where('is_featured', $request->boolean('is_featured'));
            })
            ->paginate(config('ecommerce.pagination.per_page', 16));

        return $this
            ->httpResponse()
            ->setData(ProductCategoryResource::collection($categories))
            ->toApiResponse();
    }
}
