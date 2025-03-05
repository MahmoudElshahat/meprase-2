<?php

namespace Botble\Ecommerce\Http\Controllers\API;

use Botble\Base\Http\Controllers\BaseController;
use Botble\Ecommerce\Facades\EcommerceHelper;
use Botble\Ecommerce\Http\Resources\API\AvailableProductResource;
use Botble\Ecommerce\Models\Product;
use Botble\Ecommerce\Services\Products\GetProductService;
use Botble\Slug\Facades\SlugHelper;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    /**
     * Get list of products
     *
     * @group Products
     * @param Request $request
     * @param GetProductService $productService
     * @queryParam include string Comma-separated list of relations to include (e.g. 'categories,tags'). No-example
     * @queryParam is_featured int Filter by featured status (0 or 1). No-example
     * @queryParam category string Filter by category slug. No-example
     * @queryParam tag string Filter by tag slug. No-example
     * @queryParam brand string Filter by brand slug. No-example
     * @queryParam categories string[] Filter by category IDs. No-example
     * @queryParam brands string[] Filter by brand IDs. No-example
     * @queryParam collections string[] Filter by collection IDs. No-example
     * @queryParam search string Search term. No-example
     * @queryParam order_by string Sort field. No-example
     * @queryParam order string Sort direction (asc or desc). No-example
     * @queryParam per_page int Number of items per page. No-example
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, GetProductService $productService)
    {
        $with = EcommerceHelper::withProductEagerLoadingRelations();

        $products = $productService->getProduct($request, null, null, $with);

        return $this
            ->httpResponse()
            ->setData(AvailableProductResource::collection($products))
            ->toApiResponse();
    }

    /**
     * Get product details by slug
     *
     * @group Products
     * @param string $slug Product slug
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    public function show(string $slug)
    {
        $slug = SlugHelper::getSlug($slug, SlugHelper::getPrefix(Product::class));

        if (! $slug) {
            abort(404);
        }

        $product = Product::query()
            ->where([
                'id' => $slug->reference_id,
            ])
            ->firstOrFail();

        return $this
            ->httpResponse()
            ->setData(new AvailableProductResource($product))
            ->toApiResponse();
    }
}
