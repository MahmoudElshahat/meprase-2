@if (is_plugin_active('language'))
    @php
        $supportedLocales = Language::getSupportedLocales();

        if (empty($options)) {
            $options = [
                'before' => '',
                'lang_flag' => true,
                'lang_name' => true,
                'class' => '',
                'after' => '',
            ];
        }
    @endphp
    @if ($supportedLocales && count($supportedLocales) > 1)
        @php
            $languageDisplay = setting('language_display', 'all');
            $showRelated = setting('language_show_default_item_if_current_version_not_existed', true);
        @endphp

        <div class="language-switcher-mobile">
            <div class="title">{{ __('Language') }}</div>
            <ul class="mt-2 list">
                @foreach ($supportedLocales as $localeCode => $properties)
                    @if ($localeCode != Language::getCurrentLocale())
                        <li class="menu-item mb-1">
                            <a class="mobile-menu-lang-switcher" href="{{ $showRelated ? Language::getLocalizedURL($localeCode) : url($localeCode) }}" target="_self">
                                @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag'))
                                    {!! language_flag($properties['lang_flag']) !!} <span class="ms-1">{{ $properties['lang_name'] }}</span>
                                @endif
                                @if (Arr::get($options, 'lang_name', true) &&  ($languageDisplay == 'name'))
                                    &nbsp;{{ $properties['lang_name'] }}
                                @endif
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif
@endif