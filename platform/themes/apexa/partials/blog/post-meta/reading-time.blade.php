@php($timeReading = $post->time_reading)

@if ($timeReading > 0)
    <i class="fas fa-clock"></i>{{ $timeReading == 1 ? __('1 minute read') : __(':count minutes read', ['count' => $timeReading]) }}
@endif
