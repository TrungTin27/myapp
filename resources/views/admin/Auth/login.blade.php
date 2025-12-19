<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100">

<div class="flex justify-center items-center min-h-screen px-4">

    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-md">

        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">
            Đăng nhập Admin
        </h2>
        
        {{-- Form login --}}
        <form action="/admin/login" method="POST">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg 
                              focus:ring-2 focus:ring-blue-400 outline-none"
                       placeholder="Nhập email..." required>
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Mật khẩu</label>
                <input type="password" name="password"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg 
                              focus:ring-2 focus:ring-blue-400 outline-none"
                       placeholder="Nhập mật khẩu..." required>
            </div>

            {{-- Remember --}}
            <div class="flex items-center mb-4">
                <input type="checkbox" name="remember" class="mr-2">
                <span class="text-gray-700">Ghi nhớ đăng nhập</span>
            </div>

            {{-- Button Login --}}
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg 
                           font-semibold hover:bg-blue-700 transition">
                Đăng nhập
            </button>

        </form>

        {{-- Forgot Password --}}
        <div class="text-center mt-4">
            <a href="#" class="text-blue-600 hover:underline">Quên mật khẩu?</a>
        </div>

    </div>

</div>

</body>
</html>
