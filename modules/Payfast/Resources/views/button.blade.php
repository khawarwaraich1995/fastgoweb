<div class="text-center payment_form_submiter" id="payfast-payment-form" style="display: {{ config('settings.default_payment')=="payfast"?"block":"none"}};" >
    <button
        v-if="totalPrice"
        type="submit"
        class="btn btn-success mt-4 paymentbutton"
        onclick="this.disabled=true;this.form.submit();"
    >{{ __('Place order') }}</button>
</div>


