<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
    <style>
        body {
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        #login-wrapper {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        #login-wrapper h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #10519c;
            font-size: 24px;
        }

        #login-wrapper .mb-3 {
            margin-bottom: 15px;
        }

        #login-wrapper label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-size: 14px;
            font-weight: bold;
        }

        #login-wrapper input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
        }

        #login-wrapper input:focus {
            outline: none;
            border-color: #10519c;
            box-shadow: 0 0 0 2px rgba(16,81,156,0.15);
        }

        #login-wrapper button {
            width: 100%;
            padding: 12px;
            background: #10519c;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        #login-wrapper button:hover {
            background: #2b83ea;
        }

        .alert-danger {
            background: #ffe0e6;
            border: 1px solid #d9534f;
            color: #c9302c;
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div id="login-wrapper">
        <h1>Sign In</h1>

        <?php if (session()->getFlashdata('flash_msg')): ?>
            <div class="alert-danger">
                <?= session()->getFlashdata('flash_msg') ?>
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="mb-3">
                <label for="InputForEmail">Email address</label>
                <input type="email" name="email" id="InputForEmail"
                       value="<?= set_value('email') ?>" placeholder="Masukkan email">
            </div>
            <div class="mb-3">
                <label for="InputForPassword">Password</label>
                <input type="password" name="password" id="InputForPassword"
                       placeholder="Masukkan password">
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>