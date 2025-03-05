<?php

use ArchiElite\Announcement\Models\Announcement;
use Botble\Base\Facades\BaseHelper;
use Botble\Shortcode\View\View;
use Botble\Theme\Theme;
use Theme\Apexa\Support\ThemeHelper;

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these events can be overridden by package config.
    |
    */

    'events' => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function ($theme): void {
            // You can remove this line anytime.
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function (Theme $theme): void {
            $version = get_cms_version() . '.1';

            // You may use this event to set up your assets.
            $theme->asset()->container('footer')->usePath()->add('jquery', 'plugins/jquery/jquery.min.js');
            $theme->asset()->container('footer')->usePath()->add('jquery-parallax-scroll-js', 'plugins/jquery/jquery.parallaxScroll.min.js');
            $theme->asset()->container('footer')->usePath()->add('jquery-appear-js', 'plugins/jquery/jquery.appear.js');
            $theme->asset()->container('footer')->usePath()->add('jquery-odometer-js', 'plugins/odometer/jquery.odometer.min.js');
            $theme->asset()->container('footer')->usePath()->add('jquery-magnific-popup-js', 'plugins/magnific-popup/jquery.magnific-popup.min.js');
            $theme->asset()->container('footer')->usePath()->add('bootstrap-js', 'plugins/bootstrap/bootstrap.bundle.min.js');
            $theme->asset()->container('footer')->usePath()->add('swiper-js', 'plugins/swiper/swiper-bundle.js');
            $theme->asset()->container('footer')->usePath()->add('aos-js', 'plugins/aos/aos.js');
            $theme->asset()->container('footer')->usePath()->add('wow-js', 'plugins/wow/wow.min.js');
            $theme->asset()->container('footer')->usePath()->add('scroll-trigger-js', 'js/ScrollTrigger.js');

            if (ThemeHelper::isSupportSplitText()) {
                $theme->asset()->container('footer')->usePath()->add('split-text-js', 'js/SplitText.js');
            }

            $theme->asset()->container('footer')->usePath()->add('gsap-js', 'plugins/gsap/gsap.js');
            $theme->asset()->container('footer')->usePath()->add('gsap-animation-js', 'plugins/gsap/gsap-animation.js');
            $theme->asset()->container('footer')->usePath()->add('main-js', 'js/main.js', [], [], $version);

            if (BaseHelper::isRtlEnabled()) {
                $theme->asset()->usePath()->add('bootstrap-css', 'plugins/bootstrap/bootstrap.rtl.min.css');
            } else {
                $theme->asset()->usePath()->add('bootstrap-css', 'plugins/bootstrap/bootstrap.min.css');
            }

            $theme->asset()->usePath()->add('odometer-css', 'plugins/odometer/odometer.css');
            $theme->asset()->usePath()->add('magnific-popup-css', 'plugins/magnific-popup/magnific-popup.css');
            $theme->asset()->usePath()->add('swiper-css', 'plugins/swiper/swiper-bundle.css');
            $theme->asset()->usePath()->add('aos-css', 'plugins/aos/aos.css');
            $theme->asset()->usePath()->add('animate-css', 'css/animate.min.css');
            $theme->asset()->usePath()->add('fontawesome-all-css', 'css/fontawesome-all.min.css');
            $theme->asset()->usePath()->add('flaticon-css', 'css/flaticon.css');
            $theme->asset()->usePath()->add('default-css', 'css/default.css');

            if (is_plugin_active('ecommerce')) {
                $theme->asset()->usePath()->add('ecommerce-css', 'css/ecommerce.css');
            }

            $theme->asset()->usePath()->add('style', 'css/style.css', [], [], $version);

            if (function_exists('shortcode')) {
                $theme->composer(['page', 'post', 'portfolio.service', 'portfolio.project', 'career.career'], function (View $view) {
                    $view->withShortcodes();
                });
            }

            if (is_plugin_active('announcement') && Announcement::query()->available()->exists()) {
                $theme->addBodyAttributes(['data-bb-toggle' => 'announcement',  'data-bb-target' => 'header']);
            }
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [
            'default' => function ($theme): void {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            },
        ],
    ],
];
