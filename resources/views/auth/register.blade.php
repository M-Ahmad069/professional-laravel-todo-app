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

    .register-card{

        width:100%;
        max-width:500px;

        background:rgba(255,255,255,.96);

        border-radius:30px;

        padding:55px;

        box-shadow:
        0 30px 80px rgba(0,0,0,.35);

        backdrop-filter:blur(20px);

        border:1px solid rgba(255,255,255,.2);
    }

    .title{

        font-size:40px;

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
        margin-bottom:22px;
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

    .register-btn{

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

        margin-top:10px;

        box-shadow:
        0 15px 35px rgba(37,99,235,.30);
    }

    .register-btn:hover{

        transform:translateY(-2px);

        box-shadow:
        0 20px 40px rgba(37,99,235,.35);
    }

    .bottom-link{

        text-align:center;

        margin-top:28px;

        color:#64748b;
    }

    .bottom-link a{

        color:#2563eb;

        text-decoration:none;

        font-weight:700;
    }

    .bottom-link a:hover{
        text-decoration:underline;
    }

</style>

<div class="main-wrapper">

    <div class="register-card">

        <div class="title">
            Create Account
        </div>

        <div class="subtitle">
            Register your account to manage personal tasks securely
        </div>

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <div class="input-group">

                <label class="input-label">
                    Full Name
                </label>

                <input
                    type="text"
                    name="name"
                    required
                    autofocus
                    class="custom-input"
                    placeholder="Enter your full name"
                >

            </div>

            <div class="input-group">

                <label class="input-label">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    required
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
                    placeholder="Create password"
                >

            </div>

            <div class="input-group">

                <label class="input-label">
                    Confirm Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    required
                    class="custom-input"
                    placeholder="Confirm password"
                >

            </div>

            <button type="submit" class="register-btn">
                Create Account
            </button>

            <div class="bottom-link">

                Already have an account?

                <a href="{{ route('login') }}">
                    Login Here
                </a>

            </div>

        </form>

    </div>

</div>

</x-guest-layout>