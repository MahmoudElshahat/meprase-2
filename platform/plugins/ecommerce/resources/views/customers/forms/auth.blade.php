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
    @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
    @endsection


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

        @foreach ($fields as $field)
            @continue(in_array($field->getName(), $exclude))

            <div class="col-md-6">
                {!! $field->render() !!}
            </div>
        @endforeach

        @if (request()->routeIs('customer.login'))
            <!-- Login specific fields -->
        @elseif (request()->routeIs('customer.register'))
            <div class="col-12 mt-3">
                {!! Form::checkbox('agree_terms_and_policy', 1, false, ['class' => 'form-check-input']) !!}
                <label class="text-white">
                    I agree to the <a href="{{ theme_option('ecommerce_term_and_privacy_policy_url') ?: '#' }}" target="_blank" class="text-white">Terms and Privacy Policy</a>
                </label>
            </div>
        @endif

        <!-- Submit Button -->
        <div class="col-12 mt-3">
            @if (request()->routeIs('customer.login'))
                {!! Form::submit(__('Login'), ['class' => 'btn btn-success text-white w-100', 'style' => 'background-color: #006400; border-color: #006400;']) !!}
            @elseif (request()->routeIs('customer.register'))
                {!! Form::submit(__('Register'), ['class' => 'btn btn-success text-white w-100', 'style' => 'background-color: #006400; border-color: #006400;']) !!}
            @elseif (request()->routeIs('customer.password.reset'))
                {!! Form::submit(__('Send Password Reset Link'), ['class' => 'btn btn-primary text-white w-100', 'style' => 'background-color: #006400; border-color: #006400;']) !!}
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
    color: #fff;
  }
  .form-check-input{
    color: #fff;
    padding: 3px;
  }

  #phone-input {
    width: 100%;
    /* padding-left: 50px !important; Ensure space for flag */
    height: 45px;
}

.iti {
    width: 100%;
    position: relative;
    z-index: 1000; /* Ensures dropdown is above other elements */
}

.iti__flag-container {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
}

.iti--separate-dial-code .iti__selected-flag {
    background-color: transparent !important;
}

.iti input, .iti input[type=tel], .iti input[type=text]{
    position: initial;

}

    </style>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        // Dynamically add CSS
        var cssLink = document.createElement("link");
        cssLink.rel = "stylesheet";
        cssLink.href = "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.19/build/css/intlTelInput.min.css";
        cssLink.onload = function () {
            console.log("CSS Loaded. Initializing intlTelInput...");
            initializeIntlTelInput();
        };
        document.head.appendChild(cssLink);

        function initializeIntlTelInput() {
            setTimeout(function () {
                var input = document.querySelector("#phone-input");

                if (!input) {
                    console.error("Phone input field NOT found! Check the ID.");
                    return;
                }


                var iti = window.intlTelInput(input, {
                    initialCountry: "us",
                    separateDialCode: true,
                    preferredCountries: ["us", "gb", "in", "fr", "de"],
                    excludeCountries: ["il"],
                    nationalMode: false,
                    showFlags: true,
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
                });


                // Function to update input with full number
                function updatePhoneInput() {
                    let fullNumber = iti.getNumber();
                    if (fullNumber) {
                        input.value = fullNumber;
                    }
                }

                // Event listeners
                input.addEventListener("blur", updatePhoneInput);
                input.addEventListener("keyup", updatePhoneInput);
                input.addEventListener("countrychange", function () {
                    setTimeout(updatePhoneInput, 100);
                });

                // Validate before submitting
                document.querySelector("form").addEventListener("submit", function (event) {
                    updatePhoneInput();
                    if (!iti.isValidNumber()) {
                        event.preventDefault();
                        alert("Invalid phone number! Please enter a valid number.");
                    }
                });

            }, 500);
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>

@endif
