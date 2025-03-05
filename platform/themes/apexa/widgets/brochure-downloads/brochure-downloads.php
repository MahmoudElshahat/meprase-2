<?php

use Botble\Base\Forms\FieldOptions\InputFieldOption;
use Botble\Base\Forms\FieldOptions\TextareaFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\MediaFileField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;
use Illuminate\Support\Collection;

class BrochureDownloadsWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Brochure Downloads'),
            'description' => __('Brochure Downloads Widget'),
        ]);
    }

    protected function data(): array|Collection
    {
        $config = $this->getConfig();

        $files = [];

        foreach ($config as $key => $value) {
            if (str_starts_with($key, 'file_') && $value) {
                $files[] = $value;
            }
        }

        $files = array_filter($files);

        $fileData = [];

        foreach ($files as $file) {
            $icon = match (pathinfo($file, PATHINFO_EXTENSION)) {
                'pdf' => 'ti ti-file-type-pdf',
                'zip' => 'ti ti-file-zip',
                'doc', 'docx' => 'ti ti-file-type-doc',
                'xls', 'xlsx' => 'ti ti-file-type-xls',
                'ppt', 'pptx' => 'fa fa-file-powerpoint',
                default => 'ti ti-file',
            };

            $fileData[] = [
                'url' => route('public.download-file', ['filePath' => $file]),
                'name' => pathinfo($file, PATHINFO_FILENAME),
                'icon' => $icon,
            ];
        }

        return compact('fileData');
    }

    public function settingForm(): WidgetForm
    {
        return WidgetForm::createFromArray($this->getConfig())
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
            )
            ->add(
                'description',
                TextareaField::class,
                TextareaFieldOption::make()
                    ->label(__('Description'))
            )
            ->add(
                'file_1',
                MediaFileField::class,
                InputFieldOption::make()
                    ->label(__('File :number', ['number' => 1]))
            )
            ->add(
                'file_2',
                MediaFileField::class,
                InputFieldOption::make()
                    ->label(__('File :number', ['number' => 2]))
            )
            ->add(
                'file_3',
                MediaFileField::class,
                InputFieldOption::make()
                    ->label(__('File :number', ['number' => 3]))
            );
    }
}
