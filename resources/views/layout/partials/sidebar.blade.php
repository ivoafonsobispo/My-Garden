<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <li>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-leaf"></i>
            </div>
            <div class="sidebar-brand-text mx-3">MyGarden</div>
        </a>
    </li>
    <li>
        <hr class="sidebar-divider my-0">
    </li>
    <li class="nav-item {{Route::is('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <hr class="sidebar-divider">
    </li>
    <li class="sidebar-heading">
        Histórico Geral
    </li>
    <li class="nav-item {{Route::is('history-geral.temp') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('history-geral.temp')}}">
            <i class="fas fa-temperature-low"></i>
            <span>Temperatura</span>
        </a>
    </li>
    <li class="nav-item {{Route::is('history-geral.hum') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('history-geral.hum')}}">
            <i class="fas fa-cloud-rain"></i>
            <span>Humidade</span>
        </a>
    </li>
    <li>
        <hr class="sidebar-divider">
    </li>
    <li class="sidebar-heading">
        Histórico Específico
    </li>
    <li class="nav-item @if (Route::is('history.hum') || Route::is('history.lum') || Route::is('history.temp')) active @endif">
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-screwdriver"></i>
            <span>Sensores</span>
        </a>
        <div id="collapseTwo" class="collapse @if (Route::is('history.hum') || Route::is('history.lum') || Route::is('history.temp')) show @endif" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{Route::is('history.hum') ? 'active' : ''}}" href="{{route('history.hum')}}">Humidade</a>
                <a class="collapse-item {{Route::is('history.lum') ? 'active' : ''}}" href="{{route('history.lum')}}">Luminosidade</a>
                <a class="collapse-item {{Route::is('history.temp') ? 'active' : ''}}" href="{{route('history.temp')}}">Temperatura</a>
            </div>
        </div>
    </li>

    <li class="nav-item @if (Route::is('history.alfaces') || Route::is('history.cenouras') || Route::is('history.tomates')) active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-seedling"></i>
            <span>Culturas</span>
        </a>
        <div id="collapseUtilities" class="collapse @if (Route::is('history.alfaces') || Route::is('history.cenouras') || Route::is('history.tomates')) show @endif" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{Route::is('history.alfaces') ? 'active' : ''}}" href="{{route('history.alfaces')}}">Alfaces</a>
                <a class="collapse-item {{Route::is('history.cenouras') ? 'active' : ''}}" href="{{route('history.cenouras')}}">Cenouras</a>
                <a class="collapse-item {{Route::is('history.tomates') ? 'active' : ''}}" href="{{route('history.tomates')}}">Tomates</a>
            </div>
        </div>
    </li>
</ul>
