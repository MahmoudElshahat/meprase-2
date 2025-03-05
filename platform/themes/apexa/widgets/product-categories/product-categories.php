<?php

use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\TextField;
use Botble\Ecommerce\Models\ProductCategory;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Theme\Apexa\FormDecorators\PostByCategoriesFormDecorator;

class ProductCategoriesWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Product Categories'),
            'description' => __('Product Categories Widget'),
        ]);
    }

    protected function settingForm(): WidgetForm|string|null
    {
        $form = WidgetForm::createFromArray($this->getConfig())
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
                    ->toArray()
            );

        return PostByCategoriesFormDecorator::createFrom($form);

    }

    protected function data(): array|Collection
    {
        $config = $this->getConfig();

        $categoryIds = Arr::get($config, 'category_ids', []);

        $categories = collect();

        if (! $categoryIds) {
            return compact('categories');
        }

        $categories = ProductCategory::query()
            ->with('slugable')
            ->withCount('products')
            ->wherePublished()
            ->whereIn('id', $categoryIds)
            ->get();

        return compact('categories');
    }

    protected function requiredPlugins(): array
    {
        return ['ecommerce'];
    }
}
