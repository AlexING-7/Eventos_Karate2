<x-guest-layout>
    <div class="register-container">
        <div class="register-wrapper">
            <!-- Image Section -->
            <div class="register-image">
                <div class="image-content">
                    <h2>Únete a nuestra plataforma</h2>
                    <p>Crea una cuenta para acceder a todos nuestros servicios</p>
                </div>
            </div>
            
            <!-- Form Section -->
            <div class="register-form">
                <div class="form-header">
                    <h3>Registrarse</h3>
                    <p>Crea tu cuenta en unos simples pasos</p>
                </div>
                
                <form method="POST" action="{{ route('register') }}" class="form-body">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <div class="input-group">
                            <span class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>
                            </span>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" 
                                   required autofocus autocomplete="name" 
                                   placeholder="Tu nombre completo">
                        </div>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <div class="input-group">
                            <span class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                                </svg>
                            </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" 
                                   required autocomplete="username" 
                                   placeholder="tu@correo.com">
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="input-group">
                            <span class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                </svg>
                            </span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required autocomplete="new-password" 
                                   placeholder="••••••••">
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Contraseña</label>
                        <div class="input-group">
                            <span class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                </svg>
                            </span>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation" 
                                   required autocomplete="new-password" 
                                   placeholder="••••••••">
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="register-button">
                        Registrarse
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </button>
                </form>
                
                <div class="form-footer">
                    <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Iniciar Sesión</a></p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

<style>
:root {
    --primary-color: #1a1a1a;
    --primary-light: #333333;
    --secondary-color: #444444;
    --text-color: #2b2d42;
    --light-gray: #f5f5f5;
    --medium-gray: #e0e0e0;
    --dark-gray: #6c757d;
    --white: #ffffff;
    --black: #000000;
    --error-color: #d90429;
    --success-color: #2ec4b6;
    --overlay-color: rgba(0, 0, 0, 0.3);
    --background-color: #f9f9f9;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: var(--background-color);
    color: var(--text-color);
    line-height: 1.6;
}

.register-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
    background-color: var(--background-color);
}

.register-wrapper {
    display: flex;
    max-width: 1000px;
    width: 100%;
    background-color: var(--white);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.register-image {
    flex: 1;
    background: url('image/registro.jpg') no-repeat center center;
    background-size: cover;
    position: relative;
    display: flex;
    align-items: flex-end;
    padding: 40px;
}

.image-content {
    position: relative;
    z-index: 1;
    color: var(--white);
    text-shadow: 0 1px 3px rgba(0,0,0,0.5);
}

.image-content h2 {
    font-size: 28px;
    margin-bottom: 10px;
    font-weight: 600;
}

.image-content p {
    font-size: 16px;
    opacity: 0.9;
}

.register-form {
    flex: 1;
    padding: 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.form-header {
    margin-bottom: 30px;
    text-align: center;
}

.form-header h3 {
    font-size: 24px;
    color: var(--text-color);
    margin-bottom: 10px;
    font-weight: 600;
}

.form-header p {
    color: var(--dark-gray);
    font-size: 14px;
}

.form-body {
    width: 100%;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-size: 14px;
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
    left: 15px;
    color: var(--dark-gray);
}

.form-control {
    width: 100%;
    padding: 12px 15px 12px 40px;
    border: 1px solid var(--medium-gray);
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s ease;
    background-color: var(--light-gray);
}

.form-control:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 2px rgba(26, 26, 26, 0.1);
}

.form-control.is-invalid {
    border-color: var(--error-color);
}

.invalid-feedback {
    color: var(--error-color);
    font-size: 12px;
    margin-top: 5px;
}

.register-button {
    width: 100%;
    padding: 14px;
    background-color: var(--primary-color);
    color: var(--white);
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10px;
}

.register-button svg {
    margin-left: 8px;
}

.register-button:hover {
    background-color: var(--primary-light);
}

.form-footer {
    margin-top: 30px;
    text-align: center;
    font-size: 14px;
    color: var(--dark-gray);
}

.form-footer a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.form-footer a:hover {
    color: var(--primary-light);
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 768px) {
    .register-wrapper {
        flex-direction: column;
    }
    
    .register-image {
        display: none;
    }
    
    .register-form {
        padding: 30px;
    }
}

@media (max-width: 480px) {
    .register-form {
        padding: 20px;
    }
}
</style>