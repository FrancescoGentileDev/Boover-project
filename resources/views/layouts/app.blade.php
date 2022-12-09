<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/backOffice.js') }}"></script>
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .sidebar-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: space-between;
        }

        .content {
            min-width: 80%;
            padding: 2rem 0;
        }

        .sidebar {
            min-width: 15%;
            background-color: rgb(239, 239, 239);
            padding: 1rem;
        }

        ul {
            list-style-type: none;
            padding: 0;

        }

        li {
            background-color: rgb(225, 225, 225);
            padding: 0.5rem;
            margin: 0.5rem 0;
            border-radius: 0.3pc;
        }

        h1 {
            font-size: 2vw;
            font-family: sans-serif;
        }
    </style>
</head>


<body>



    <div class="sidebar-container">

        <!-- Sidebar -->
        <div class="sidebar">

            <h1 class="text-green-500">Dashboard</h1>

            <nav>
                <ul>
                    <li>
                        linkExample
                        {{--  <a href="{{ route('/path')}}" >link1</a> --}}
                    </li>

                    <li>
                        linkExample
                        {{--    <a href="{{ route('/path')}}" >link2</a> --}}
                    </li>

                    <li>
                        linkExample
                        {{--    <a href="{{ route('/path')}}" >link3</a> --}}
                    </li>
                </ul>
            </nav>

        </div>

        <!-- Content -->
        <div class="content">
            @yield('content')
        </div>

    </div>



</body>

</html>
