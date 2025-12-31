<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Barbershop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1503951914875-452162b0f3f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            color: white;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.5);
        }

        .brand-title {
            font-family: 'Playfair Display', serif;
            color: #d4af37; /* Gold Color */
            font-size: 2.5rem;
            letter-spacing: 2px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 8px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border-color: #d4af37;
            box-shadow: none;
        }

        .btn-gold {
            background-color: #d4af37;
            color: black;
            font-weight: 600;
            border: none;
            transition: 0.3s;
        }

        .btn-gold:hover {
            background-color: #b8962e;
            transform: translateY(-2px);
        }

        .barber-icon {
            width: 80px;
            margin-bottom: 20px;
            filter: invert(1);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="login-card text-center">
                <div class="brand-title mb-2">GENTLEMAN'S</div>
                <p class="text-white-50 mb-4">BARBERSHOP ADMIN PANEL</p>

                @if ($errors->any())
                    <div class="alert alert-danger py-2 small">
                        Username atau password salah.
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="text-start mb-3">
                        <label for="email" class="form-label small">Email Address</label>
                        <input type="email" name="email" class="form-control" id="email" required autofocus>
                    </div>

                    <div class="text-start mb-4">
                        <label for="password" class="form-label small">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <div class="mb-4 text-start form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label small" for="remember">Ingat Saya</label>
                    </div>

                    <button type="submit" class="btn btn-gold w-100 py-2 mb-3">MASUK KASIR</button>
                    
                    <a href="/" class="text-white-50 text-decoration-none small"> Kembali ke Beranda</a>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>