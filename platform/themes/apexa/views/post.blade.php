@php
    $blogSidebar = dynamic_sidebar('blog_sidebar');
    Theme::set('pageTitle', __('Blog Details'))
@endphp

<section class="blog__details-area">
    <div class="container">
        <div class="blog__inner-wrap">
            <div class="row">
                <div class="{{ $blogSidebar ? 'col-lg-8' : 'col-12' }}">
                    <div class="blog__details-wrap">
                        @if($image = $post->image)
                            <div class="blog__details-thumb">
                                @if (defined('GALLERY_MODULE_SCREEN_NAME') && ! empty($galleries = gallery_meta_data($post)))
                                    {!! render_object_gallery($galleries) !!}
                                @elseif ($image = $post->image)
                                    {{ RvMedia::image($image, $post->name, 'medium-rectangle') }}
                                @endif
                            </div>
                        @endif

                        <div class="blog__details-content">
                            <h2 class="title">{{ $post->name }}</h2>
                            {!! Theme::partial('blog.post-detail-meta', compact('post')) !!}

                            @if ($description = $post->description)
                                <p>{!! BaseHelper::clean($description) !!}</p>
                            @endif

                            <div class="ck-content">
                                {!! BaseHelper::clean($post->content) !!}
                            </div>

                            <div class="blog__details-bottom">
                                <div class="row align-items-center">
                                    @if ($tags = $post->tags)
                                        <div class="col-md-7">
                                            <div class="post-tags">
                                                <h5 class="title">{{ __('Tags:') }}</h5>
                                                <ul class="list-wrap">
                                                    @foreach($tags as $tag)
                                                        <li><a title="{{ $tag->name }}" href="{{ $tag->url }}">{{ $tag->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($socials = \Botble\Theme\Supports\ThemeSupport::getSocialSharingButtons($post->url, SeoHelper::getDescription()))
                                        <div class="col-md-5">
                                            <div class="post-share">
                                                <h5 class="title">{{ __('Share:') }}</h5>
                                                <ul class="list-wrap">
                                                    @foreach($socials as $social)
                                                        @php
                                                            $name = Arr::get($social, 'name');
                                                            $backgroundColor = Arr::get($social, 'background_color');
                                                            $color = Arr::get($social, 'color');
                                                        @endphp

                                                        <li>
                                                            <a
                                                                aria-label="{{ __('Share on :social', ['social' => $name]) }}"
                                                                @style(["background-color: {$backgroundColor}" => $backgroundColor, "color: {$color}" => $color])
                                                                href="{{ Arr::get($social, 'url') }}"
                                                                target="_blank"
                                                            >
                                                                {!! Arr::get($social, 'icon') !!}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if($author = $post->author)
                            <div class="blog__avatar-wrap mb-60">
                                @if ($avatar = $author->avatar_url)
                                    <div class="blog__avatar-img">
                                        <div class="avatar-wrapper">
                                            {{ RvMedia::image($avatar, $author->name, 'thumb') }}
                                        </div>
                                    </div>
                                @endif

                                <div class="blog__avatar-info">
                                    <span class="designation">{{ __('Author') }}</span>
                                    <h4 class="name">{{ $author->name }}</h4>

                                    @if($bio = $author->getMetaData('bio', true))
                                        <p>{!! BaseHelper::clean($bio) !!}</p>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>

                    {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null, $post) !!}
                </div>

                @if($blogSidebar)
                    <div class="col-lg-4">
                        <aside class="blog__sidebar">
                            {!! $blogSidebar !!}
                        </aside>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
