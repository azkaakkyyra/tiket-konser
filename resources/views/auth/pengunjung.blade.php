<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengunjung</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background-color: #f3f6d5;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        h2 {
            font-size: 42px;
            font-weight: bold;
            color: #8e7cc3;
            text-shadow: 3px 3px #cfcfcf;
            margin-bottom: 30px;
            position: relative;
            text-align: center;
        }

        h2::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 100%;
            height: 5px;
            background-color: #d9534f;
        }

        .card {
            background-color: #a8dadc;
            padding: 30px;
            width: 100%;
            max-width: 480px;
            border-radius: 12px;
            box-shadow: 8px 8px 0 rgba(0,0,0,0.15);
        }

        .card p {
            background-color: rgba(255,255,255,0.5);
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background-color: #f3f6d5;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #e4e9b8;
        }

        @media (max-width: 480px) {
            h2 {
                font-size: 32px;
            }

            .card {
                margin: 0 15px;
            }
        }
    </style>
</head>
<body>

<h2>Selamat datang, {{ $user->name }}</h2>

<div class="card">

@if($ticket)
    <p>Nama: {{ $user->name }}</p>
    <p>Kamu memiliki tiket dengan kode: <strong>{{ $ticket->ticket_code }}</strong></p>
    <p>Jenis: {{ strtoupper($ticket->type) }}</p>
    <p>Status: {{ $ticket->status }}</p>
    <p>Waktu Pemesanan: {{ $ticket->ordered_at }}</p>
@else
    <p>Belum memiliki tiket.</p>
@endif

<form method="POST" action="/logout">
    @csrf
    
    <button type="submit">Logout</button>
</form>

</div>

</body>
</html>
