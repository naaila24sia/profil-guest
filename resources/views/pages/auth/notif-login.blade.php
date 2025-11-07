<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Berhasil</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #007bff;
            --success-bg: #e0f7fa;
            --text-color: #333;
        }

        body {
            background-color: var(--success-bg);
            font-family: 'Roboto', sans-serif; 
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .notif-box {
            background: white;
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 2px solid var(--primary-blue);
            width: 380px;
            box-sizing: border-box;
            transform: scale(1);
            transition: transform 0.3s ease-in-out;
        }

        .notif-box:hover {
            transform: scale(1.02);
        }

        h1 {
            color: var(--primary-blue);
            margin-bottom: 5px;
            font-size: 2.5em;
            font-weight: 700;
        }

        .success-message {
            font-size: 1.1em;
            color: var(--text-color);
            margin-top: 5px;
            margin-bottom: 25px;
        }

        .welcome-message {
            font-size: 1.6em;
            font-weight: 700;
            color: #0056b3;
            margin: 15px 0 25px 0;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }

        a {
            color: white;
            background-color: var(--primary-blue);
            text-decoration: none;
            margin-top: 30px;
            display: inline-block;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            transition: background-color 0.3s;
            font-weight: 700;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="notif-box">

        <p class="success-message">Login BERHASIL! 🎉 </p>

        <p class="welcome-message">Selamat datang, {{ $username }}</p>

        <a href="{{ route('login.form') }}">Kembali ke Halaman Login</a>
    </div>
</body>

</html>
