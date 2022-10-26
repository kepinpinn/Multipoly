<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipoly</title>
    <meta name="author" content="Vincentius Kelvin Lianto">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">
    <aside class="relative bg-gray-900 h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6  bg-gray-900">
            <p class="text-white text-3xl font-semibold uppercase">{{ Auth::user()->role }}</p>
            <p class="text-white text-xl font-semibold uppercase">{{ Auth::user()->name }}</p>
            @if (Auth::user()->role == 'marketing')
                <a class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center"
                    href="{{ route('penjualan.tambah') }}">
                    <i class="fas fa-plus mr-3"></i> Tambah PO
                </a>
            @elseif(Auth::user()->role == 'admin')
                <a class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center"
                    href="{{ route('penjualan.tambah') }}">
                    <i class="fas fa-plus mr-3"></i> Tambah PO
                </a>
            @endif

        </div>
        <nav class="text-white text-base font-semibold pt-3 bg-gray-900">
            <a href="{{ route('admin.index') }}" class="flex items-center nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="{{ route('penjualan.index') }}"
                class="flex items-center nav-link text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Sales
            </a>
            <a href="{{ route('crm.index') }}"
                class="flex items-center nav-link text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-users mr-3"></i>
                CRM
            </a>
            <a href=""
                class="flex items-center nav-link text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-hourglass mr-3"></i>
                Production
            </a>
            <a href=""
                class="flex items-center nav-link text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-warehouse mr-3"></i>
                Inventory
            </a>
            @if (Auth::user()->role == 'admin')
                <a href="{{ route('user.index') }}"
                    class="flex items-center nav-link text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-user-alt mr-3"></i>
                    Users
                </a>
            @endif
        </nav>
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img
                        src="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/bedd932c607dd632903e00102b27d6be.png">
                </button>

                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <form method="POST" action="{{ route('logout') }}" enctype="multipart/form-data">
                        @csrf
                        <a href="route('logout')" class="block px-4 py-2 account-link hover:text-white"
                            onclick="event.preventDefault(); this.closest('form').submit();">Sign Out</a>
                    </form>
                </div>
            </div>
        </header>
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                {{ $slot }}
            </main>

            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="" class="underline">Vincentius Kelvin Lianto</a>.
            </footer>
        </div>
    </div>
</body>

</html>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

<script>
    var chartOne = document.getElementById('chartOne');
    var myChart = new Chart(chartOne, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var chartTwo = document.getElementById('chartTwo');
    var myLineChart = new Chart(chartTwo, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
