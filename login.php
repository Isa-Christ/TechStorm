<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStorm - Connexion</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0a0e27 0%, #1a1f3a 50%, #0f4c75 100%);
            position: relative;
            overflow: hidden;
        }

        /* Animation de fond */
        body::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(0, 183, 255, 0.2) 0%, transparent 70%);
            border-radius: 50%;
            top: -250px;
            right: -250px;
            animation: float 8s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(138, 43, 226, 0.2) 0%, transparent 70%);
            border-radius: 50%;
            bottom: -200px;
            left: -200px;
            animation: float 10s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            width: 100%;
            padding: 40px;
            gap: 100px;
            position: relative;
            z-index: 1;
        }

        .brand {
            flex: 1;
        }

        .brand h1 {
            font-size: 72px;
            font-weight: 900;
            color: white;
            text-shadow: 0 0 30px rgba(0, 183, 255, 0.5);
            letter-spacing: 2px;
        }

        .login-box {
            width: 420px;
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .login-box h2 {
            color: white;
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .google-btn {
            width: 100%;
            padding: 14px;
            background: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            color: #333;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .google-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.2);
        }

        .google-icon {
            width: 20px;
            height: 20px;
        }

        .divider {
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
            margin: 25px 0;
            font-size: 14px;
            position: relative;
        }

        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
        }

        .divider::before { left: 0; }
        .divider::after { right: 0; }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            outline: none;
            border-color: #00b7ff;
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 20px rgba(0, 183, 255, 0.3);
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 25px;
        }

        .forgot-password a {
            color: #00b7ff;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .forgot-password a:hover {
            color: #00d9ff;
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.6);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .signup-link {
            text-align: center;
            margin-top: 25px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
        }

        .signup-link a {
            color: #00b7ff;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .signup-link a:hover {
            color: #00d9ff;
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .container {
                flex-direction: column;
                gap: 50px;
            }

            .brand h1 {
                font-size: 48px;
                text-align: center;
            }

            .login-box {
                width: 100%;
                max-width: 420px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="brand">
            <h1>TechStorm</h1>
        </div>

        <div class="login-box">
            <h2>CONNEXION</h2>

            <button class="google-btn">
                <svg class="google-icon" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
                Se connecter avec Google
            </button>

            <div class="divider">OU</div>

            <form method="POST" action="login_process.php">
                <div class="input-group">
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>

                <div class="input-group">
                    <input type="password" name="password" placeholder="Mot de passe" required>
                </div>

                <div class="forgot-password">
                    <a href="reset-password.php">Mot de passe oublié?</a>
                </div>

                <button type="submit" class="login-btn">Se Connecter</button>
            </form>

            <div class="signup-link">
                Pas encore de compte? <a href="register.php">Créer un compte</a>
            </div>
        </div>
    </div>
</body>
</html>
