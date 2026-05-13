<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - TaskFlow</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            min-height:100vh;
            overflow-y:auto;
            background:
            linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px),
            linear-gradient(135deg,#050816,#090d25,#13042b);

            background-size:60px 60px,60px 60px,cover;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:40px 20px;
        }

        .register-wrapper{
            width:100%;
            max-width:520px;
        }

        .register-card{
            background:rgba(4,10,35,0.92);
            border:1px solid rgba(255,255,255,0.08);
            border-radius:32px;
            padding:45px;
            backdrop-filter:blur(12px);
            box-shadow:
            0 0 40px rgba(88,80,255,0.25),
            0 0 100px rgba(119,0,255,0.12);
        }

        .logo-box{
            width:110px;
            height:110px;
            margin:0 auto 30px;
            border-radius:30px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:48px;
            background:linear-gradient(135deg,#2563eb,#9333ea);
            box-shadow:0 0 40px rgba(99,102,241,.45);
        }

        .title{
            text-align:center;
            color:white;
            font-size:58px;
            font-weight:800;
            margin-bottom:10px;
        }

        .title span{
            background:linear-gradient(135deg,#60a5fa,#a855f7);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .subtitle{
            text-align:center;
            color:#94a3b8;
            font-size:20px;
            line-height:1.7;
            margin-bottom:40px;
        }

        .form-group{
            margin-bottom:25px;
        }

        .form-group label{
            display:block;
            color:white;
            font-size:16px;
            font-weight:600;
            margin-bottom:12px;
        }

        .form-input{
            width:100%;
            height:62px;
            border-radius:18px;
            border:1px solid rgba(255,255,255,0.08);
            background:#020817;
            padding:0 22px;
            color:white;
            font-size:17px;
            outline:none;
            transition:.3s;
        }

        .form-input:focus{
            border-color:#6366f1;
            box-shadow:0 0 0 4px rgba(99,102,241,0.15);
        }

        .form-input::placeholder{
            color:#64748b;
        }

        .register-btn{
            width:100%;
            height:64px;
            border:none;
            border-radius:20px;
            margin-top:15px;
            background:linear-gradient(135deg,#2563eb,#9333ea);
            color:white;
            font-size:22px;
            font-weight:700;
            cursor:pointer;
            transition:.3s;
            box-shadow:0 0 35px rgba(99,102,241,.4);
        }

        .register-btn:hover{
            transform:translateY(-3px);
            box-shadow:0 0 50px rgba(99,102,241,.6);
        }

        .bottom-text{
            margin-top:30px;
            text-align:center;
            color:#94a3b8;
            font-size:17px;
        }

        .bottom-text a{
            color:#60a5fa;
            text-decoration:none;
            font-weight:700;
        }

        .bottom-text a:hover{
            color:#a855f7;
        }

        .error-text{
            color:#fb7185;
            margin-top:8px;
            font-size:14px;
        }

        @media(max-width:600px){

            .register-card{
                padding:30px;
                border-radius:24px;
            }

            .title{
                font-size:42px;
            }

            .subtitle{
                font-size:17px;
            }

            .logo-box{
                width:90px;
                height:90px;
                font-size:38px;
            }
        }
    </style>
</head>
<body>

<div class="register-wrapper">

    <div class="register-card">

        <div class="logo-box">
            🚀
        </div>

        <h1 class="title">
            Task<span>Flow</span>
        </h1>

        <p class="subtitle">
            Create your professional account and manage tasks securely
        </p>

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <div class="form-group">
                <label>Full Name</label>

                <input
                    type="text"
                    name="name"
                    class="form-input"
                    placeholder="Enter your full name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                >

                @error('name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email Address</label>

                <input
                    type="email"
                    name="email"
                    class="form-input"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    required
                >

                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
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

                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Confirm Password</label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-input"
                    placeholder="Confirm your password"
                    required
                >
            </div>

            <button type="submit" class="register-btn">
                Create Account
            </button>

        </form>

        <div class="bottom-text">
            Already have an account?
            <a href="{{ route('login') }}">
                Login
            </a>
        </div>

    </div>

</div>

</body>
</html>