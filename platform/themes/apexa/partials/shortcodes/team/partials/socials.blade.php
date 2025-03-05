<ul class="list-wrap">
    @foreach($team->socials as $name => $social)
        <li>
            <a href="{{ $social }}">
                <x-core::icon name="ti ti-brand-{{ $name === 'twitter' ? 'x' : $name }}"/>
            </a>
        </li>
    @endforeach
</ul>
