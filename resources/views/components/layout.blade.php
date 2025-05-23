<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Todo' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body>
    <div class="container">
        <div class="sidebar">
            <img src="/assets/images/logo.png">
        </div>


        <div class="content">

            <nav>
                {{ $btn ?? null }}
            </nav>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="error_msg">
                        {{ $error }}
                    </div>
                @endforeach
            @elseif (session('error_msg'))
                <div class="error_msg">
                    {{ session('error_msg') }}
                </div>
            @endif

            @if (session('success_msg'))
                <div class="success_msg">
                    {{ session('success_msg') }}
                </div>
            @endif


            <main>
                {{ $slot }}
            </main>

        </div>
    </div>
</body>

</html>
