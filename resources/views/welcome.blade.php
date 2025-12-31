<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GENTLEMAN'S - Premium Barbershop</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&family=Playfair+Display:wght@900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --gold: #FFD700;
            --black: #000000;
            --card-grey: #1e1e1e;
            --text-pure: #FFFFFF;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--black);
            color: var(--text-pure);
            letter-spacing: -0.02em;
        }

        .navbar {
            background: rgba(0, 0, 0, 0.9) !important;
            border-bottom: 2px solid var(--gold);
            backdrop-filter: blur(10px);
        }

        .hero-title {
            font-size: 3.5rem;
            line-height: 1.1;
            background: linear-gradient(to right, #fff, var(--gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 900;
            text-transform: uppercase;
        }

        .modern-card {
            background: var(--card-grey);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            overflow: visible; 
        }

        .monitor-card {
            background: linear-gradient(180deg, #1e1e1e 0%, #000000 100%);
            border: 2px solid var(--gold);
            box-shadow: 0 0 35px rgba(255, 215, 0, 0.25);
        }

        /* Placeholder Nama - SANGAT JELAS */
        .form-control::placeholder {
            color: #FFFFFF !important;
            opacity: 1 !important;
            font-weight: 800;
        }

        .form-control, .form-select {
            background: #2a2a2a !important;
            border: 2px solid #333 !important;
            color: white !important;
            height: 65px;
            font-weight: 700;
            border-radius: 0 15px 15px 0 !important;
        }

        .input-group-text {
            background: #2a2a2a !important;
            border: 2px solid #333 !important;
            color: var(--gold) !important;
            border-radius: 15px 0 0 15px !important;
        }

        .gallery-img {
            width: 100%;
            height: 380px;
            object-fit: cover;
            border-radius: 25px;
            border: 2px solid var(--gold);
            margin-bottom: 30px;
        }

        .btn-premium {
            background: var(--gold);
            color: black;
            font-weight: 900;
            border-radius: 15px;
            padding: 20px;
            font-size: 1.2rem;
            border: none;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .btn-premium:hover {
            background: #fff;
            transform: scale(1.02);
        }

        .current-number {
            font-size: 9rem;
            font-weight: 900;
            color: var(--gold);
            text-shadow: 4px 4px 0px rgba(0,0,0,1);
            line-height: 1;
        }

        .ready-text {
            color: var(--gold);
            font-weight: 800;
            font-size: 1.8rem;
            animation: fadeInOut 2s infinite;
        }

        @keyframes fadeInOut {
            0% { opacity: 0.6; }
            50% { opacity: 1; }
            100% { opacity: 0.6; }
        }

        .icon-box {
            background: #252525;
            padding: 20px;
            border-radius: 20px;
            text-align: center;
            border-bottom: 4px solid var(--gold);
        }

        /* Info Jam Buka di Monitor */
        .opening-hours-tag {
            background: rgba(255, 215, 0, 0.1);
            color: var(--gold);
            border: 1px solid var(--gold);
            padding: 8px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            display: inline-block;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-2" href="#">
                <i class="fas fa-scissors me-2 text-warning"></i>GENTLEMAN'S
            </a>
            <div class="d-flex align-items-center">
                <div class="text-end me-4 d-none d-md-block">
                    <small class="text-secondary d-block fw-bold" style="font-size: 0.7rem;">OPENING HOURS</small>
                    <span class="text-white fw-bold"><i class="far fa-clock text-warning me-1"></i> 09:00 - 21:00</span>
                </div>
                <a href="{{ route('login') }}" class="btn btn-warning fw-bold px-4 shadow-sm">ADMIN</a>
            </div>
        </div>
    </nav>

    <main class="container mt-5">
        <div class="row g-5">
            
            <div class="col-lg-7">
                <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?auto=format&fit=crop&q=80&w=1200" class="gallery-img shadow-lg">
                <div class="mb-5">
                    <h1 class="hero-title">DEFINISI GAYA TERBAIK,<br>WUJUDKAN KARAKTER ANDA.</h1>
                </div>

                <div class="modern-card p-4 p-md-5 mb-5 shadow-lg border border-warning">
                    <h3 class="mb-4 text-warning fw-bold"><i class="fas fa-user-plus me-2"></i> DAFTAR ANTRIAN</h3>
                    <form action="{{ route('queue.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label text-secondary">NAMA LENGKAP</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="customer_name" class="form-control" placeholder="TULIS NAMA ANDA DISINI..." required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-secondary">PILIH TREATMENT</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-cut"></i></span>
                                    <select name="service_id" class="form-control" required>
                                        <option value="">-- PILIH LAYANAN KAMI --</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}">
                                                {{ strtoupper($service->name) }} — Rp {{ number_format($service->price, 0, ',', '.') }}
                                            </option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-premium w-100 mt-3 shadow" style="color: black !important;">
                            AMBIL ANTRIAN SEKARANG <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="sticky-top" style="top: 100px;">
                    <div class="modern-card monitor-card p-5 text-center mb-4">
                        <div class="mb-3">
                            <span class="opening-hours-tag">
                                <i class="fas fa-door-open me-1"></i> SENIN - MINGGU: 09:00 - 21:00
                            </span>
                        </div>
                        
                        <p class="text-secondary fw-bold mb-0">NOMOR ANTRIAN SAAT INI</p>
                        <div class="current-number">
                            {{ $currentQueue ? $currentQueue->queue_number : '0' }}
                        </div>

                        <div class="mt-2">
                            @if($currentQueue)
                                <h2 class="text-white fw-bold">{{ $currentQueue->customer_name }}</h2>
                            @else
                                <h2 class="ready-text mt-2">SIAP TAMPIL BEDA?</h2>
                                <p class="text-secondary small fw-bold">SILAHKAN DAFTARKAN NAMA ANDA</p>
                            @endif
                        </div>
                        
                        <div class="row g-2 pt-4 mt-4 border-top border-secondary text-start">
                            <div class="col-6 border-end border-secondary">
                                <p class="small text-secondary mb-0 fw-bold">SISA ANTRIAN</p>
                                <h4 class="fw-bold text-white mb-0">{{ $totalWaiting }} ORANG</h4>
                            </div>
                            <div class="col-6 ps-3">
                                <p class="small text-secondary mb-0 fw-bold">ESTIMASI</p>
                                <h4 class="fw-bold text-warning mb-0">~{{ $totalWaiting * 15 }} MENIT</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-4"><div class="icon-box"><i class="fas fa-wifi text-warning mb-2 d-block fs-3"></i><span class="small fw-bold">WIFI</span></div></div>
                        <div class="col-4"><div class="icon-box"><i class="fas fa-coffee text-warning mb-2 d-block fs-3"></i><span class="small fw-bold">KOPI</span></div></div>
                        <div class="col-4"><div class="icon-box"><i class="fas fa-snowflake text-warning mb-2 d-block fs-3"></i><span class="small fw-bold">DINGIN</span></div></div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="text-center py-5 mt-5 border-top border-secondary">
        <p class="text-secondary fw-bold">© 2025 GENTLEMAN'S PREMIUM BARBERSHOP</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>