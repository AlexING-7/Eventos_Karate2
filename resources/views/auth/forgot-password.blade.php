<x-guest-layout>
    <div class="password-reset-container">
        <div class="password-reset-card">
            <!-- Logo/Header -->
            <div class="password-reset-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#DC2626" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                </svg>
                <h2>Recuperar Contraseña</h2>
            </div>

            <!-- Mensaje Informativo -->
            <div class="password-reset-message">
                {{ __('¿Olvidaste tu contraseña? Ingresa tu correo electrónico y te enviaremos un enlace para restablecerla.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="password-reset-status" :status="session('status')" />

            <!-- Formulario -->
            <form method="POST" action="{{ route('password.email') }}" class="password-reset-form">
                @csrf

                <!-- Email Address -->
                <div class="input-group">
                    <x-input-label for="email" :value="__('Correo Electrónico')" />
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6B7280" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                            </svg>
                        </span>
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="tu@correo.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="input-error" />
                </div>

                <button type="submit" class="reset-button">
                    {{ __('Enviar Enlace de Recuperación') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
                </button>
            </form>

            <!-- Enlace de Regreso -->
            <div class="back-to-login">
                <a href="{{ route('login') }}">
                    ← Volver al inicio de sesión
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>

<style>
:root {
    --primary-color: #1E3A8A;
    --primary-light: #3B82F6;
    --accent-color: #DC2626;
    --accent-hover: #B91C1C;
    --text-color: #1F2937;
    --text-light: #6B7280;
    --light-gray: #F9FAFB;
    --medium-gray: #E5E7EB;
    --white: #FFFFFF;
    --error-color: #EF4444;
    --success-color: #10B981;
    --background-color: #F3F4F6;
    --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
}

body {
    background-color: var(--background-color);
    color: var(--text-color);
    line-height: 1.5;
}

.password-reset-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 1rem;
    background-color: var(--background-color);
}

.password-reset-card {
    background-color: var(--white);
    border-radius: 12px;
    padding: 2.5rem;
    width: 100%;
    max-width: 480px;
    box-shadow: var(--card-shadow);
    text-align: center;
}

.password-reset-header {
    margin-bottom: 1.5rem;
}

.password-reset-header h2 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-color);
    margin-top: 1rem;
}

.password-reset-message {
    color: var(--text-light);
    font-size: 0.9375rem;
    margin-bottom: 1.5rem;
    text-align: center;
}

.password-reset-status {
    color: var(--success-color);
    font-size: 0.875rem;
    margin-bottom: 1rem;
    font-weight: 500;
}

.password-reset-form {
    margin-top: 1.5rem;
}

.input-group {
    margin-bottom: 1.25rem;
    text-align: left;
}

.input-wrapper {
    position: relative;
    margin-top: 0.5rem;
}

.input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
}

input[type="email"] {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 2.5rem;
    border: 1px solid var(--medium-gray);
    border-radius: 8px;
    font-size: 0.875rem;
    transition: all 0.2s ease;
    background-color: var(--white);
}

input[type="email"]:focus {
    outline: none;
    border-color: var(--primary-light);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.input-error {
    color: var(--error-color);
    font-size: 0.75rem;
    margin-top: 0.25rem;
    text-align: left;
}

.reset-button {
    width: 100%;
    padding: 0.875rem;
    background-color: var(--accent-color);
    color: var(--white);
    border: none;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 1rem;
}

.reset-button:hover {
    background-color: var(--accent-hover);
    transform: translateY(-1px);
}

.reset-button:active {
    transform: translateY(0);
}

.back-to-login {
    margin-top: 1.5rem;
    font-size: 0.875rem;
}

.back-to-login a {
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
}

.back-to-login a:hover {
    color: var(--accent-hover);
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 640px) {
    .password-reset-card {
        padding: 1.5rem;
    }
}
</style>