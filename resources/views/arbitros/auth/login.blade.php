<x-guest-layout>
    <div class="arbitro-container">
        <div class="arbitro-wrapper">
            <!-- Sección de Imagen -->
            <div class="arbitro-image">
                <div class="image-overlay"></div>
                <div class="image-content">
                    <div class="sport-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.43-9.637v5.094c0 .595-.347.543-.75.543h-1.5c-.403 0-.75.052-.75-.543V6.363c0-.595.347-.543.75-.543h1.5c.403 0 .75-.052.75.543zM5.903 5.56c.686 0 1.06-.352 1.06-.949 0-.597-.374-.95-1.06-.95-.686 0-1.06.353-1.06.95 0 .597.374.949 1.06.949zm4.194 0c.686 0 1.06-.352 1.06-.949 0-.597-.374-.95-1.06-.95-.686 0-1.06.353-1.06.95 0 .597.374.949 1.06.949z"/>
                        </svg>
                    </div>
                    <h2>Panel de Árbitros</h2>
                    <p>Sistema oficial de gestión de partidos</p>
                </div>
            </div>
            
            <!-- Sección de Formulario -->
            <div class="arbitro-form">
                <div class="form-card">
                    <div class="form-header">
                        <h3>Inicio de Sesión</h3>
                        <p>Ingresa tus credenciales de árbitro</p>
                    </div>
                    
                    <form method="POST" action="{{ route('arbitro.login') }}" class="form-body">
                        @csrf

                        <div class="form-group">
                            <label for="email">Correo Institucional</label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                                    </svg>
                                </span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" 
                                       required autofocus autocomplete="username" 
                                       placeholder="arbitro@federacion.com">
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <div class="input-group">
                                <span class="input-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                    </svg>
                                </span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" required autocomplete="current-password" 
                                       placeholder="••••••••">
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-options">
                            <div class="remember-me">
                                <input type="checkbox" id="remember_me" name="remember">
                                <label for="remember_me">Mantener sesión</label>
                            </div>
                            
                            @if (Route::has('password.request'))
                                <a class="forgot-password" href="{{ route('password.request') }}">
                                    Recuperar contraseña
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="arbitro-button">
                            <span>Ingresar al Sistema</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg>
                        </button>
                    </form>
                    
                    <div class="form-footer">
                        <p>¿Necesitas ayuda? <a href="#">Soporte técnico</a></p>
                    </div>
                    <div class="form-footer">
                    <p>¿No tienes una cuenta? <a href="{{ route('arbitro.register') }}">Regístrate</a></p>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

<style>
:root {
    --primary-color: #1E3A8A;
    --primary-light: #3B82F6;
    --accent-color:rgb(112, 0, 0);
    --accent-hover:rgb(148, 92, 92);
    --text-color: #1F2937;
    --text-light:rgb(65, 65, 65);
    --light-gray: #F9FAFB;
    --medium-gray: #E5E7EB;
    --dark-gray: #6B7280;
    --white: #FFFFFF;
    --black: #111827;
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

.arbitro-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 1rem;
}

.arbitro-wrapper {
    display: flex;
    max-width: 1200px;
    width: 100%;
    min-height: 600px;
    background-color: var(--white);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.arbitro-image {
    flex: 1;
    background: url("{{ asset('image/arbitro.jpg') }}") no-repeat center center;
    background-size: cover;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.image-content {
    position: relative;
    z-index: 1;
    color: var(--white);
    text-align: center;
    max-width: 500px;
}

.sport-icon {
    margin-bottom: 1.5rem;
    color: var(--white);
}

.image-content h2 {
    font-size: 2rem;
    margin-bottom: 1rem;
    font-weight: 700;
    line-height: 1.2;
}

.image-content p {
    font-size: 1.125rem;
    opacity: 0.9;
    font-weight: 400;
}

.arbitro-form {
    flex: 1;
    padding: 3rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.form-card {
    width: 100%;
    max-width: 400px;
}

.form-header {
    margin-bottom: 2rem;
    text-align: center;
}

.form-header h3 {
    font-size: 1.5rem;
    color: var(--black);
    margin-bottom: 0.5rem;
    font-weight: 700;
}

.form-header p {
    color: var(--text-light);
    font-size: 0.875rem;
}

.form-body {
    width: 100%;
}

.form-group {
    margin-bottom: 1.25rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--text-color);
}

.input-group {
    position: relative;
    display: flex;
    align-items: center;
}

.input-icon {
    position: absolute;
    left: 1rem;
    color: var(--dark-gray);
}

.form-control {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 2.75rem;
    border: 1px solid var(--medium-gray);
    border-radius: 0.5rem;
    font-size: 0.875rem;
    transition: all 0.2s ease;
    background-color: var(--white);
}

.form-control:focus {
    outline: none;
    border-color: var(--primary-light);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-control.is-invalid {
    border-color: var(--error-color);
}

.invalid-feedback {
    color: var(--error-color);
    font-size: 0.75rem;
    margin-top: 0.25rem;
    display: block;
}

.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 1.5rem 0;
    font-size: 0.875rem;
}

.remember-me {
    display: flex;
    align-items: center;
}

.remember-me input {
    margin-right: 0.5rem;
    width: 1rem;
    height: 1rem;
    accent-color: var(--accent-color);
}

.remember-me label {
    color: var(--text-light);
    font-weight: 400;
}

.forgot-password {
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease;
}

.forgot-password:hover {
    color: var(--accent-hover);
    text-decoration: underline;
}

.arbitro-button {
    width: 100%;
    padding: 0.875rem;
    background-color: var(--accent-color);
    color: var(--white);
    border: none;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.arbitro-button:hover {
    background-color: var(--accent-hover);
    transform: translateY(-1px);
}

.arbitro-button:active {
    transform: translateY(0);
}

.form-footer {
    margin-top: 2rem;
    text-align: center;
    font-size: 0.875rem;
    color: var(--text-light);
}

.form-footer a {
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s ease;
}

.form-footer a:hover {
    color: var(--accent-hover);
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .arbitro-wrapper {
        flex-direction: column;
        min-height: auto;
    }
    
    .arbitro-image {
        padding: 3rem 2rem;
        min-height: 300px;
    }
    
    .arbitro-form {
        padding: 2rem;
    }
}

@media (max-width: 640px) {
    .arbitro-form {
        padding: 1.5rem;
    }
    
    .form-options {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.75rem;
    }
    
    .forgot-password {
        margin-top: 0;
    }
}
</style>