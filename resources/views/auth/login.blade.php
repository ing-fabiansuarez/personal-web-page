<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión — ARCHFOUNDRY</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        html { overflow-x: hidden; }
        body { background-color: #0F0B1C; overflow-x: hidden; max-width: 100vw; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0F0B1C; }
        ::-webkit-scrollbar-thumb { background: #4C3E63; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #9B4DFF; }
    </style>
</head>
<body class="font-['Inter'] text-white min-h-screen flex items-center justify-center relative">
    <div class="fixed inset-0 z-0 pointer-events-none" style="background: radial-gradient(ellipse at 20% 50%, rgba(155,77,255,0.08) 0%, transparent 60%), radial-gradient(ellipse at 80% 20%, rgba(0,194,255,0.06) 0%, transparent 50%), radial-gradient(ellipse at 50% 80%, rgba(255,45,149,0.05) 0%, transparent 50%);"></div>

    <div class="relative z-10 w-full max-w-md px-4">
        <div class="text-center mb-8">
            <a href="/" class="text-3xl font-black">
                <span class="text-[#9B4DFF]">ARCH</span><span class="text-white">FOUNDRY</span>
            </a>
            <p class="text-gray-400 mt-2">Accede a tu cuenta</p>
        </div>

        <div class="bg-[#1A1530]/80 backdrop-blur-xl border border-[#2A2340] rounded-2xl p-8">
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1.5">Correo electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 bg-[#0F0B1C] border border-[#2A2340] rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-[#9B4DFF] focus:ring-1 focus:ring-[#9B4DFF] transition">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-1.5">Contraseña</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-3 bg-[#0F0B1C] border border-[#2A2340] rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-[#9B4DFF] focus:ring-1 focus:ring-[#9B4DFF] transition">
                </div>

                @if ($errors->any())
                    <div class="text-red-400 text-sm">{{ $errors->first() }}</div>
                @endif

                <button type="submit"
                    class="w-full py-3 bg-gradient-to-r from-[#9B4DFF] to-[#FF2D95] rounded-xl font-semibold text-white hover:opacity-90 transition-all duration-300 shadow-lg shadow-[#9B4DFF]/20">
                    Iniciar Sesión
                </button>

                <p class="text-center text-gray-400 text-sm">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}" class="text-[#9B4DFF] hover:text-[#FF2D95] transition">Regístrate</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
