<x-guest-layout>
    <style>
        body { background: linear-gradient(135deg, #fdf2f8 0%, #fce7f3 50%, #fbcfe8 100%) !important; min-height: 100vh; }
        .login-card {
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 20px 60px rgba(219, 39, 119, 0.15);
            padding: 2.5rem 2rem;
        }
        .icon-wrap {
            width: 3.5rem; height: 3.5rem;
            background: linear-gradient(135deg, #ec4899, #be185d);
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
            color: #1f2937;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
            box-sizing: border-box;
        }
        .input-pink:focus {
            border-color: #ec4899;
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.12);
        }
        .input-pink.error { border-color: #f87171; }
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
            text-align: center;
        }
        .btn-pink-full:hover { opacity: 0.92; transform: translateY(-1px); }
        
        .btn-outline-pink-full {
            width: 100%;
            background: white;
            color: #db2777;
            border: 2px solid #ec4899;
            border-radius: 0.75rem;
            padding: 0.70rem;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background 0.2s, transform 0.15s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            box-sizing: border-box;
        }
        .btn-outline-pink-full:hover { background: #fdf2f8; transform: translateY(-1px); }

        .label-pink {
            display: block;
            font-size: 0.8rem;
            font-weight: 700;
            color: #9d174d;
            margin-bottom: 0.35rem;
        }
        .error-msg { color: #e11d48; font-size: 0.75rem; margin-top: 0.3rem; }
    </style>

    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 1.5rem;">
        <div style="width: 100%; max-width: 26rem;">

            {{-- Encabezado --}}
            <div style="text-align: center; margin-bottom: 1.75rem;">
                <div class="icon-wrap">✨</div>
                <h1 style="font-size: 1.5rem; font-weight: 800; color: #831843; margin: 0;">Únete a Salón Bella</h1>
                <p style="font-size: 0.85rem; color: #be185d; margin-top: 0.25rem;">Crea tu cuenta para agendar tus citas</p>
            </div>

            {{-- Tarjeta de Registro --}}
            <div class="login-card">
                <form method="POST" action="{{ route('register') }}" style="display: flex; flex-direction: column; gap: 1.1rem;">
                    @csrf

                    <div>
                        <label for="name" class="label-pink">Nombre completo</label>
                        <input id="name" type="text" name="name" 
                               value="{{ old('name') }}" 
                               required autofocus autocomplete="name" 
                               placeholder="Tu nombre y apellido"
                               class="input-pink {{ $errors->has('name') ? 'error' : '' }}">
                        @error('name')<p class="error-msg">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="email" class="label-pink">Correo electrónico</label>
                        <input id="email" type="email" name="email" 
                               value="{{ old('email') }}" 
                               required autocomplete="username" 
                               placeholder="tu@correo.com"
                               class="input-pink {{ $errors->has('email') ? 'error' : '' }}">
                        @error('email')<p class="error-msg">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="password" class="label-pink">Contraseña</label>
                        <input id="password" type="password" name="password" 
                               required autocomplete="new-password" 
                               placeholder="Mínimo 8 caracteres"
                               class="input-pink {{ $errors->has('password') ? 'error' : '' }}">
                        @error('password')<p class="error-msg">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="label-pink">Confirmar contraseña</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" 
                               required autocomplete="new-password" 
                               placeholder="Repite tu contraseña"
                               class="input-pink {{ $errors->has('password_confirmation') ? 'error' : '' }}">
                        @error('password_confirmation')<p class="error-msg">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="btn-pink-full mt-2">
                        🌸 Registrarme
                    </button>

                    {{-- Separador y volver al Login --}}
                    <div style="display: flex; align-items: center; text-align: center; margin: 0.5rem 0;">
                        <hr style="flex-grow: 1; border: none; border-top: 1px solid #fbcfe8;">
                        <span style="padding: 0 0.5rem; font-size: 0.75rem; color: #be185d; font-weight: 600;">¿Ya tienes cuenta?</span>
                        <hr style="flex-grow: 1; border: none; border-top: 1px solid #fbcfe8;">
                    </div>

                    <a href="{{ route('login') }}" class="btn-outline-pink-full">
                        Iniciar sesión
                    </a>
                </form>
            </div>

            <p style="text-align: center; font-size: 0.75rem; color: #be185d; margin-top: 1.25rem;">
                ✨ Hecho con amor para tu salón
            </p>
        </div>
    </div>
</x-guest-layout>