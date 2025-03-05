@php
    Theme::set('pageTitle', __('Team Details'))
@endphp

<section class="team__details-area">
    <div class="container">
        <div class="team__details-inner">
            <div class="row align-items-center">
                @if($image = $team->photo)
                    <div class="col-36">
                        <div class="team__details-img">
                            {{ RvMedia::image($image, $team->name, 'medium-square') }}
                        </div>
                    </div>
                @endif

                <div class="{{ $image ? 'col-64' : 'col-100' }}">
                    <div class="team__details-content">
                        <h2 class="title">{{ $team->name }}</h2>

                        @if ($title = $team->title)
                            <span class="position">{!! BaseHelper::clean($title) !!}</span>
                        @endif

                        @if ($description = $team->description)
                            <p>{!! Basehelper::clean($description) !!}</p>
                        @endif
                        <div class="team__details-info">
                            <ul class="list-wrap">
                                @if($phone = $team->phone)
                                    <li>
                                        <i class="flaticon-phone-call"></i>
                                        <a href="tel:{{ $phone }}">{!! BaseHelper::clean($phone) !!}</a>
                                    </li>
                                @endif

                                @if ($email = $team->email)
                                    <li>
                                        <i class="flaticon-mail"></i>
                                        <a href="mailto:{{ $email }}">{!! BaseHelper::clean($email) !!}</a>
                                    </li>
                                @endif

                                @if ($address = $team->address)
                                    <li>
                                        <i class="flaticon-pin"></i>
                                        {!! Basehelper::clean($address) !!}
                                    </li>
                                @endif

                                @if($socials = $team->socials)
                                    <li>
                                        <i class="fas fa-share-alt"></i>
                                        <ul class="list-wrap team__details-social">
                                            @foreach($socials as $name => $social)
                                                @continue(! $social)
                                                <li>
                                                    <a href="{{ $social }}">
                                                        <x-core::icon name="ti ti-brand-{{ $name === 'twitter' ? 'x' : $name }}"/>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @if($content = $team->content)
                <div class="content">
                    {!! BaseHelper::clean($content) !!}
                </div>
            @endif
        </div>
    </div>
</section>
