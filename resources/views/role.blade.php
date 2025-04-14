<x-app-layout>
    <h1>Estos son los roles<h1>
    <h2>Tienes el rol de {{$user->role}}</h2>
    @if ($user->role == 'admin')
        <div class="alert alert-success" role="alert">
            <i class="bi bi-check-circle-fill"></i>Esto solo lo puede ver un admin
        </div>
    @endif
    
</x-app-layout>
