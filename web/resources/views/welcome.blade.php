<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TabiLong</title>
        <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        <script>
            async function web3Login() {
                if (!window.ethereum) {
                    alert('MetaMask not detected. Please install MetaMask first.');
                    return;
                }

                const provider = new ethers.providers.Web3Provider(window.ethereum);

                let response = await fetch('/web3-login-message');
                const message = await response.text();

                await provider.send("eth_requestAccounts", []);
                const address = await provider.getSigner().getAddress();
                const signature = await provider.getSigner().signMessage(message);

                response = await fetch('/web3-login-verify', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        'address': address,
                        'signature': signature,
                        '_token': '{{ csrf_token() }}'
                    })
                });
                const data = await response.text();

                console.log(data);
            }
        </script>

    </head>
    <body class="antialiased">

    <img src="/image/logo.jpg" width="100%" />
        <br />
        <br />
    <div class="row">
        <div class="col-12 text-center">
            <button class="btn btn-primary mt-5" onclick="web3Login();">Log in with MetaMask</button>
        </div>
    </div>

        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Email Login</a>
<br />
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Email Register</a>
<br />

    <a href="{{route('login.google.redirect') }}">Google Login / Register</a>

                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">


        <br />

            </div>
        </div>
    </body>
</html>