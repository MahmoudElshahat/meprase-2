@extends('core/base::forms.form-tabs')

@section('form_end')
    <x-core::modal
        id="add-address-modal"
        :title="trans('plugins/ecommerce::addresses.add_address')"
        :form-action="route('customers.addresses.create.store')"
        form-method="POST"
        size="md"
    >
        {!!
            \Botble\Ecommerce\Forms\Fronts\Customer\AddressForm::create()
                ->add('customer_id', 'hidden', ['value' => $form->getModel()->id])
                ->renderForm()
        !!}

        <x-slot:footer>
            <x-core::button
                data-bs-dismiss="modal"
                class="me-2"
            >
                {{ trans('core/base::tables.cancel') }}
            </x-core::button>

            <x-core::button
                type="submit"
                color="primary"
                id="confirm-add-address-button"
            >
                {{ trans('plugins/ecommerce::addresses.add') }}
            </x-core::button>
        </x-slot:footer>
    </x-core::modal>

    <x-core::modal
        id="edit-address-modal"
        :title="trans('plugins/ecommerce::addresses.edit_address')"
        size="md"
    >
        <div class="modal-loading-block d-none">
            <x-core::loading />
        </div>

        <div class="modal-form-content"></div>

        <x-slot:footer>
            <x-core::button
                data-bs-dismiss="modal"
                class="me-2"
            >
                {{ trans('core/base::tables.cancel') }}
            </x-core::button>

            <x-core::button
                type="submit"
                color="primary"
                id="confirm-edit-address-button"
            >
                {{ trans('plugins/ecommerce::addresses.save') }}
            </x-core::button>
        </x-slot:footer>
    </x-core::modal>

    <x-core::modal
        :title="trans('core/base::tables.confirm_delete')"
        name="modal-confirm-delete"
        id="delete-address-modal"
        class="modal-confirm-delete"
    >
        {{ trans('core/base::tables.confirm_delete_msg') }}

        <x-slot:footer>
            <x-core::button
                data-bs-dismiss="modal"
                class="me-2"
            >
                {{ trans('core/base::tables.cancel') }}
            </x-core::button>

            <x-core::button
                type="submit"
                color="danger"
                class="delete-crud-entry"
            >
                {{ trans('core/base::tables.delete') }}
            </x-core::button>
        </x-slot:footer>
    </x-core::modal>

    {!! apply_filters('ecommerce_customer_form_end', null, $form) !!}
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
              console.log("DOMContentLoaded event fired.");

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

                      console.log("Phone input field found. Initializing intlTelInput...");

                      var iti = window.intlTelInput(input, {
                          initialCountry: "us",
                          separateDialCode: true,
                          preferredCountries: ["us", "gb", "in", "fr", "de"],
                          nationalMode: false,
                          showFlags: true,
                          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
                      });

                      console.log("intlTelInput initialized successfully.");

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

@section('form_main_end')
    @if ($customerId = $form->getModel()->id)
        <x-core::card class="mb-3">
            <x-core::card.header>
                <h4 class="card-title">{{ trans('plugins/ecommerce::review.name') }}</h4>
            </x-core::card.header>

            <div>
                {!! app(Botble\Ecommerce\Tables\CustomerReviewTable::class)->customerId($customerId)->setAjaxUrl(route('customers.ajax.reviews', $customerId))->renderTable() !!}
            </div>
        </x-core::card>
    @endif
@endsection

