@extends(EcommerceHelper::viewPath('customers.layouts.account-settings'))

@section('title', __('Account information'))

@section('account-content')
    {!! $form->renderForm() !!}

    @if (get_ecommerce_setting('enabled_customer_account_deletion', true))
        <div class="delete-account-section">
            <h2 class="customer-page-title text-danger">{{ __('Delete account') }}</h2>

            <p>
                {{ __('This action will permanently delete your account and all associated data and irreversible. Please be sure before proceeding.') }}
            </p>

            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-account-modal" data-toggle="modal" data-target="#delete-account-modal">{{ __('Delete your account') }}</button>

            <div class="modal fade" id="delete-account-modal" tabindex="-1" aria-labelledby="delete-account-modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title fs-6">
                                {{ __('Are you sure you want to do this?') }}
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-muted">
                                {{ __('We will send you an email to confirm your account deletion. Once you confirm, your account will be deleted permanently.') }}
                            </p>
                            <x-core::form :url="route('customer.delete-account.store')" method="post">
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Confirm your password') }}</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="reason" class="form-label">{{ __('Reason (optional)') }}</label>
                                    <textarea id="reason" name="reason" class="form-control" rows="3"></textarea>
                                </div>
                                <button type="submit" class="w-100 btn btn-danger">{{ __('Request delete account') }}</button>
                            </x-core::form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
    <style>
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

@endsection
