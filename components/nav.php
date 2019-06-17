<?php 
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $first_part = end($components);
?>
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <img src="/catapeli/images/popcorn.png" width="30" height="30" >
    <a class="navbar-brand title" href="#">CataPeli</a>
    <ul class="navbar-nav">
        <li class="nav-item <?php echo $first_part === 'dashboard.php' ? 'active' : ''; ?>">
            <a class="nav-link" href="dashboard.php">Inicio</a>
        </li>
        <li class="nav-item <?php echo $first_part === 'lista.php' ? 'active' : ''; ?>">
            <a class="nav-link" href="lista.php">Peliculas</a>
        </li>
        <li class="nav-item <?php echo $first_part === 'logout.php' ? 'active' : ''; ?>">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
</nav>

