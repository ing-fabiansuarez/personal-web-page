<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARCHFOUNDRY — Academia de Tecnología</title>
    <meta name="description" content="ARCHFOUNDRY. Academia de tecnología y desarrollo de software. Formamos a los arquitectos del futuro digital.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        html { scroll-behavior: smooth; overflow-x: hidden; }
        body { background-color: #0F0B1C; overflow-x: hidden; max-width: 100vw; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0F0B1C; }
        ::-webkit-scrollbar-thumb { background: #4C3E63; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #9B4DFF; }

        .noise-overlay {
            position: fixed;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            opacity: 0.03;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
            background-repeat: repeat;
            background-size: 256px 256px;
        }

        .glass {
            background: rgba(15, 11, 28, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(155, 77, 255, 0.1);
        }

        .glass-card {
            background: linear-gradient(135deg, rgba(17, 20, 51, 0.8), rgba(15, 15, 39, 0.8));
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(155, 77, 255, 0.15);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            border-color: rgba(155, 77, 255, 0.4);
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(155, 77, 255, 0.15);
        }

        .gradient-text {
            background: linear-gradient(135deg, #9B4DFF, #FF2D95, #00C2FF, #9B4DFF);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient 6s ease infinite;
        }

        .gradient-border {
            position: relative;
        }

        .gradient-border::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(135deg, #9B4DFF, #FF2D95, #00C2FF);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0.5;
            transition: opacity 0.3s;
        }

        .gradient-border:hover::before {
            opacity: 1;
        }

        .hero-glow {
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            filter: blur(120px);
            opacity: 0.2;
            pointer-events: none;
        }

        .grid-bg {
            background-image:
                linear-gradient(rgba(155, 77, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(155, 77, 255, 0.05) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            pointer-events: none;
        }

        .nav-link {
            position: relative;
            color: rgba(255, 255, 255, 0.7);
            transition: color 0.3s;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #9B4DFF, #FF2D95);
            transition: width 0.3s;
        }

        .nav-link:hover { color: #fff; }
        .nav-link:hover::after { width: 100%; }

        .course-card {
            position: relative;
            overflow: hidden;
        }

        .course-card .glow-hover {
            position: absolute;
            inset: 0;
            opacity: 0;
            background: linear-gradient(135deg, rgba(155, 77, 255, 0.1), rgba(255, 45, 149, 0.05));
            transition: opacity 0.4s;
        }

        .course-card:hover .glow-hover { opacity: 1; }

        .project-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15, 11, 28, 0.95), transparent);
            opacity: 0;
            transition: opacity 0.4s;
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
        }

        .project-card:hover .project-overlay { opacity: 1; }

        .tag {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            background: rgba(155, 77, 255, 0.15);
            color: #9B4DFF;
            border: 1px solid rgba(155, 77, 255, 0.2);
        }

        .input-field {
            width: 100%;
            padding: 0.875rem 1.25rem;
            background: rgba(17, 20, 51, 0.8);
            border: 1px solid rgba(155, 77, 255, 0.15);
            border-radius: 12px;
            color: #fff;
            font-size: 0.95rem;
            transition: all 0.3s;
            outline: none;
        }

        .input-field:focus {
            border-color: #9B4DFF;
            box-shadow: 0 0 0 3px rgba(155, 77, 255, 0.15);
        }

        .input-field::placeholder { color: rgba(255, 255, 255, 0.3); }

        .btn-primary {
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            background: linear-gradient(135deg, #9B4DFF, #FF2D95);
            color: #fff;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 40px rgba(155, 77, 255, 0.35);
        }

        .btn-outline {
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            background: transparent;
            color: #fff;
            border: 1px solid rgba(155, 77, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-outline:hover {
            border-color: #9B4DFF;
            background: rgba(155, 77, 255, 0.1);
            transform: translateY(-2px);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .section-subtitle {
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto 4rem;
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .section-title { font-size: 1.8rem; }
            .section-subtitle { font-size: 0.95rem; margin-bottom: 2.5rem; }
        }
    </style>
</head>
<body class="text-white antialiased">

    <div class="noise-overlay" style="z-index: 2;"></div>
    <div class="fixed inset-0 grid-bg pointer-events-none z-0"></div>
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="hero-glow" style="top: -200px; left: -200px; background: #9B4DFF;"></div>
        <div class="hero-glow" style="bottom: -200px; left: 70%; background: #FF2D95;"></div>
        <div class="hero-glow" style="top: 50%; left: 50%; transform: translate(-50%, -50%); background: #00C2FF; opacity: 0.08;"></div>
    </div>

    <nav class="fixed top-0 left-0 right-0 z-50 glass">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <a href="#" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-arch-purple to-arch-pink flex items-center justify-center font-bold text-lg group-hover:scale-105 transition-transform">
                        A
                    </div>
                    <span class="font-bold text-xl tracking-tight">ARCH<span class="text-arch-purple">FOUNDRY</span></span>
                </a>

                <div class="hidden md:flex items-center gap-8">
                    <a href="#servicios" class="nav-link text-sm font-medium">Servicios</a>
                    <a href="#cursos" class="nav-link text-sm font-medium">Cursos</a>
                    <a href="#portfolio" class="nav-link text-sm font-medium">Proyectos</a>
                    <a href="#blog" class="nav-link text-sm font-medium">Blog</a>
                    <a href="#contacto" class="nav-link text-sm font-medium">Contacto</a>
                </div>

                <a href="/login" class="btn-primary text-sm py-2.5 px-5 hidden sm:inline-block">Empezar</a>

                <button id="menu-toggle" class="md:hidden p-2 text-white/70 hover:text-white">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 12h18M3 6h18M3 18h18"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <div id="mobile-menu" class="fixed inset-0 z-40 bg-arch-dark/95 backdrop-blur-xl hidden">
        <div class="flex flex-col items-center justify-center h-full gap-8 text-lg">
            <a href="#servicios" class="nav-link text-xl mobile-nav-link">Servicios</a>
            <a href="#cursos" class="nav-link text-xl mobile-nav-link">Cursos</a>
            <a href="#portfolio" class="nav-link text-xl mobile-nav-link">Proyectos</a>
            <a href="#blog" class="nav-link text-xl mobile-nav-link">Blog</a>
            <a href="#contacto" class="nav-link text-xl mobile-nav-link">Contacto</a>
        </div>
    </div>

    <main class="relative z-10">

        {{-- HERO --}}
        <section id="hero" class="min-h-screen flex items-center relative overflow-hidden pt-20">
            <div class="floating-shape w-72 h-72 bg-arch-purple" style="top: 10%; left: 5%; animation: float 8s ease-in-out infinite;"></div>
            <div class="floating-shape w-48 h-48 bg-arch-pink" style="bottom: 20%; right: 10%; animation: float 10s ease-in-out infinite 2s;"></div>
            <div class="floating-shape w-36 h-36 bg-arch-cyan" style="top: 40%; right: 25%; animation: float 7s ease-in-out infinite 1s;"></div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full">
                <div class="flex flex-col items-center text-center max-w-4xl mx-auto">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass mb-8 animate-on-scroll">
                        <span class="w-2 h-2 rounded-full bg-arch-cyan animate-pulse-slow"></span>
                        <span class="text-sm text-white/60">Forjando el futuro digital</span>
                    </div>

                    <h1 class="text-5xl sm:text-6xl lg:text-8xl font-black tracking-tight leading-none mb-6 animate-on-scroll">
                        Donde el código
                        <br>
                        <span class="gradient-text">construye el mañana</span>
                    </h1>

                    <p class="text-lg sm:text-xl text-white/50 max-w-2xl mb-10 animate-on-scroll">
                        Academia de tecnología y desarrollo de software. Formamos arquitectos digitales
                        con habilidades en desarrollo web, móvil, IA y más.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 animate-on-scroll">
                        <a href="#cursos" class="btn-primary text-base px-8 py-4">Explorar Cursos</a>
                        <a href="#servicios" class="btn-outline text-base px-8 py-4">Nuestros Servicios</a>
                    </div>

                    <div class="grid grid-cols-3 gap-6 sm:gap-12 lg:gap-20 mt-12 sm:mt-20 animate-on-scroll">
                        <div class="text-center">
                            <div class="text-3xl sm:text-4xl font-black gradient-text">50+</div>
                            <div class="text-sm text-white/40 mt-1">Cursos</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl sm:text-4xl font-black gradient-text">500+</div>
                            <div class="text-sm text-white/40 mt-1">Estudiantes</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl sm:text-4xl font-black gradient-text">98%</div>
                            <div class="text-sm text-white/40 mt-1">Satisfacción</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-arch-dark to-transparent"></div>
        </section>

        {{-- SERVICIOS --}}
        <section id="servicios" class="py-24 lg:py-32">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="animate-on-scroll">
                    <h2 class="section-title">Nuestros <span class="gradient-text">Servicios</span></h2>
                    <p class="section-subtitle">Soluciones integrales para impulsar tu carrera en tecnología</p>
                </div>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
                    <div class="glass-card rounded-2xl p-6 lg:p-8 animate-on-scroll">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 rounded-xl bg-gradient-to-br from-arch-purple to-arch-pink/30 flex items-center justify-center mb-5 lg:mb-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#9B4DFF" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                        </div>
                        <h3 class="text-lg lg:text-xl font-bold mb-3">Desarrollo Web</h3>
                        <p class="text-white/50 text-sm lg:text-base leading-relaxed">Aprende las tecnologías más modernas: Laravel, React, Vue, Node.js y más. Desde fundamentos hasta arquitecturas escalables.</p>
                    </div>

                    <div class="glass-card rounded-2xl p-6 lg:p-8 animate-on-scroll">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 rounded-xl bg-gradient-to-br from-arch-cyan to-arch-blue/30 flex items-center justify-center mb-5 lg:mb-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#00C2FF" stroke-width="1.5"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 9h.01M15 9h.01M9 15h6"/></svg>
                        </div>
                        <h3 class="text-lg lg:text-xl font-bold mb-3">Apps Móviles</h3>
                        <p class="text-white/50 text-sm lg:text-base leading-relaxed">Domina Flutter, Kotlin y Swift. Crea aplicaciones nativas e híbridas con las mejores prácticas del mercado.</p>
                    </div>

                    <div class="glass-card rounded-2xl p-6 lg:p-8 animate-on-scroll">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 rounded-xl bg-gradient-to-br from-arch-orange to-arch-yellow/30 flex items-center justify-center mb-5 lg:mb-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FF7A18" stroke-width="1.5"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>
                        </div>
                        <h3 class="text-lg lg:text-xl font-bold mb-3">Inteligencia Artificial</h3>
                        <p class="text-white/50 text-sm lg:text-base leading-relaxed">Sumérgete en el mundo de la IA: Machine Learning, Deep Learning, NLP y desarrollo de agentes inteligentes.</p>
                    </div>

                    <div class="glass-card rounded-2xl p-6 lg:p-8 animate-on-scroll">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 rounded-xl bg-gradient-to-br from-arch-pink to-arch-purple/30 flex items-center justify-center mb-5 lg:mb-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FF2D95" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <h3 class="text-lg lg:text-xl font-bold mb-3">Ciberseguridad</h3>
                        <p class="text-white/50 text-sm lg:text-base leading-relaxed">Protege el mundo digital. Aprende ethical hacking, análisis de vulnerabilidades y seguridad en la nube.</p>
                    </div>

                    <div class="glass-card rounded-2xl p-6 lg:p-8 animate-on-scroll">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 rounded-xl bg-gradient-to-br from-arch-blue to-arch-cyan/30 flex items-center justify-center mb-5 lg:mb-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2F7BFF" stroke-width="1.5"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>
                        </div>
                        <h3 class="text-lg lg:text-xl font-bold mb-3">Data Science</h3>
                        <p class="text-white/50 text-sm lg:text-base leading-relaxed">Convierte datos en decisiones. Python, SQL, visualización de datos y análisis predictivo avanzado.</p>
                    </div>

                    <div class="glass-card rounded-2xl p-6 lg:p-8 animate-on-scroll">
                        <div class="w-12 h-12 lg:w-14 lg:h-14 rounded-xl bg-gradient-to-br from-arch-yellow to-arch-orange/30 flex items-center justify-center mb-5 lg:mb-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFC107" stroke-width="1.5"><path d="M12 15a3 3 0 100-6 3 3 0 000 6z"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 01-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
                        </div>
                        <h3 class="text-lg lg:text-xl font-bold mb-3">DevOps & Cloud</h3>
                        <p class="text-white/50 text-sm lg:text-base leading-relaxed">Domina Docker, Kubernetes, AWS, Azure y CI/CD. Automatiza y escala infraestructura moderna.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- CURSOS --}}
        <section id="cursos" class="py-24 lg:py-32 relative overflow-hidden">
            <div class="hero-glow" style="top: 20%; right: -300px; background: #FF2D95; opacity: 0.1;"></div>
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="animate-on-scroll">
                    <h2 class="section-title">Cursos <span class="gradient-text">Destacados</span></h2>
                    <p class="section-subtitle">Programas diseñados para llevarte de cero a experto</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
                    <div class="course-card glass-card rounded-2xl p-6 lg:p-8 animate-on-scroll">
                        <div class="glow-hover"></div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <span class="tag">Avanzado</span>
                                <span class="text-arch-cyan font-bold text-lg">$249</span>
                            </div>
                            <h3 class="text-xl font-bold mb-3">Full Stack Web</h3>
                            <p class="text-white/50 text-sm leading-relaxed mb-6">Laravel + React + Vue. Construye aplicaciones web completas desde el backend hasta el frontend.</p>
                            <div class="flex items-center gap-2 text-sm text-white/40">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                12 semanas
                                <span class="mx-2">·</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                                Cupo limitado
                            </div>
                        </div>
                    </div>

                    <div class="course-card glass-card rounded-2xl p-6 lg:p-8 animate-on-scroll">
                        <div class="glow-hover"></div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <span class="tag" style="background: rgba(0, 194, 255, 0.15); color: #00C2FF; border-color: rgba(0, 194, 255, 0.2);">Intermedio</span>
                                <span class="text-arch-cyan font-bold text-lg">$199</span>
                            </div>
                            <h3 class="text-xl font-bold mb-3">Flutter Mobile</h3>
                            <p class="text-white/50 text-sm leading-relaxed mb-6">Crea apps nativas para iOS y Android con una sola base de código. Dart, Widgets, State Management.</p>
                            <div class="flex items-center gap-2 text-sm text-white/40">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                10 semanas
                                <span class="mx-2">·</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                                15 estudiantes
                            </div>
                        </div>
                    </div>

                    <div class="course-card glass-card rounded-2xl p-6 lg:p-8 animate-on-scroll">
                        <div class="glow-hover"></div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <span class="tag" style="background: rgba(255, 45, 149, 0.15); color: #FF2D95; border-color: rgba(255, 45, 149, 0.2);">Premium</span>
                                <span class="text-arch-cyan font-bold text-lg">$449</span>
                            </div>
                            <h3 class="text-xl font-bold mb-3">IA & Machine Learning</h3>
                            <p class="text-white/50 text-sm leading-relaxed mb-6">Python, TensorFlow, PyTorch. Desde los fundamentos hasta redes neuronales y modelos generativos.</p>
                            <div class="flex items-center gap-2 text-sm text-white/40">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                16 semanas
                                <span class="mx-2">·</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                                10 estudiantes
                            </div>
                        </div>
                    </div>

                    <div class="course-card glass-card rounded-2xl p-6 lg:p-8 animate-on-scroll">
                        <div class="glow-hover"></div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <span class="tag" style="background: rgba(255, 122, 24, 0.15); color: #FF7A18; border-color: rgba(255, 122, 24, 0.2);">Principiante</span>
                                <span class="text-arch-cyan font-bold text-lg">$149</span>
                            </div>
                            <h3 class="text-xl font-bold mb-3">Ciberseguridad Esencial</h3>
                            <p class="text-white/50 text-sm leading-relaxed mb-6">Fundamentos de seguridad informática. Ethical hacking, pentesting y protección de datos.</p>
                            <div class="flex items-center gap-2 text-sm text-white/40">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                8 semanas
                                <span class="mx-2">·</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                                20 estudiantes
                            </div>
                        </div>
                    </div>

                    <div class="course-card glass-card rounded-2xl p-6 lg:p-8 animate-on-scroll">
                        <div class="glow-hover"></div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <span class="tag" style="background: rgba(47, 123, 255, 0.15); color: #2F7BFF; border-color: rgba(47, 123, 255, 0.2);">Avanzado</span>
                                <span class="text-arch-cyan font-bold text-lg">$299</span>
                            </div>
                            <h3 class="text-xl font-bold mb-3">DevOps & Cloud</h3>
                            <p class="text-white/50 text-sm leading-relaxed mb-6">Docker, Kubernetes, CI/CD, AWS, Azure. Automatización y escalabilidad en la nube.</p>
                            <div class="flex items-center gap-2 text-sm text-white/40">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                14 semanas
                                <span class="mx-2">·</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                                12 estudiantes
                            </div>
                        </div>
                    </div>

                    <div class="course-card glass-card rounded-2xl p-6 lg:p-8 animate-on-scroll">
                        <div class="glow-hover"></div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-6">
                                <span class="tag" style="background: rgba(255, 193, 7, 0.15); color: #FFC107; border-color: rgba(255, 193, 7, 0.2);">Intermedio</span>
                                <span class="text-arch-cyan font-bold text-lg">$179</span>
                            </div>
                            <h3 class="text-xl font-bold mb-3">Data Analytics</h3>
                            <p class="text-white/50 text-sm leading-relaxed mb-6">SQL, Python, Power BI, Tableau. Convierte datos crudos en insights accionables para el negocio.</p>
                            <div class="flex items-center gap-2 text-sm text-white/40">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                10 semanas
                                <span class="mx-2">·</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                                18 estudiantes
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-12 animate-on-scroll">
                    <a href="#" class="btn-outline px-10 py-4">Ver Todos los Cursos</a>
                </div>
            </div>
        </section>

        {{-- PORTFOLIO --}}
        <section id="portfolio" class="py-24 lg:py-32">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="animate-on-scroll">
                    <h2 class="section-title">Proyectos <span class="gradient-text">Realizados</span></h2>
                    <p class="section-subtitle">Trabajos que hablan por sí solos. Innovación y calidad en cada línea de código.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
                    <div class="project-card glass-card rounded-2xl overflow-hidden animate-on-scroll group">
                        <div class="aspect-video bg-gradient-to-br from-arch-dark-2 to-arch-muted/30 flex items-center justify-center relative overflow-hidden">
                            <svg width="40" height="40" class="lg:w-12 lg:h-12" viewBox="0 0 24 24" fill="none" stroke="#9B4DFF" stroke-width="1" class="opacity-30"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
                            <div class="project-overlay">
                                <div>
                                    <h4 class="font-bold text-base lg:text-lg">E-Commerce Platform</h4>
                                    <p class="text-xs lg:text-sm text-white/60 mt-1">Laravel · React · Stripe</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-5 lg:p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="tag">Web</span>
                                <span class="tag" style="background: rgba(255, 45, 149, 0.15); color: #FF2D95; border-color: rgba(255, 45, 149, 0.2);">Laravel</span>
                            </div>
                            <h4 class="font-bold text-base lg:text-lg mb-2">E-Commerce Platform</h4>
                            <p class="text-xs lg:text-sm text-white/50">Plataforma de comercio electrónico con pasarela de pagos, dashboard analítico y carrito inteligente.</p>
                        </div>
                    </div>

                    <div class="project-card glass-card rounded-2xl overflow-hidden animate-on-scroll group">
                        <div class="aspect-video bg-gradient-to-br from-arch-dark-3 to-arch-muted/30 flex items-center justify-center relative overflow-hidden">
                            <svg width="40" height="40" class="lg:w-12 lg:h-12" viewBox="0 0 24 24" fill="none" stroke="#00C2FF" stroke-width="1" class="opacity-30"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                            <div class="project-overlay">
                                <div>
                                    <h4 class="font-bold text-base lg:text-lg">AI Chat Assistant</h4>
                                    <p class="text-xs lg:text-sm text-white/60 mt-1">Python · OpenAI · FastAPI</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-5 lg:p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="tag" style="background: rgba(0, 194, 255, 0.15); color: #00C2FF; border-color: rgba(0, 194, 255, 0.2);">IA</span>
                                <span class="tag" style="background: rgba(255, 122, 24, 0.15); color: #FF7A18; border-color: rgba(255, 122, 24, 0.2);">Python</span>
                            </div>
                            <h4 class="font-bold text-base lg:text-lg mb-2">AI Chat Assistant</h4>
                            <p class="text-xs lg:text-sm text-white/50">Asistente conversacional con inteligencia artificial para atención al cliente 24/7.</p>
                        </div>
                    </div>

                    <div class="project-card glass-card rounded-2xl overflow-hidden animate-on-scroll group">
                        <div class="aspect-video bg-gradient-to-br from-arch-dark-4 to-arch-muted/30 flex items-center justify-center relative overflow-hidden">
                            <svg width="40" height="40" class="lg:w-12 lg:h-12" viewBox="0 0 24 24" fill="none" stroke="#FF2D95" stroke-width="1" class="opacity-30"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 9h.01M15 9h.01M9 15h6"/></svg>
                            <div class="project-overlay">
                                <div>
                                    <h4 class="font-bold text-base lg:text-lg">FitTrack App</h4>
                                    <p class="text-xs lg:text-sm text-white/60 mt-1">Flutter · Firebase · Health API</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-5 lg:p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="tag" style="background: rgba(255, 193, 7, 0.15); color: #FFC107; border-color: rgba(255, 193, 7, 0.2);">Mobile</span>
                                <span class="tag" style="background: rgba(0, 194, 255, 0.15); color: #00C2FF; border-color: rgba(0, 194, 255, 0.2);">Flutter</span>
                            </div>
                            <h4 class="font-bold text-base lg:text-lg mb-2">FitTrack App</h4>
                            <p class="text-xs lg:text-sm text-white/50">App de fitness con seguimiento en tiempo real, rutinas personalizadas y gamificación.</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-12 animate-on-scroll">
                    <a href="#" class="btn-primary px-10 py-4">Ver Más Proyectos</a>
                </div>
            </div>
        </section>

        {{-- BLOG --}}
        <section id="blog" class="py-24 lg:py-32 relative overflow-hidden">
            <div class="hero-glow" style="bottom: -200px; left: -300px; background: #00C2FF; opacity: 0.08;"></div>
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="animate-on-scroll">
                    <h2 class="section-title">Blog & <span class="gradient-text">Recursos</span></h2>
                    <p class="section-subtitle">Artículos, tutoriales y guías para mantenerte actualizado</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
                    <div class="glass-card rounded-2xl overflow-hidden animate-on-scroll group">
                        <div class="h-40 lg:h-48 bg-gradient-to-br from-arch-purple/20 to-arch-dark-2 flex items-center justify-center">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#9B4DFF" stroke-width="1" class="opacity-40"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 text-xs text-white/40 mb-4">
                                <span>Mar 15, 2026</span>
                                <span>·</span>
                                <span>5 min de lectura</span>
                            </div>
                            <h4 class="font-bold text-lg mb-3 group-hover:text-arch-purple transition-colors">Guía Completa de Laravel 12</h4>
                            <p class="text-sm text-white/50 leading-relaxed">Descubre las nuevas características de Laravel 12 y cómo aprovecharlas en tus proyectos.</p>
                        </div>
                    </div>

                    <div class="glass-card rounded-2xl overflow-hidden animate-on-scroll group">
                        <div class="h-40 lg:h-48 bg-gradient-to-br from-arch-cyan/20 to-arch-dark-3 flex items-center justify-center">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#00C2FF" stroke-width="1" class="opacity-40"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 text-xs text-white/40 mb-4">
                                <span>Feb 28, 2026</span>
                                <span>·</span>
                                <span>8 min de lectura</span>
                            </div>
                            <h4 class="font-bold text-lg mb-3 group-hover:text-arch-cyan transition-colors">Introducción a Machine Learning</h4>
                            <p class="text-sm text-white/50 leading-relaxed">Los fundamentos del ML explicados de forma clara con ejemplos prácticos en Python.</p>
                        </div>
                    </div>

                    <div class="glass-card rounded-2xl overflow-hidden animate-on-scroll group">
                        <div class="h-40 lg:h-48 bg-gradient-to-br from-arch-pink/20 to-arch-dark-4 flex items-center justify-center">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#FF2D95" stroke-width="1" class="opacity-40"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 text-xs text-white/40 mb-4">
                                <span>Feb 10, 2026</span>
                                <span>·</span>
                                <span>6 min de lectura</span>
                            </div>
                            <h4 class="font-bold text-lg mb-3 group-hover:text-arch-pink transition-colors">Seguridad en APIs REST</h4>
                            <p class="text-sm text-white/50 leading-relaxed">Mejores prácticas para asegurar tus APIs: autenticación, rate limiting y cifrado.</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-12 animate-on-scroll">
                    <a href="#" class="btn-outline px-10 py-4">Ver Todos los Artículos</a>
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <section class="py-16 lg:py-20">
            <div class="max-w-4xl mx-auto px-6 lg:px-8">
                <div class="glass-card rounded-3xl p-10 lg:p-16 text-center animate-on-scroll relative overflow-hidden gradient-border">
                    <div class="hero-glow" style="top: -100px; right: -100px; background: #9B4DFF; opacity: 0.15;"></div>
                    <div class="relative z-10">
                        <h2 class="text-3xl lg:text-5xl font-black mb-6">¿Listo para <span class="gradient-text">transformar</span> tu futuro?</h2>
                        <p class="text-white/50 text-lg max-w-2xl mx-auto mb-8">Únete a ARCHFOUNDRY y conviértete en el arquitecto digital que el mundo necesita.</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="#contacto" class="btn-primary text-base px-10 py-4">Inscribirme Ahora</a>
                            <a href="#cursos" class="btn-outline text-base px-10 py-4">Ver Programas</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- CONTACTO --}}
        <section id="contacto" class="py-24 lg:py-32">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="animate-on-scroll">
                    <h2 class="section-title">Hablemos <span class="gradient-text">de tu futuro</span></h2>
                    <p class="section-subtitle">Estamos listos para ayudarte a dar el siguiente paso en tu carrera tech</p>
                </div>

                <div class="grid lg:grid-cols-2 gap-12 max-w-5xl mx-auto">
                    <div class="animate-on-scroll">
                        <form class="space-y-5">
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm text-white/60 mb-2">Nombre</label>
                                    <input type="text" class="input-field" placeholder="Tu nombre">
                                </div>
                                <div>
                                    <label class="block text-sm text-white/60 mb-2">Email</label>
                                    <input type="email" class="input-field" placeholder="tu@email.com">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm text-white/60 mb-2">Teléfono</label>
                                <input type="tel" class="input-field" placeholder="+57 300 123 4567">
                            </div>
                            <div>
                                <label class="block text-sm text-white/60 mb-2">Mensaje</label>
                                <textarea class="input-field" rows="5" placeholder="Cuéntanos sobre tu proyecto o consulta..."></textarea>
                            </div>
                            <button type="submit" class="btn-primary w-full text-base py-4">Enviar Mensaje</button>
                        </form>
                    </div>

                    <div class="animate-on-scroll space-y-8">
                        <div>
                            <h3 class="text-xl font-bold mb-6">Información de Contacto</h3>
                            <div class="space-y-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-arch-purple/20 flex items-center justify-center flex-shrink-0">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#9B4DFF" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-white/40">Ubicación</p>
                                        <p class="font-medium">Bogotá, Colombia</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-arch-cyan/20 flex items-center justify-center flex-shrink-0">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00C2FF" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-white/40">Email</p>
                                        <p class="font-medium">hola@archfoundry.io</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-arch-pink/20 flex items-center justify-center flex-shrink-0">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FF2D95" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-white/40">Teléfono</p>
                                        <p class="font-medium">+57 300 123 4567</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xl font-bold mb-6">Síguenos</h3>
                            <div class="flex gap-4">
                                <a href="#" class="w-12 h-12 rounded-xl glass-card flex items-center justify-center hover:border-arch-purple/40 transition-all">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                                </a>
                                <a href="#" class="w-12 h-12 rounded-xl glass-card flex items-center justify-center hover:border-arch-purple/40 transition-all">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
                                </a>
                                <a href="#" class="w-12 h-12 rounded-xl glass-card flex items-center justify-center hover:border-arch-purple/40 transition-all">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                                </a>
                                <a href="#" class="w-12 h-12 rounded-xl glass-card flex items-center justify-center hover:border-arch-purple/40 transition-all">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/><path d="M9 8h6M9 12h6M9 16h6"/></svg>
                                </a>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xl font-bold mb-4">Horarios</h3>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-white/40">Lun - Vie</span>
                                    <span>7:00 AM - 10:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-white/40">Sábados</span>
                                    <span>8:00 AM - 6:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-white/40">Domingos</span>
                                    <span>Cerrado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    {{-- FOOTER --}}
    <footer class="border-t border-white/5 py-12 relative z-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-arch-purple to-arch-pink flex items-center justify-center font-bold text-sm">
                        A
                    </div>
                    <span class="font-bold">ARCH<span class="text-arch-purple">FOUNDRY</span></span>
                </div>
                <p class="text-sm text-white/30 text-center">
                    &copy; {{ date('Y') }} ARCHFOUNDRY. Todos los derechos reservados. Forjando el futuro digital.
                </p>
                <div class="flex gap-6 text-sm text-white/30">
                    <a href="#" class="hover:text-white/60 transition-colors">Privacidad</a>
                    <a href="#" class="hover:text-white/60 transition-colors">Términos</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.add('hidden');
            });
        });

        // Scroll animations using Intersection Observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));

        // Navbar background on scroll
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            const currentScroll = window.scrollY;
            if (currentScroll > 80) {
                nav.style.borderBottom = '1px solid rgba(155, 77, 255, 0.1)';
            } else {
                nav.style.borderBottom = 'none';
            }
            lastScroll = currentScroll;
        });

        // Smooth close mobile menu on anchor click
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>