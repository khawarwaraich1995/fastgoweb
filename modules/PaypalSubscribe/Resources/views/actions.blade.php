@if (strlen(auth()->user()->cancel_url)>5)
    <div class="card-footer py-4">
        <form id="form-subscription-actions" action="{{ route('paypal.subscription.actions') }}" method="post" onsubmit="return false;">
            @csrf
            <input type="hidden" id="action" name="action" value=""/>
            <a href="https://www.paypal.com/myaccount/autopay/" target="_blank" class="btn btn-warning btn-sub-actions">{{__('Update subscription')}}</a>
            <a href="https://www.paypal.com/myaccount/autopay/" target="_blank" class="btn btn-danger btn-sub-actions" >{{__('Cancel subscription')}}</a>
        </form>
    </div>  
@endif
