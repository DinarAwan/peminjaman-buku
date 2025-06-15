<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Pengambilan Buku</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            padding: 20px;
        }
        
        .ticket-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .header {
            text-align: center;
            border-bottom: 3px solid #2c3e50;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .header h1 {
            color: #2c3e50;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .header p {
            color: #666;
            font-size: 14px;
            font-style: italic;
        }
        
        .content {
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .book-cover {
            text-align: center;
        }
        
        .book-cover img {
            width: 120px;
            height: 160px;
            border: 2px solid #ddd;
            border-radius: 5px;
            object-fit: cover;
            background-color: #f0f0f0;
        }
        
        .book-cover-placeholder {
            width: 120px;
            height: 160px;
            border: 2px dashed #ccc;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f8f8;
            color: #999;
            font-size: 12px;
            text-align: center;
            margin: 0 auto;
        }
        
        .info-section {
            display: grid;
            gap: 15px;
        }
        
        .info-row {
            display: grid;
            grid-template-columns: 140px 1fr;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        
        .info-label {
            font-weight: bold;
            color: #2c3e50;
            font-size: 14px;
        }
        
        .info-value {
            font-size: 14px;
            color: #333;
        }
        
        .status {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            background-color: #27ae60;
            color: white;
        }
        
        .barcode-section {
            text-align: center;
            margin: 30px 0;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        
        .barcode-placeholder {
            width: 100px;
            height: 100px;
            border: 2px dashed #ccc;
            margin: 0 auto 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            color: #999;
            font-size: 12px;
        }
        
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 11px;
            font-style: italic;
        }
        
        /* Print styles */
        @media print {
            body {
                background-color: white;
                padding: 0;
            }
            
            .ticket-container {
                box-shadow: none;
                border: 2px solid #333;
                max-width: none;
                margin: 0;
            }
            
            .header h1 {
                color: #000;
            }
            
            .info-label {
                color: #000;
            }
            
            .status {
                background-color: #666 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="header">
            <h1>Tiket Pengambilan Buku</h1>
            <p>Tunjukkan tiket ini ke petugas perpustakaan saat mengambil buku dan peminjaman disetujui.</p>
        </div>
        
        <div class="content">
            <div class="book-cover">
                <!-- Placeholder untuk cover buku -->
                <div class="book-cover-placeholder">
                    <img src="{{ asset('1.jpg') }}" alt="QR Code">
                </div>
            </div>
            
            <div class="info-section">
                <div class="info-row">
                    <div class="info-label">Nama Peminjam:</div>
                    <div class="info-value">{{$user->name}}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Email Peminjam:</div>
                    <div class="info-value">{{ $user->email }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Judul Buku:</div>
                    <div class="info-value">{{ $buku->judul }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Tanggal Pinjam:</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($buku->pivot->tanggal_pinjam)->format('d M Y') }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Tanggal Kembali:</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($buku->pivot->tanggal_kembali)->format('d M Y') }}</div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Status Peminjaman:</div>
                    <div class="info-value">
                        <span class="status">{{$buku->pivot->status}}</span>
                    </div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">Tanggal Cetak:</div>
                    <div class="info-value">11 Juni 2025, 14:30 WIB</div>
                </div>
            </div>
        </div>
        
        <div class="barcode-section">
            <div class="barcode-placeholder">
                <img src="{{ asset('qr.png') }}" alt="" width="100px" height="100px">
            </div>
            <p style="font-size: 12px; color: #666;">Scan kode ini untuk verifikasi</p>
        </div>
        
        <div class="footer">
            Tiket ini dicetak secara otomatis oleh sistem perpustakaan.
        </div>
    </div>
</body>
</html>
