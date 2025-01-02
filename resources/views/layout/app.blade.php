<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white vh-100" style="width: 250px;">
            <h3 class="text-center py-3">Dashboard</h3>
            <nav class="nav flex-column">
                <a href="{{ route('manager.dashboard') }}" class="nav-link text-white">Home</a>
                <a href="{{ route('teammates.index') }}" class="nav-link text-white">Teammate</a>
                <a href="{{ route('projects.index') }}" class="nav-link text-white">project</a>
                <a href="{{ route('tasks.index') }}" class="nav-link text-white">Taks</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" class="nav-link text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <button class="btn btn-dark d-md-none mb-3" id="toggleSidebar">Toggle Sidebar</button>
            @yield('content')
        </div>
    </div>

    <script>
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.querySelector('.bg-dark');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('d-none');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
