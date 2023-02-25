@if(config('eduzz-account.enabled'))
    <script src="https://cdn.eduzzcdn.com/accounts/accounts.js"></script>
    <script>
        function loginEduzzAccount() {
            window.Eduzz.Accounts.login("{{ config('eduzz-account.id') }}", {
                    logo: "{{ config('eduzz-account.logo') }}",
                    bg: "{{ config('eduzz-account.backgroundImage') }}",
                    btnColor: "{{ config('eduzz-account.buttonColor') }}",
                    dark: false,
                    @if(app()->environment('local')) env: 'homolog' @endif
                })
                .subscribe((data) => {
                    window.location.href = "/eduzz/validate/" + data + "?{!! http_build_query($_GET) !!}"
                });
        }
    </script>

    <a id="eduzz-account-button" href="#" onclick="loginEduzzAccount()">{{ $slot ?? 'Login com Eduzz Account' }}</a>
@endif
