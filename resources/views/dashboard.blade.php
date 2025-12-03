<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .header h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .filter-form {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            gap: 15px;
            align-items: end;
            flex-wrap: wrap;
        }

        .form-control {
            flex: 1;
            min-width: 200px;
        }

        .form-control label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }

        .form-control input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-control input:focus {
            outline: none;
            border-color: #667eea;
        }

        .btn {
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .stats-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .stats-card h2 {
            color: #555;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .total-amount {
            font-size: 42px;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .table-container {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            overflow-x: auto;
        }

        .table-container h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
        }

        tbody tr:hover {
            background: #f8f9fa;
        }

        .chart-container {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .chart-container h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .chart-wrapper {
            position: relative;
            height: 400px;
        }

        .text-right {
            text-align: right;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📊 Dashboard Penjualan</h1>
            <p style="color: #777;">Laporan penjualan produk Anda</p>
        </div>

        <!-- Filter Form -->
        <div class="filter-form">
            <form method="GET" action="{{ route('dashboard') }}">
                <div class="form-group">
                    <div class="form-control">
                        <label for="tanggal_awal">Tanggal Awal</label>
                        <input type="date" name="tanggal_awal" id="tanggal_awal" value="{{ request('tanggal_awal') }}">
                    </div>
                    <div class="form-control">
                        <label for="tanggal_akhir">Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" id="tanggal_akhir" value="{{ request('tanggal_akhir') }}">
                    </div>
                    <div class="form-control">
                        <button type="submit" class="btn">🔍 Filter</button>
                        <a href="{{ route('dashboard') }}" class="btn" style="margin-top: 10px; display: inline-block; text-decoration: none; background: #6c757d;">Reset</a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Total Penjualan -->
        <div class="stats-card">
            <h2>Total Penjualan</h2>
            <div class="total-amount">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</div>
        </div>

        <!-- Table -->
        <div class="table-container">
            <h2>Data Penjualan</h2>
            @if($penjualan->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Tanggal Penjualan</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th class="text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualan as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_penjualan)->format('d/m/Y') }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="text-right">Rp {{ number_format($item->jumlah * $item->harga, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="empty-state">
                <p>Tidak ada data penjualan untuk periode yang dipilih.</p>
            </div>
            @endif
        </div>

        <!-- Chart -->
        <div class="chart-container">
            <h2>Grafik Tren Penjualan</h2>
            <div class="chart-wrapper">
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        // Prepare chart data
        const chartData = @json($chartData);
        
        const labels = chartData.map(item => {
            const date = new Date(item.tanggal);
            return date.toLocaleDateString('id-ID', { day: '2-digit', month: 'short' });
        });
        
        const totals = chartData.map(item => parseFloat(item.total));

        // Create chart
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Penjualan (Rp)',
                    data: totals,
                    borderColor: 'rgb(102, 126, 234)',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: 'rgb(102, 126, 234)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Total: Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>

