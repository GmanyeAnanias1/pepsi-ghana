<!-- Footer -->
<footer class="bg-gray-100 dark:bg-gray-900 text-gray-700 dark:text-gray-300 mt-16" style="margin-left: 20px; margin-right: 20px;">
    <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Logo & Description -->
        <div>
            <div class="flex items-center mb-4">
                <img src="{{ asset('images/Pepsi_Logo.png') }}" alt="Pepsi Logo" class="h-10 mr-3">
                <span class="font-bold text-xl text-gray-800 dark:text-white">Pepsi Ghana</span>
            </div>
            <p class="text-sm">
                Pepsi Ghana Online Job Portal connects skilled professionals with rewarding careers. Join our vibrant workforce and grow with us.
            </p>
        </div>

        <!-- Quick Links -->
        <div>
            <h4 class="text-lg font-semibold mb-3 text-gray-800 dark:text-white">Quick Links</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
                <li><a href="{{ url('/dashboard') }}" class="hover:underline">Dashboard</a></li>
                <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
                @endif
                <li><a href="#" class="hover:underline">Contact</a></li>
            </ul>
        </div>

        <!-- Social Media -->
        <div>
            <h4 class="text-lg font-semibold mb-3 text-gray-800 dark:text-white">Follow Us</h4>
            <div class="flex space-x-4">
                <a href="#" class="hover:text-blue-600"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-blue-400"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-pink-500"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-blue-700"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <div class="border-t border-gray-300 dark:border-gray-700 mt-6">
        <div class="max-w-7xl mx-auto px-6 py-4 text-center text-xs text-gray-600 dark:text-gray-400">
            © {{ date('Y') }} Pepsi Ghana. All rights reserved.
        </div>
    </div>
</footer>
