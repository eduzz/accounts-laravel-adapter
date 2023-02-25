@if(config('eduzz-account.enabled'))
    <script src="https://cdn.eduzzcdn.com/accounts/accounts.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            function loginEduzzAccount() {
                window.Eduzz.Accounts.login("{{ config('eduzz-account.id') }}", {
                        logo: "{{ config('eduzz-account.id') }}",
                        bg: "{{ config('eduzz-account.background.image') }}",
                        btnColor: "{{ config('eduzz-account.button.color') }}",
                        dark: false,
                        @if(app()->environment('local')) env: 'homolog' @endif
                    })
                    .subscribe((data) => {
                        window.location.href = "/eduzz/validate/" + data + "?{!! http_build_query($_GET) !!}"
                    });
            }
        });
    </script>

    <a id="eduzz-account-button" onclick="loginEduzzAccount()">{{ $slot ?? 'Login com Eduzz Account' }}</a>
@endif