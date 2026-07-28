<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VELOURA</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: 'Poppins', sans-serif;
        }

        body{
            background:#f8f5f2;
            overflow-x:hidden;
        }

        /* NAVBAR */

        .custom-navbar{
            background: rgba(0,0,0,0.85);
            backdrop-filter: blur(10px);
            padding:16px 0;
            position:sticky;
            top:0;
            z-index:999;
            box-shadow:0 4px 20px rgba(0,0,0,0.1);
        }

        .navbar-brand{
            font-size:32px;
            font-weight:700;
            letter-spacing:4px;
            color:#fff !important;
        }

        .navbar-brand span{
            color:#d4af37;
        }

        .nav-btn{
            border:none;
            padding:10px 22px;
            border-radius:50px;
            font-weight:500;
            transition:0.3s;
            text-decoration:none;
            display:inline-block;
        }

        .login-btn{
            background:#fff;
            color:#111;
        }

        .login-btn:hover{
            background:#d4af37;
            color:#fff;
            transform:translateY(-2px);
        }

        .register-btn{
            background:#d4af37;
            color:#fff;
        }

        .register-btn:hover{
            background:#fff;
            color:#111;
            transform:translateY(-2px);
        }

        .logout-btn{
            background:#dc3545;
            color:#fff;
        }

        .logout-btn:hover{
            background:#bb2d3b;
            transform:translateY(-2px);
        }

        .user-name{
            color:#fff;
            font-weight:500;
            margin-right:15px;
        }

        /* MAIN CONTENT */

        main{
            min-height:100vh;
        }

        /* COMMON CARD STYLE */

        .veloura-card{
            background:#fff;
            border-radius:20px;
            padding:30px;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
            border:none;
        }

        /* BUTTON COMMON */

        .veloura-btn{
            background:#111;
            color:#fff;
            border:none;
            border-radius:50px;
            padding:12px 25px;
            transition:0.3s;
        }

        .veloura-btn:hover{
            background:#d4af37;
            color:#fff;
            transform:translateY(-2px);
        }

        /* RESPONSIVE */

        @media(max-width:768px){

            .navbar-brand{
                font-size:24px;
            }

            .nav-btn{
                padding:8px 16px;
                font-size:14px;
            }

            .user-name{
                display:block;
                margin-bottom:10px;
            }
            .custom-navbar{
    backdrop-filter: blur(10px);
    background: rgba(0,0,0,0.9) !important;
    z-index: 9999;
}

        }

    </style>
</head>

<body>

    <main>

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-black py-3 shadow-sm sticky-top custom-navbar">
            @include('frontend.partials.navbar')
        </nav>

        <!-- PAGE CONTENT -->
        @yield('content')
        

        @include('frontend.partials.footer')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>