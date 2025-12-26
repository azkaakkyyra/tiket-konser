<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Tiket</title>

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

        .title {
            font-size: 48px;
            font-weight: bold;
            color: #8e7cc3;
            text-shadow: 3px 3px #cfcfcf;
            margin-bottom: 30px;
            position: relative;
        }

        .title::after {
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
            max-width: 420px;
            border-radius: 12px;
            box-shadow: 8px 8px 0 rgba(0,0,0,0.15);
        }

        .card h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 2px solid #8e7cc3;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #6a5acd;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background-color: #f3f6d5;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #e4e9b8;
        }

        .back-login {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .back-login a {
            color: #1a4cff;
            font-weight: bold;
            text-decoration: none;
        }

        .back-login a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .title {
                font-size: 36px;
            }

            .card {
                margin: 0 15px;
            }
        }
    </style>
</head>
<body>

   
    <div class="title">Beli Tiket</div>


    <div class="card">
        <h2>Form Pembelian Tiket</h2>

        <form method="POST" action="/register">
            @csrf

            <div class="form-group">
                <input type="text" name="name" placeholder="Nama Lengkap" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <input type="text" name="phone" placeholder="No. HP" required>
            </div>

            <div class="form-group">
                <select name="type" required>
                    <option value="">-- Pilih Jenis Tiket --</option>
                    <option value="vip">VIP</option>
                    <option value="regular">Regular</option>
                </select>
            </div>

            <button type="submit" class="btn-submit">Beli Tiket</button>
        </form>

        <div class="back-login">
            Sudah punya akun?
            <a href="/login">Login</a>
        </div>
    </div>

</body>
</html>
