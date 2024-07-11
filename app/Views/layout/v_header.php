<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Geografis</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        /* Custom styling for the map container */
        #map {
            width: 100%;
            height: 580px;
            margin-bottom: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha384-1tYtGFTiE/ctZB4RL1PbTw5dznBkR8uIXZP7b8BYA6Qfu71uhhfA35VRdNy4L+5C" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha384-yniwT20kGPBPoetHLWq5rtST2g2Dw2rZx4BFMTIrJSqLsqitF5dNBLlmWywR0E0R" crossorigin=""></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistem Informasi Geografis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $menu == 'peta' ? 'active' : '' ?>" aria-current="page" href="<?= base_url('/') ?>">Peta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $menu == 'kelola' ? 'active' : '' ?>" href="<?= base_url('kelola') ?>">Kelola</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>