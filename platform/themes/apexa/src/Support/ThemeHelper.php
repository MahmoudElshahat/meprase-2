<?php

namespace Theme\Apexa\Support;

use Botble\Base\Models\BaseQueryBuilder;
use Botble\Blog\Models\Post;
use Botble\Language\Facades\Language;
use Illuminate\Support\Collection;

class ThemeHelper
{
    public static function getBlogPosts(array $categoryIds = [], ?string $type = null, int $limit = 6): Collection
    {
        if (! is_plugin_active('blog') || ! $categoryIds) {
            return collect();
        }

        $query = Post::query()
            ->whereHas('categories', fn (BaseQueryBuilder $query) => $query->whereIn('id', $categoryIds));

        if ($type) {
            $query = match ($type) {
                'popular' => $query->orderByDesc('views'),
                'featured' => $query->where('is_featured', 1),
                default => $query->orderByDesc('created_at'),
            };
        }

        return $query
            ->wherePublished()
            ->limit($limit)
            ->get();
    }

    public static function isShowPostMeta(string $kind, string $type, bool $default = false): bool
    {
        $kind = in_array($kind, ['list', 'detail']) ? $kind : 'list';
        $option = theme_option("blog_post_{$kind}_meta_display", null);

        return $option !== null
            ? in_array($type, json_decode($option, true))
            : $default;
    }

    public static function isSupportSplitText(): bool
    {
        if (! is_plugin_active('language')) {
            return true;
        }

        $excludedLocales = [
            'zh',
            'ja',
            'th',
            'km',
            'lo',
            'ar',
        ];

        $currentLocal = Language::getCurrentLocale();

        foreach ($excludedLocales as $locale) {
            if (str_contains($currentLocal, $locale)) {
                return false;
            }
        }

        return true;
    }
}
