<?php

namespace Botble\Portfolio\Forms;

use Botble\Base\Forms\FieldOptions\DescriptionFieldOption;
use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\Portfolio\Http\Requests\ServiceCategoryRequest;
use Botble\Portfolio\Models\ServiceCategory;

class ServiceCategoryForm extends FormAbstract
{
    public function setup(): void
    {
        $this
            ->setupModel(new ServiceCategory())
            ->setValidatorClass(ServiceCategoryRequest::class)
            ->add('name', TextField::class, NameFieldOption::make()->required()->toArray())
            ->add('parent_id', 'customSelect', [
                'label' => trans('core/base::forms.parent'),
                'attr' => [
                    'class' => 'select-search-full',
                ],
                'choices' => ['' => trans('plugins/portfolio::portfolio.form.none')] + ServiceCategory::query()
                        ->where('parent_id', null)
                        ->pluck('name', 'id')
                        ->all(),
            ])
            ->add('description', TextareaField::class, DescriptionFieldOption::make()->toArray())
            ->add('order', 'number', [
                'label' => trans('core/base::forms.order'),
                'attr' => [
                    'placeholder' => trans('core/base::forms.order_by_placeholder'),
                ],
                'default_value' => 0,
            ])
            ->add('status', SelectField::class, StatusFieldOption::make()->toArray())
            ->add('image', 'mediaImage')
            ->setBreakFieldPoint('status');
    }
}
