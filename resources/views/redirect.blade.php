<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduzz Account</title>
</head>
<body>
    <script src="https://cdn.eduzzcdn.com/accounts/accounts.js"></script>
    <script>
        window.Eduzz.Accounts.login("{{ config('eduzz-account.id') }}", {
                logo: "{{ config('eduzz-account.logo') }}",
                bg: "{{ config('eduzz-account.backgroundImage') }}",
                btnColor: "{{ config('eduzz-account.buttonColor') }}",
                dark: false,
                @if(app()->environment('local')) env: 'homolog' @endif
            })
            .subscribe((data) => {
                window.location.href = "{{ config('eduzz-account.callbackUrl') }}" + data + "?{!! http_build_query($_GET) !!}";
            });
    </script>
</body>
</html>
