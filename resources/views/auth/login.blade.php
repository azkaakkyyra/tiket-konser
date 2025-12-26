<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

        .form-group input {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 2px solid #8e7cc3;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus {
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

        .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .register-link a {
            color: #1a4cff;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .success {
            text-align: center;
            color: green;
            margin-bottom: 10px;
            font-size: 14px;
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

    <div class="title">Login</div>

    <div class="card">
        <h2>Masuk Akun</h2>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn-submit">Login</button>
        </form>

        <div class="register-link">
            Belum beli tiket?
            <a href="/register">Klik di sini</a>
        </div>
    </div>

</body>
</html>
