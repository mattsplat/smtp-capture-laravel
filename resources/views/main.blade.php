<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMTP Capture</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Style the header */
        header {
            background-color: #666;
            padding: 30px;
            text-align: center;
            font-size: 35px;
            color: white;
        }

        /* Create two columns/boxes that floats next to each other */
        nav {
            float: left;
            width: 30%;
            background: #ccc;
            padding: 20px;
        }

        /* Style the list inside the menu */
        nav ul {
            list-style-type: none;
            padding: 0;
        }

        article {
            float: left;
            padding: 20px;
            width: 70%;
            background-color: #f1f1f1;
        }

        /* Clear floats after the columns */
        section::after {
            content: "";
            display: table;
            clear: both;
        }

        /* Style the footer */
        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }

        /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
        @media (max-width: 600px) {
            nav, article {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>
<div id="app">
    <header>
        <h2>{{config('app.name')}}</h2>
    </header>

    <section>
        <nav>
            <ul class="list-group">
                @foreach($emails as $email)
                    <li class="list-group-item">
                        <a href="/{{$email->id}}">
                            {{$email->subject}} - {{$email->from}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <article>
            <div class="container">
                @if(isset($mailRecord))
                    {!! $mailRecord->content !!}
                @endif
            </div>

        </article>
    </section>

    <footer>
        <p>Do stuff</p>
    </footer>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
