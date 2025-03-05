<?php

use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Portfolio\Models\Service;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class ServicesWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Services Widget'),
            'description' => __('Widget description'),
        ]);
    }

    protected function data(): array|Collection
    {
        $config = $this->getConfig();

        $services = Service::query()
            ->with(['slugable'])
            ->wherePublished()
            ->whereIn('id', Arr::get($config, 'service_ids', []))
            ->get();

        return compact('services');
    }

    public function settingForm(): ?WidgetForm
    {
        return WidgetForm::createFromArray($this->getConfig())
            ->add(
                'service_ids',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(__('Services'))
                    ->choices(Service::query()->wherePublished()->pluck('name', 'id')->toArray())
                    ->searchable()
                    ->multiple()
                    ->toArray()
            );
    }

    protected function requiredPlugins(): array
    {
        return ['portfolio'];
    }
}
