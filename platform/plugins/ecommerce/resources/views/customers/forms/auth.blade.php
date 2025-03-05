@php
    $icon = Arr::get($formOptions, 'icon');
    $heading = Arr::get($formOptions, 'heading');
    $description = Arr::get($formOptions, 'description');
    $bannerDirection = Arr::get($formOptions, 'bannerDirection', 'horizontal');

    $banner = Arr::get($formOptions, 'banner');

    if (!$banner) {
        $bannerDirection = 'vertical';
    }
@endphp

    <style>
        .fix {
            background: #000 !important;
        }
    </style>

@if (Arr::get($formOptions, 'has_wrapper', 'yes') === 'yes')
    <div class="container" style="background: black; max-width: 3000px; padding: 20px; box-sizing: border-box;">
        <div @class(['row justify-content-center py-5'])>
            <div @class([
                'col-xl-8 col-lg-12' => $bannerDirection === 'vertical',
                'col-lg-10' => $bannerDirection === 'horizontal',
            ])>
@endif
<div @class([
    'auth-card',
    'card' => $bannerDirection === 'vertical',
    'auth-card__horizontal row' => $bannerDirection === 'horizontal',
]) style="background: black !important;border: 1px solid #fff !important;">
    @if ($banner)
        @if ($bannerDirection === 'horizontal')
            <div class="col-md-6 auth-card__left">
        @endif
        {{ RvMedia::image($banner, $heading ?: '', attributes: ['class' => 'auth-card__banner']) }}
        @if ($bannerDirection === 'horizontal')
</div>
@endif
@endif

@if ($bannerDirection === 'horizontal')
    <div class="col-md-6 auth-card__right">
@endif
@if ($icon || $heading || $description)

    <div class="auth-card__header">
        <div @class([
            'd-flex flex-column flex-md-row align-items-start gap-3' => $icon,
            'text-center' => !$icon,
        ])>
            @if ($icon)
                <div class="auth-card__header-icon bg-white p-3 rounded">
                    <x-core::icon :name="$icon" class="text-primary" />
                </div>
            @endif
            <div class="container">
                @if ($heading)
                <h1 class="auth-card__header-title fs-4 mb-1 text-white"
                    style="font-size: 3rem; text-align: center; margin-bottom: 20px;">
                    {{ $heading }}
                </h1>
            @endif

            @if ($description)
                <p class="auth-card__header-description text-white"
                    style="text-align: center; font-size: 1.2rem;">
                    {{ $description }}
                </p>
            @endif


            </div>
        </div>
    </div>
@endif


<div class="auth-card__body">
    @if ($showStart)
        {!! Form::open(Arr::except($formOptions, ['template'])) !!}
    @endif

    @if (session()->has('status'))
        <div role="alert" class="alert alert-success">
            {{ session('status') }}
        </div>
    @elseif (session()->has('auth_error_message'))
        <div role="alert" class="alert alert-danger">
            {{ session('auth_error_message') }}
        </div>
    @elseif (session()->has('auth_success_message'))
        <div role="alert" class="alert alert-success">
            {{ session('auth_success_message') }}
        </div>
    @elseif (session()->has('auth_warning_message'))
        <div role="alert" class="alert alert-warning">
            {{ session('auth_warning_message') }}
        </div>
    @endif
    @if ($showFields)
    <div class="row">
        {{ $form->getOpenWrapperFormColumns() }}

        @php
            $fields = collect($fields);

            // Move 'form_front_form_start' to the beginning
            $startField = $fields->firstWhere(fn($field) => $field->getName() === 'form_front_form_start');
            $fields = $fields->reject(fn($field) => $field->getName() === 'form_front_form_start');
            if ($startField) {
                $fields->prepend($startField);  // Prepend it at the start
            }
        @endphp

        @foreach ($fields as $field)
            @continue(in_array($field->getName(), $exclude))

            <div class="col-md-6">
                {!! $field->render() !!}
            </div>
        @endforeach

        <!-- Show "Remember Me" and "Forgot Password?" ONLY on Login Page -->
        @if (request()->routeIs('customer.login'))
        <div class="col-12 text-start">
            {!! Form::checkbox('remember', 1, false, ['class' => 'form-check-input class="text-white"']) !!}
            <label>{{ __('Remember me') }}</label>
        </div>
        <div class="col-12 text-start">
            <a href="{{ route('customer.password.reset') }}" class="text-decoration-underline">{{ __('Forgot password?') }}</a>
        </div>

        <!-- Show "Don't have an account? Register" ONLY on Login Page -->
        <div class="col-12 mt-3 text-center">
            <a href="{{ route('customer.register') }}" class="text-decoration-underline">{{ __('Don\'t have an account? Register') }}</a>
        </div>

    @elseif (request()->routeIs('customer.register'))
        <div class="col-12 mt-3">
            {!! Form::checkbox('agree_terms_and_policy', 1, false, ['class' => 'form-check-input']) !!}
            <label class="text-white">
                I agree to the <a href="{{ theme_option('ecommerce_term_and_privacy_policy_url') ?: '#' }}" target="_blank" class="text-white">Terms and Privacy Policy</a>
            </label>
        </div>

    @elseif (request()->routeIs('customer.password.reset'))
        <div class="col-12 mt-3 text-center">
            <a href="{{ route('customer.login') }}" class="text-decoration-underline">{{ __('Back to login page') }}</a>
        </div>
    @endif



        <!-- Submit Button: Show different buttons for login, register, and password reset -->
        <div class="col-12 mt-3">
            @if (request()->routeIs('customer.login'))
                {!! Form::submit(__('Login'), ['class' => 'btn btn-success text-white w-100', 'style' => 'background-color: #006400; border-color: #006400;']) !!}
            @elseif (request()->routeIs('customer.register'))
                {!! Form::submit(__('Register'), ['class' => 'btn btn-success text-white w-100', 'style' => 'background-color: #006400; border-color: #006400;']) !!}
            @elseif (request()->routeIs('customer.password.reset'))
                {!! Form::submit(__('Send Password Reset Link'), ['class' => 'btn btn-primary text-white w-100' , 'style' => 'background-color: #006400; border-color: #006400;']) !!}
            @endif
        </div>



        {{ $form->getCloseWrapperFormColumns() }}
    </div>
@endif




    @if ($showEnd)
        {!! Form::close() !!}
    @endif
</div>


    @if ($form->getValidatorClass())
        @push('footer')
            {!! $form->renderValidatorJs() !!}
        @endpush
    @endif
</div>

@if ($bannerDirection === 'horizontal')
    </div>
@endif
</div>
@if (Arr::get($formOptions, 'has_wrapper', 'yes') === 'yes')
    </div>
    </div>
    </div>
    <style>


.auth-card__body form .btn-auth-submit{
    background: rgb(8 , 92 , 38);
    width: 100%;
    display: block;
}
 .text-center{
    color: white;
    text-align: left !important;
    /* margin-top: 1rem; Equivalent to Bootstrap's mt-3 */
  }
  .auth-card .text-decoration-underline{
    color: #fff
  }
    </style>
@endif
