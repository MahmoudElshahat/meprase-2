@php
    $backgroundColor = theme_option('footer_background_color', '#FFFFFF');
    $textColor = theme_option('footer_text_color', theme_option('text_color', '#3E4073'));
    $headingColor = theme_option('footer_heading_color', theme_option('primary_color', '#14176C'));
    $backgroundImage = theme_option('footer_background_image');
    $borderColor = theme_option('footer_border_color', '#CFDDE2');
    $bottomBackgroundColor = theme_option('footer_bottom_background_color', '#ECF6FA');
    $backgroundImage = $backgroundImage ? RvMedia::getImageUrl($backgroundImage) : null;
@endphp

{!! dynamic_sidebar('top_footer_sidebar') !!}

<footer id="footer" @style([
    "--footer-background-color: $backgroundColor",
    "--footer-heading-color: $headingColor",
    "--footer-text-color: $textColor",
    "--footer-border-color: $borderColor",
    "--footer-bottom-background-color: $bottomBackgroundColor",
    "--footer-background-image: url($backgroundImage)" => $backgroundImage,
])>
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="row wrapper-footer-widgets">
                    {!! dynamic_sidebar('footer_sidebar') !!}
                </div>
            </div>
        </div>
        <div id="footer-bottom" class="footer-bottom">
            <div class="container">
                <div class="d-flex gap-3 justify-content-center align-items-center bottom-footer-wrapper">
                    {!! dynamic_sidebar('bottom_footer_sidebar') !!}
                </div>
            </div>
        </div>
    </div>
</footer>
