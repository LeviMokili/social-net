<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
        data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>Ideas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="/profile">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn">logout</button>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                class="label label-pill label-danger count" style="border-radius:10px;">3</span> <i
                                class="bi bi-bell"></i></a>
                        <ul class="dropdown-menu"></ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
