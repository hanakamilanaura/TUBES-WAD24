@extends('layouts.sidebar')
@section('content')
    <div class="flex items-center item-start">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 6.50005V9.50005C11.999 10.1627 11.7352 10.7979 11.2666 11.2665C10.798 11.7352 10.1628 11.9989 9.50011 12H6.50011C5.8373 11.9989 5.20209 11.7352 4.73347 11.2665C4.26486 10.7979 4.00117 10.1627 4.00007 9.50005V6.50005C4.00114 5.83723 4.26485 5.20202 4.73347 4.73341C5.2021 4.26479 5.8373 4.0011 6.50011 4H9.50011C10.1628 4.00107 10.798 4.26478 11.2666 4.73341C11.7352 5.20202 11.9989 5.83723 12 6.50005ZM18.3 4H15.3C14.6373 4.00107 14.0021 4.26478 13.5335 4.73341C13.0649 5.20202 12.8012 5.83723 12.8001 6.50005V9.50005C12.8012 10.1627 13.0649 10.7979 13.5335 11.2665C14.0021 11.7352 14.6373 11.9989 15.3 12H18.3C18.9628 11.9989 19.598 11.7352 20.0667 11.2665C20.5353 10.7979 20.799 10.1627 20.8001 9.50005V6.50005C20.799 5.83723 20.5353 5.20202 20.0667 4.73341C19.598 4.26479 18.9628 4.0011 18.3 4ZM9.49991 12.8001H6.50005C5.83723 12.8012 5.20202 13.0649 4.73341 13.5335C4.26479 14.0021 4.0011 14.6373 4 15.3V18.3C4.00107 18.9628 4.26478 19.598 4.73341 20.0667C5.20203 20.5353 5.83723 20.799 6.50005 20.8001H9.50005C10.1627 20.799 10.7979 20.5353 11.2665 20.0667C11.7352 19.598 11.9989 18.9628 12 18.3V15.3C11.9989 14.6373 11.7352 14.0021 11.2665 13.5335C10.7979 13.0649 10.1627 12.8012 9.50005 12.8001H9.49991ZM18.3 12.8001H15.3C14.6373 12.8012 14.0021 13.0649 13.5335 13.5335C13.0649 14.0021 12.8012 14.6373 12.8001 15.3V18.3C12.8012 18.9628 13.0649 19.598 13.5335 20.0667C14.0021 20.5353 14.6373 20.799 15.3 20.8001H18.3C18.9628 20.799 19.598 20.5353 20.0667 20.0667C20.5353 19.598 20.799 18.9628 20.8001 18.3V15.3C20.799 14.6373 20.5353 14.0021 20.0667 13.5335C19.598 13.0649 18.9628 12.8012 18.3 12.8001Z" fill="url(#paint0_linear_9_749)"/>
            <defs>
                <linearGradient id="paint0_linear_9_749" x1="4" y1="4" x2="20.8001" y2="20.8001" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFB790"/>
                    <stop offset="1" stop-color="#E8590C"/>
                </linearGradient>
            </defs>
        </svg>
        <h1 class="text-xl font-extrabold text-gray-900 ml-2">Dashboard</h1>
    </div>
    <div>
        <p class="greeting mt-1 ml-8">Hi, {{explode(' ', Auth::user()->name)[0]}} here’s take a look at your performance and analytics</p>
    </div>

    <div class="flex space-x-4 mt-4"> <!-- Flex container for side-by-side layout -->
        <div class="flex flex-col flex-grow bg-white dark:bg-gray-800 shadow-sm rounded-xl">
            <div class="px-5 pt-5">
                <header class="flex justify-between items-start mb-2">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Employee Statistics</h2>
                </header>
                <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Total Employees</div>
                <div class="flex items-start mb-4">
                    <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">{{ $totalEmployees }}</div>
                </div>
            </div>
        </div>

        <div class="flex flex-col flex-grow bg-white dark:bg-gray-800 shadow-sm rounded-xl">
            <div class="px-5 pt-5">
                <header class="flex justify-between items-start mb-2">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Division Statistics</h2>
                </header>
                <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Total Division</div>
                <div class="flex items-start mb-4">
                    <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">{{ $totalDivisions }}</div>
                </div>
            </div>
        </div>

        <div class="flex flex-col flex-grow bg-white dark:bg-gray-800 shadow-sm rounded-xl">
            <div class="px-5 pt-5">
                <header class="flex justify-between items-start mb-2">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Shift Statistics</h2>
                </header>
                <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Total Shift</div>
                <div class="flex items-start mb-4">
                    <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">{{ $totalShifts }}</div>
                </div>
            </div>
        </div>

        <div class="flex flex-col flex-grow bg-white dark:bg-gray-800 shadow-sm rounded-xl">
            <div class="px-5 pt-5">
                <header class="flex justify-between items-start mb-2">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Attandance Statistics</h2>
                </header>
                <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Total Today's Attandence</div>
                <div class="flex items-start mb-4">
                    <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">{{ $totalAbsences }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="flex flex-col max-w-sm bg-white dark:bg-gray-800 shadow-sm rounded-xl mt-4">
        <div class="px-5 pt-5">
            <header class="flex justify-between items-start mb-2">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Vacation Statistics</h2>
            </header>
            <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Approved Vacations</div>
            <div class="flex items-start mb-2">
                <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">{{ $approvedVacations }}</div>
            </div>
            <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Rejected Vacations</div>
            <div class="flex items-start mb-2">
                <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">{{ $rejectedVacations }}</div>
            </div>
            <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Pending Vacations</div>
            <div class="flex items-start mb-4">
                <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">{{ $pendingVacations }}</div>
            </div>
        </div>
        <div class="grow max-sm:max-h-[128px] xl:max-h-[128px]">
            <canvas id="vacation-statistics-chart" width="389" height="128"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data untuk grafik cuti
        const vacationCtx = document.getElementById('vacation-statistics-chart').getContext('2d');
        const vacationChart = new Chart(vacationCtx, {
            type: 'doughnut',
            data: {
                labels: ['Approved', 'Rejected', 'Pending'],
                datasets: [{
                    label: 'Vacation Status',
                    data: [{{ $approvedVacations }}, {{ $rejectedVacations }}, {{ $pendingVacations }}],
                    backgroundColor: ['#36A2EB', '#FFCE56', '#FF6384'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                }
            }
        });
    </script>
    </div>  
@endsection
