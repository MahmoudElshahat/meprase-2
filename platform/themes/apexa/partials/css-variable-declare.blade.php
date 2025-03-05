<style>
    :root {
        --primary-color: {{ $primaryColor = theme_option('primary_color', '#F7A400') }} !important;
        --secondary-color: {{ theme_option('secondary_color', '#191D88') }} !important;
        --heading-color: {{ theme_option('heading_color', '#14176C') }} !important;
        --text-color: {{ theme_option('text_color', '#3E4073') }} !important;
        --primary-font: {{ theme_option('tp_primary_font', 'Inter') }} !important;
        --heading-font: {{ theme_option('tp_secondary_font', 'Outfit') }} !important;
    }
</style>
