<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #464646;
            overflow: hidden;
            text-align: center;
        }

        .title {
            font-size: 48px;
            color: #fff;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }

        .button-container {
            margin-top: 20px;
        }

        .cool-button {
            padding: 15px 30px;
            font-size: 18px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .cool-button:hover {
            animation: bounce 0.5s ease infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        .background-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.8)), url('your-background-image.jpg');
            background-size: cover;
            background-position: center;
            z-index: -1;
        }
    </style>
    <title>Halaman Utama</title>
</head>
<body>
    <div class="background-container"></div>

    <div class="title">
        Selamat Datang
    </div>

    <div class="button-container">
        <a href="{{ url('/articles') }}" class="cool-button">Masuk ke Articles</a>
    </div>
</body>
</html>
