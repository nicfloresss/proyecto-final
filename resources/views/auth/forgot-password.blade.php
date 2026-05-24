<x-guest-layout>
    <style>
        body { background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 50%, #fbcfe8 100%) !important; min-height: 100vh; }
        .card {
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 20px 60px rgba(219, 39, 119, 0.15);
            padding: 2.5rem 2rem;
        }
        .icon-wrap {
            width: 3.5rem; height: 3.5rem;
            background: linear-gradient(135deg, #f9a8d4, #ec4899);
            border-radius: 1rem;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }
        .input-pink {
            width: 100%;
            border: 1.5px solid #fbcfe8;
            border-radius: 0.75rem;
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            box-sizing: border-box;
        }
        .input-pink:focus {
            border-color: #ec4899;
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.12);
        }
        .btn-pink-full {
            width: 100%;
            background: linear-gradient(135deg, #ec4899, #db2777);
            color: white;
            border: none;
            border-radius: 0.75rem;
            padding: 0.75rem;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.15s;
        }
        .btn-pink-full:hover { opacity: 0.92; transform: translateY(-1px); }
        .label-pink { display: block; font-size: 0.8rem; font-weight: 700; color: #9d174d; margin-bottom: 0.35rem; }
        .error-msg { color: #e11d48; font-size: 0.75rem; margin-top: 0.3rem; }
        .info-box {
            background: #fdf2f8;
            border: 1px solid #f9a8d4;
            border-radius: 0.75rem;
            padding: 0.875rem 1rem;
            font-size: 0.82rem;
            color: #9d174d;
            line-height: 1.5;
        }
    </style>

    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 1.5rem;">
        <div style="width: 100%; max-width: 26rem;">

            <div style="text-align: center; margin-bottom: 1.75rem;">
                <div class="icon-wrap">📧</div>
                <h1 style="font-size: 1.5rem; font-weight: 800; color: #831843; margin: 0;">Recuperar contraseña</h1>
                <p style="font-size: 0.85rem; color: #be185d; margin-top: 0.25rem;">Te enviamos un enlace a tu correo</p>
            </div>

            <div class="card">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="info-box" style="margin-bottom: 1.25rem;">
                    💌 Ingresa tu correo y te enviaremos un enlace para elegir una nueva contraseña.
                </div>

                <form method="POST" action="{{ route('password.email') }}" style="display: flex; flex-direction: column; gap: 1.1rem;">
                    @csrf

                    <div>
                        <label for="email" class="label-pink">Correo electrónico</label>
                        <input id="email" type="email" name="email"
                               value="{{ old('email') }}"
                               required autofocus
                               placeholder="tu@correo.com"
                               class="input-pink">
                        @error('email')<p class="error-msg">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="btn-pink-full">💌 Enviar enlace de recuperación</button>
                </form>

                <div style="text-align: center; margin-top: 1.25rem;">
                    <a href="{{ route('login') }}"
                       style="font-size: 0.8rem; color: #be185d; text-decoration: none; font-weight: 600;">
                        ← Volver al inicio de sesión
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>