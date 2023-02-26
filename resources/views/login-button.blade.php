@if(config('eduzz-account.enabled') === true)
    <a id="eduzz-account-button" href="/redirect-eduzz-account">{{ $slot }}</a>
@endif
