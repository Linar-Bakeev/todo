<HTML>
    <head>
        <title>ToDo App</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{csrf_token()}}">
    </head>
    <body>

    <nav class="navbar navbar-expand-lg bg-light" >
        <div class="container-fluid">
            <a class="navbar-brand" href="/">ToDo Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/">All task</a>
                    <a class="nav-link" href="/tasks/create">New task</a>
                    @if(!Auth::check())
                    <a class="nav-link" href="/login">Authorization</a>
                    <a class="nav-link" href="/reg">Registration</a>
                    @else
                        <a class="nav-link">Welcome <b><em>{{Auth::user()->email}}</em></b></a>
                        <a style="margin-left: 20px" class="nav-link" href="/logout">Logout</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
     </body>
</HTML>
