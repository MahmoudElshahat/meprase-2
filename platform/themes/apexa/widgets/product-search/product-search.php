<?php

use Botble\Widget\AbstractWidget;

class ProductSearchWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Product Search'),
            'description' => __('Search products'),
        ]);
    }

    protected function requiredPlugins(): array
    {
        return ['ecommerce'];
    }
}
