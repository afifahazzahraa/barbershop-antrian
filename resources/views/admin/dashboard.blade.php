<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - High Visibility</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&family=Oswald:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-body: #0f1113;
            --card-bg: #1a1d21;
            --gold-bright: #ffcc33; /* Emas lebih terang agar terbaca */
            --white-text: #ffffff;
            --muted-text: #b0b3b8;
            --border-line: #3a3f44;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--white-text);
            letter-spacing: 0.2px;
        }

        /* Navigasi Tegas */
        .navbar-admin {
            background-color: #000;
            border-bottom: 4px solid var(--gold-bright);
            padding: 1rem 0;
        }

        .brand-text {
            font-family: 'Oswald', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--gold-bright) !important;
            text-transform: uppercase;
        }

        /* Kartu Statistik Sangat Jelas */
        .stat-card {
            background: var(--card-bg);
            border: 2px solid var(--border-line);
            border-radius: 16px;
            padding: 1.5rem;
        }

        .stat-label {
            color: var(--muted-text);
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-value {
            font-family: 'Oswald', sans-serif;
            font-size: 3.5rem; /* Angka diperbesar */
            font-weight: 700;
            line-height: 1;
            margin-top: 10px;
        }

        /* Tabel dengan Kontras Tinggi */
        .table-container {
            background: var(--card-bg);
            border-radius: 16px;
            border: 1px solid var(--border-line);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .table { margin-bottom: 0; color: var(--white-text); }
        .table thead th {
            background-color: #24282d;
            color: var(--gold-bright);
            font-family: 'Oswald', sans-serif;
            font-weight: 600;
            padding: 18px;
            border-bottom: 2px solid var(--border-line);
            font-size: 1rem;
        }

        .table tbody td {
            padding: 20px 18px;
            border-bottom: 1px solid var(--border-line);
            font-size: 1.05rem; /* Ukuran font data diperbesar */
        }

        /* Nomor Antrian Paling Mencolok */
        .queue-id {
            display: inline-block;
            background: var(--gold-bright);
            color: #000;
            font-family: 'Oswald', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            padding: 4px 18px;
            border-radius: 8px;
            min-width: 70px;
            text-align: center;
        }

        .customer-name {
            font-weight: 700;
            font-size: 1.2rem;
            color: #000000ff;
        }

        /* Tombol Besar & Jelas */
        .btn-action {
            font-weight: 800;
            padding: 10px 20px;
            border-radius: 10px;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .btn-call { background-color: var(--gold-bright); color: #000; border: none; }
        .btn-call:hover { background-color: #e6b82e; color: #000; }

        .btn-done { background-color: #28a745; color: #fff; border: none; }
        
        .badge-info-custom {
            background: #3a3f44;
            color: #fff;
            font-weight: 600;
            padding: 8px 12px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-admin mb-5">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand brand-text" href="#">
            <i class="fas fa-scissors me-2"></i> GENTLEMAN'S CUT
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger fw-bold rounded-3">
                <i class="fas fa-sign-out-alt"></i> KELUAR
            </button>
        </form>
    </div>
</nav>

<div class="container">
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-label">Antrian Menunggu</div>
                <div class="stat-value text-warning">
                    {{ $queues->where('status', 'waiting')->count() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-label">Sedang Diproses</div>
                <div class="stat-value text-info">
                    {{ $queues->where('status', 'processing')->count() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-label">Selesai Hari Ini</div>
                <div class="stat-value text-success">
                    {{ $queues->where('status', 'completed')->count() }}
                </div>
            </div>
        </div>
    </div>

    <div class="table-container">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th width="100" class="text-center">NOMOR</th>
                        <th>PELANGGAN</th>
                        <th>LAYANAN</th>
                        <th>HARGA</th> <th width="150">STATUS</th>
                        <th width="200" class="text-center">KONTROL</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($queues as $q)
                    <tr>
                        <td class="text-center">
                            <span class="queue-id">{{ str_pad($q->queue_number, 2, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td>
                            <div class="customer-name" style="color: white !important;">{{ $q->customer_name }}</div>
                            <div class="text-muted fw-bold small"><i class="far fa-clock me-1"></i> {{ $q->created_at->format('H:i') }}</div>
                        </td>
                        <td>
                            <span class="badge badge-info-custom">
                                {{ $q->service->name }} </span>
                        </td>
                        <td class="fw-bold text-warning">
                            Rp {{ number_format($q->service->price, 0, ',', '.') }} </td>
                        <td>
                            @if($q->status == 'waiting')
                                <span class="text-warning fw-bolder">MENUNGGU</span>
                            @elseif($q->status == 'processing')
                                <span class="text-info fw-bolder">DIPROSES</span>
                            @else
                                <span class="text-success fw-bolder">SELESAI</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($q->status == 'waiting')
                                <a href="{{ route('queue.update', [$q->id, 'processing']) }}" class="btn btn-call btn-action w-100">PANGGIL</a>
                            @elseif($q->status == 'processing')
                                <a href="{{ route('queue.update', [$q->id, 'completed']) }}" class="btn btn-done btn-action w-100">SELESAI</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>