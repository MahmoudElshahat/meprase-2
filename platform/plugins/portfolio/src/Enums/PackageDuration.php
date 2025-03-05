<?php

namespace Botble\Portfolio\Enums;

use Botble\Base\Supports\Enum;
use Illuminate\Support\HtmlString;

/**
 * @method static PackageDuration HOURLY()
 * @method static PackageDuration DAILY()
 * @method static PackageDuration WEEKLY()
 * @method static PackageDuration MONTHLY()
 * @method static PackageDuration ANNUALLY()
 * @method static PackageDuration QUARTERLY()
 */
class PackageDuration extends Enum
{
    public const MONTHLY = 'monthly';

    public const HOURLY = 'hourly';

    public const DAILY = 'daily';

    public const WEEKLY = 'weekly';

    public const QUARTERLY = 'quarterly';

    public const ANNUALLY = 'annually';

    public static $langPath = 'plugins/portfolio::portfolio.enums.package_durations';

    public function toHtml(): HtmlString|string
    {
        return $this->label();
    }
}
