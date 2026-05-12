<x-guest-layout>

<style>

    body{
        margin:0;
        padding:0;
        font-family:'Inter',sans-serif;

        background:
        radial-gradient(circle at top left, rgba(37,99,235,.15), transparent 30%),
        radial-gradient(circle at bottom right, rgba(99,102,241,.12), transparent 30%),
        #0f172a;

        overflow-x:hidden;
    }

    .main-wrapper{
        min-height:100vh;
        display:flex;
        align-items:center;
        justify-content:center;
        padding:30px;
    }

    .login-card{

        width:100%;
        max-width:470px;

        background:rgba(255,255,255,.96);

        border-radius:30px;

        padding:55px;

        box-shadow:
        0 30px 80px rgba(0,0,0,.35);

        backdrop-filter:blur(20px);

        border:1px solid rgba(255,255,255,.2);
    }

    .title{
        font-size:42px;
        font-weight:800;
        color:#0f172a;
        text-align:center;
        margin-bottom:10px;
    }

    .subtitle{
        text-align:center;
        color:#64748b;
        font-size:17px;
        margin-bottom:40px;
        line-height:1.7;
    }

    .input-group{
        margin-bottom:24px;
    }

    .input-label{
        display:block;
        margin-bottom:10px;
        font-weight:700;
        color:#111827;
        font-size:15px;
    }

    .custom-input{

        width:100%;
        padding:16px 18px;

        border-radius:18px;

        border:1px solid #d1d5db;

        background:#f8fafc;

        outline:none;

        font-size:15px;

        transition:.25s;
        box-sizing:border-box;
    }

    .custom-input:focus{

        border-color:#2563eb;

        background:white;

        box-shadow:
        0 0 0 5px rgba(37,99,235,.10);
    }

    .remember-row{

        display:flex;
        align-items:center;
        gap:10px;

        margin-top:5px;
        margin-bottom:30px;

        color:#475569;
        font-size:15px;
    }

    .login-btn{

        width:100%;

        border:none;

        padding:16px;

        border-radius:18px;

        background:
        linear-gradient(135deg,#2563eb,#1d4ed8);

        color:white;

        font-size:16px;
        font-weight:700;

        cursor:pointer;

        transition:.25s;

        box-shadow:
        0 15px 35px rgba(37,99,235,.30);
    }

    .login-btn:hover{

        transform:translateY(-2px);

        box-shadow:
        0 20px 40px rgba(37,99,235,.35);
    }

    .bottom-links{

        text-align:center;

        margin-top:28px;

        color:#64748b;

        line-height:2;
    }

    .bottom-links a{

        color:#2563eb;

        text-decoration:none;

        font-weight:700;
    }

    .bottom-links a:hover{
        text-decoration:underline;
    }

</style>

<div class="main-wrapper">

    <div class="login-card">

        <div class="title">
            Sign In
        </div>

        <div class="subtitle">
            Access your professional task management dashboard
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="input-group">

                <label class="input-label">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="custom-input"
                    placeholder="Enter your email"
                >
            </div>

            <div class="input-group">

                <label class="input-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="custom-input"
                    placeholder="Enter your password"
                >
            </div>

            <div class="remember-row">

                <input type="checkbox" name="remember">

                <span>
                    Remember Me
                </span>

            </div>

            <button type="submit" class="login-btn">
                Login to Dashboard
            </button>

            <div class="bottom-links">

                <div>
                    Don’t have an account?
                    <a href="{{ route('register') }}">
                        Create Account
                    </a>
                </div>

                @if (Route::has('password.request'))

                    <div>
                        <a href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    </div>

                @endif

            </div>

        </form>

    </div>

</div>

</x-guest-layout>