<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SeatSavvy</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;600;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Theme Colors -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2D3748', // Dark Charcoal
                        accent: '#F59E0B',   // Amber for a warm touch
                        softAccent: '#F7D1A6', // Soft light amber for a calming effect
                        background: '#F3F4F6'  // Subtle off-white for a sophisticated look
                    },
                    fontFamily: {
                        sans: ['Nunito', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-background to-gray-200 font-sans text-gray-700">

    <!-- Background Animation for Ambient Feel -->
    <div class="absolute inset-0 bg-gradient-to-br from-transparent via-primary to-softAccent opacity-20"></div>

    <div class="flex items-center justify-center h-screen relative z-10">
        <div class="text-center">
            <h1 class="text-6xl font-extrabold text-primary drop-shadow-lg mb-4">
                SeatSavvy <span class="text-accent">POS</span>
            </h1>
            <p class="text-lg text-gray-600 mb-8">Smart Table Reservation for Your Perfect Dining Experience</p>

            <!-- Buttons with Artistic Hover Effects -->
            <div class="flex justify-center space-x-6 mb-8">
                <a href="admin" class="px-8 py-4 bg-primary text-white font-semibold rounded-full shadow-lg hover:bg-gray-800 transition duration-500 ease-in-out transform hover:scale-105">
                    Admin
                </a>
                <a href="cashier" class="px-8 py-4 bg-accent text-white font-semibold rounded-full shadow-lg hover:bg-amber-600 transition duration-500 ease-in-out transform hover:scale-105">
                    Cashier
                </a>
                <a href="customer" class="px-8 py-4 border border-gray-400 text-gray-700 font-semibold rounded-full hover:bg-softAccent transition duration-500 ease-in-out transform hover:scale-105">
                    Customer
                </a>
            </div>

            <!-- Footer with Subtle Gradient and Shadows -->
            <div class="mt-16 text-gray-500 text-sm">
                <p>© 2025 SeatSavvy - All Rights Reserved</p>
            </div>
        </div>
    </div>
</body>

</html>
