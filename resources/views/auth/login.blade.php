<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - TaskFlow</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        html,
        body{
            width:100%;
            min-height:100%;
            overflow-x:hidden;
        }

        body{

            background:
            linear-gradient(rgba(255,255,255,0.04) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,0.04) 1px, transparent 1px),
            linear-gradient(135deg,#081028,#020617,#16052f);

            background-size:50px 50px,50px 50px,cover;

            display:flex;
            justify-content:center;
            align-items:center;

            padding:60px 20px;

            position:relative;
        }

        body::before{
            content:'';
            position:absolute;

            width:450px;
            height:450px;

            background:#4f46e5;

            border-radius:50%;

            filter:blur(160px);

            top:-150px;
            left:-120px;

            opacity:0.35;
        }

        body::after{
            content:'';
            position:absolute;

            width:450px;
            height:450px;

            background:#9333ea;

            border-radius:50%;

            filter:blur(160px);

            bottom:-150px;
            right:-120px;

            opacity:0.30;
        }

        .container{
            width:100%;
            max-width:470px;

            position:relative;
            z-index:5;
        }

        .login-card{

            width:100%;

            background:rgba(4,10,28,0.78);

            border:1px solid rgba(255,255,255,0.08);

            backdrop-filter:blur(20px);

            border-radius:30px;

            padding:45px;

            box-shadow:
            0 0 30px rgba(59,130,246,0.18),
            0 0 90px rgba(168,85,247,0.12);
        }

        .logo{

            width:90px;
            height:90px;

            margin:0 auto 25px;

            border-radius:25px;

            background:linear-gradient(135deg,#2563eb,#9333ea);

            display:flex;
            justify-content:center;
            align-items:center;

            font-size:42px;

            box-shadow:
            0 0 25px rgba(99,102,241,0.35);
        }

        .title{
            text-align:center;

            font-size:64px;
            font-weight:800;

            color:white;

            margin-bottom:12px;

            line-height:1;
        }

        .title span{
            background:linear-gradient(90deg,#60a5fa,#a855f7);

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .subtitle{
            text-align:center;

            color:#9ca3af;

            font-size:18px;

            line-height:1.7;

            margin-bottom:40px;
        }

        .form-group{
            margin-bottom:24px;
        }

        .form-group label{
            display:block;

            color:white;

            font-size:17px;
            font-weight:600;

            margin-bottom:12px;
        }

        .form-input{

            width:100%;
            height:62px;

            padding:0 22px;

            border-radius:18px;

            border:1px solid rgba(255,255,255,0.08);

            background:rgba(0,0,0,0.22);

            color:white;

            font-size:17px;

            outline:none;

            transition:0.3s;
        }

        .form-input:focus{

            border:1px solid #6366f1;

            box-shadow:
            0 0 18px rgba(99,102,241,0.35);
        }

        .form-input::placeholder{
            color:#6b7280;
        }

        .remember{

            display:flex;
            align-items:center;

            gap:10px;

            margin-top:5px;
            margin-bottom:28px;

            color:#cbd5e1;

            font-size:17px;
        }

        .remember input{
            width:18px;
            height:18px;
        }

        .login-btn{

            width:100%;
            height:65px;

            border:none;
            border-radius:20px;

            background:linear-gradient(90deg,#2563eb,#7c3aed);

            color:white;

            font-size:22px;
            font-weight:700;

            cursor:pointer;

            transition:0.3s;

            box-shadow:
            0 0 25px rgba(99,102,241,0.35);
        }

        .login-btn:hover{

            transform:translateY(-2px);

            box-shadow:
            0 0 35px rgba(139,92,246,0.45);
        }

        .bottom-links{

            margin-top:30px;

            text-align:center;

            color:#94a3b8;

            font-size:16px;

            line-height:2;
        }

        .bottom-links a{

            color:#60a5fa;

            text-decoration:none;

            font-weight:700;
        }

        .bottom-links a:hover{
            color:#c084fc;
        }

        @media(max-width:600px){

            body{
                padding:35px 15px;
            }

            .login-card{
                padding:32px 24px;
                border-radius:24px;
            }

            .title{
                font-size:48px;
            }

            .subtitle{
                font-size:15px;
            }

            .form-input{
                height:58px;
                font-size:16px;
            }

            .login-btn{
                height:60px;
                font-size:20px;
            }
        }

    </style>

</head>

<body>

    <div class="container">

        <div class="login-card">

            <div class="logo">
                🚀
            </div>

            <h1 class="title">
                Task<span>Flow</span>
            </h1>

            <p class="subtitle">
                Professional Laravel task management dashboard
            </p>

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="form-group">

                    <label>Email Address</label>

                    <input
                        type="email"
                        name="email"
                        class="form-input"
                        placeholder="Enter your email"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        class="form-input"
                        placeholder="Enter your password"
                        required
                    >

                </div>

                <div class="remember">

                    <input type="checkbox" name="remember">

                    <span>Remember Me</span>

                </div>

                <button type="submit" class="login-btn">
                    Login To Dashboard
                </button>

            </form>

            <div class="bottom-links">

                Don’t have an account?

                <a href="{{ route('register') }}">
                    Create Account
                </a>

                <br>

                <a href="{{ route('password.request') }}">
                    Forgot Password?
                </a>

            </div>

        </div>

    </div>

</body>
</html>