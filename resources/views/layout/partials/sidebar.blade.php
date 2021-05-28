<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <li>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-leaf"></i>
            </div>
            <div class="sidebar-brand-text mx-3">MyGarden</div>
        </a>
    </li>
    <li>
        <hr class="sidebar-divider my-0">
    </li>
    <li class="nav-item <?php echo ($_SERVER["REQUEST_URI"] == "/dashboard.php") ? "active" : " "; ?>">
        <a class="nav-link" href="/dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li>
        <hr class="sidebar-divider">
    </li>
    <li class="sidebar-heading">
        Histórico Geral
    </li>
    <li class="nav-item <?php echo ($_SERVER["REQUEST_URI"] == "/history-temp.php") ? "active" : " "; ?>">
        <a class="nav-link" href="/history-temp.php">
            <i class="fas fa-temperature-low"></i>
            <span>Temperatura</span></a>
    </li>
    <li class="nav-item <?php echo ($_SERVER["REQUEST_URI"] == "/history-humi.php") ? "active" : " "; ?>">
        <a class="nav-link" href="/history-humi.php">
            <i class="fas fa-cloud-rain"></i>
            <span>Humidade</span></a>
    </li>
    <li>
        <hr class="sidebar-divider">
    </li>
    <li class="sidebar-heading">
        Histórico Específico
    </li>
    <li class="nav-item <?php echo ($_SERVER["REQUEST_URI"] == "hist/history-luminosidade.php") ? "active" : " "; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-screwdriver"></i>
            <span>Sensores</span>
        </a>
        <div id="collapseTwo" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="hist/history-luminosidade.php">Luminosidade</a>
                <a class="collapse-item" href="hist/history-temperatura.php">Temperatura</a>
                <a class="collapse-item" href="hist/history-humidade.php">Humidade no solo</a>
                <a class="collapse-item" href="hist/history-rega.php">Rega</a>
                <a class="collapse-item" href="hist/history-luz.php">Luz</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-seedling"></i>
            <span>Plantas</span>
        </a>
        <div id="collapseUtilities" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                $plants = glob("api/files/plantas/*.txt");
                foreach ($plants as $plant) {
                    $plant = file_get_contents($plant);
                    $plant = str_replace(";", ",", $plant);
                    $plant = explode(',', $plant);
                ?>
                    <a class="collapse-item" href="hist/history-<?php echo $plant[0]; ?>.php"><?php echo ucfirst($plant[0]); ?></a>
                <?php } ?>
            </div>
        </div>
    </li>
</ul>
