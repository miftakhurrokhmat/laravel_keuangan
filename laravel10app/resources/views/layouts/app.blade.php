<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Keuangan</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">💰 Keuangan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('general/incomes*') ? 'active' : '' }}" href="{{ url('general/incomes') }}">Pemasukan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('general/expenses*') ? 'active' : '' }}" href="{{ url('general/expenses') }}">Pengeluaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('general/report*') ? 'active' : '' }}" href="{{ url('general/report') }}">Report</a>
                    </li>

                    {{-- ✅ Menu Transaksi --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('transaksi*') ? 'active' : '' }}" href="{{ route('transaksi.index') }}">Transaksi</a>
                    </li>

                    {{-- ✅ Hanya muncul untuk role admin --}}
                    @if(Auth::check() && Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">Manage Users</a>
                    </li>
                    @endif

                    {{-- ✅ Menu Edit Profile (hanya untuk user login) --}}
                    @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('profile/edit') ? 'active' : '' }}" href="{{ route('profile.edit') }}">Edit Profile</a>
                    </li>
                    @endauth


                    <li class="nav-item">
                        <a class="nav-link" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                </ul>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container my-5">
        {{-- ✅ Tampilkan nama & role user --}}
        @auth
        <div class="alert alert-info d-flex justify-content-between align-items-center">
            <div>
                <strong>Welcome, {{ Auth::user()->name }}</strong>
            </div>
            <small>Anda login sebagai {{ ucfirst(Auth::user()->role) }}</small>
        </div>
        @endauth

        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>