<nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('majors.index')}}">Панель администратора</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('majors.index')}}">Направления</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('patterns.index')}}">Паттерны</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reasons.index')}}">Причины отчисления</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
