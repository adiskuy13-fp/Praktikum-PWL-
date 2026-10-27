<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Praktikum Web Lanjut</title>
</head>
<body>
    <h1>Login</h1>
    <p>Silakan masuk untuk mengakses aplikasi.</p>

    <form method="POST" action="{{ route('login.authenticate') }}"> 
        @csrf
        <div> 
            <label for="email">Email</label> 
            <input 
                type="email" 
                id="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autofocus 
            > 
            @error('email') 
                <p>{{ $message }}</p> 
            @enderror 
        </div> 

        <div>
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                required
            >
            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Login</button>
    </form>
</body>
</html>