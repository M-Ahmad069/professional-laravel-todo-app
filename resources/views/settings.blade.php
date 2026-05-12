<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Settings Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:
            radial-gradient(circle at top left,#13204a 0%,#050816 40%),
            #050816;
            color:white;
            overflow-x:hidden;
        }

        body::before{
            content:'';
            position:fixed;
            width:100%;
            height:100%;
            background:
            linear-gradient(rgba(255,255,255,0.03) 1px,transparent 1px),
            linear-gradient(90deg,rgba(255,255,255,0.03) 1px,transparent 1px);
            background-size:50px 50px;
            pointer-events:none;
        }

        .layout{
            display:flex;
            min-height:100vh;
        }

        /* SIDEBAR */

        .sidebar{
            width:280px;
            background:rgba(7,13,32,0.95);
            backdrop-filter:blur(20px);
            border-right:1px solid rgba(255,255,255,0.05);
            padding:30px;
            position:fixed;
            top:0;
            left:0;
            bottom:0;
        }

        .logo{
            display:flex;
            align-items:center;
            gap:15px;
            margin-bottom:60px;
        }

        .logo-icon{
            width:60px;
            height:60px;
            border-radius:20px;
            background:linear-gradient(135deg,#2563eb,#8b5cf6);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:28px;
            box-shadow:0 0 30px rgba(99,102,241,0.5);
        }

        .logo h2{
            font-size:30px;
            font-weight:700;
        }

        .logo p{
            color:#94a3b8;
        }

        .menu{
            display:flex;
            flex-direction:column;
            gap:14px;
        }

        .menu a{
            text-decoration:none;
            color:#94a3b8;
            padding:18px 22px;
            border-radius:18px;
            transition:0.3s;
            font-size:18px;
            font-weight:500;
        }

        .menu a:hover,
        .menu a.active{
            background:linear-gradient(90deg,#1d4ed8,#7c3aed);
            color:white;
            transform:translateX(5px);
        }

        /* MAIN */

        .main{
            margin-left:280px;
            width:calc(100% - 280px);
            padding:35px;
        }

        .hero{
            background:rgba(9,18,37,0.95);
            border:1px solid rgba(255,255,255,0.05);
            border-radius:35px;
            padding:45px;
            margin-bottom:35px;
            position:relative;
            overflow:hidden;
        }

        .hero::before{
            content:'';
            position:absolute;
            width:400px;
            height:400px;
            background:radial-gradient(circle,#7c3aed55 0%,transparent 70%);
            top:-150px;
            right:-120px;
        }

        .hero-content{
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
            gap:30px;
        }

        .hero h1{
            font-size:60px;
            font-weight:800;
        }

        .gradient{
            background:linear-gradient(90deg,#3b82f6,#a855f7);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .hero p{
            color:#94a3b8;
            font-size:18px;
            margin-top:10px;
        }

        .profile{
            display:flex;
            align-items:center;
            gap:20px;
        }

        .avatar{
            width:90px;
            height:90px;
            border-radius:50%;
            background:linear-gradient(135deg,#2563eb,#8b5cf6);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:36px;
            font-weight:700;
            box-shadow:0 0 30px rgba(99,102,241,0.5);
        }

        /* GRID */

        .settings-grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:30px;
        }

        .card{
            background:rgba(9,18,37,0.95);
            border:1px solid rgba(255,255,255,0.05);
            border-radius:30px;
            padding:35px;
        }

        .card h2{
            margin-bottom:25px;
            font-size:30px;
        }

        .setting-item{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:20px;
            background:#0f172a;
            border-radius:20px;
            margin-bottom:20px;
            border:1px solid rgba(255,255,255,0.05);
        }

        .setting-info h3{
            margin-bottom:5px;
        }

        .setting-info p{
            color:#94a3b8;
            font-size:14px;
        }

        /* TOGGLE */

        .switch{
            position:relative;
            display:inline-block;
            width:60px;
            height:32px;
        }

        .switch input{
            opacity:0;
            width:0;
            height:0;
        }

        .slider{
            position:absolute;
            cursor:pointer;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background:#1e293b;
            transition:.4s;
            border-radius:50px;
        }

        .slider:before{
            position:absolute;
            content:"";
            height:24px;
            width:24px;
            left:4px;
            bottom:4px;
            background:white;
            transition:.4s;
            border-radius:50%;
        }

        input:checked + .slider{
            background:linear-gradient(90deg,#2563eb,#8b5cf6);
        }

        input:checked + .slider:before{
            transform:translateX(28px);
        }

        /* BUTTON */

        .btn{
            width:100%;
            padding:18px;
            border:none;
            border-radius:18px;
            background:linear-gradient(90deg,#2563eb,#8b5cf6);
            color:white;
            font-size:18px;
            font-weight:600;
            cursor:pointer;
            transition:0.3s;
            margin-top:20px;
            box-shadow:0 0 30px rgba(99,102,241,0.3);
        }

        .btn:hover{
            transform:translateY(-3px);
        }

        /* SECURITY */

        .security-box{
            background:#0f172a;
            padding:25px;
            border-radius:25px;
            margin-bottom:20px;
            border:1px solid rgba(255,255,255,0.05);
        }

        .security-box h3{
            margin-bottom:10px;
        }

        .security-box p{
            color:#94a3b8;
            margin-bottom:15px;
        }

        .small-btn{
            padding:12px 20px;
            border:none;
            border-radius:14px;
            background:linear-gradient(90deg,#2563eb,#8b5cf6);
            color:white;
            cursor:pointer;
            font-weight:600;
        }

        @media(max-width:1100px){

            .settings-grid{
                grid-template-columns:1fr;
            }

        }

        @media(max-width:900px){

            .layout{
                flex-direction:column;
            }

            .sidebar{
                width:100%;
                position:relative;
                height:auto;
            }

            .main{
                margin-left:0;
                width:100%;
            }

            .hero h1{
                font-size:40px;
            }

        }

    </style>

</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->

    <div class="sidebar">

        <div class="logo">

            <div class="logo-icon">🚀</div>

            <div>
                <h2>Laravel</h2>
                <p>Settings Panel</p>
            </div>

        </div>

        <div class="menu">

            <a href="/dashboard">🏠 Dashboard</a>

            <a href="/tasks">📋 Tasks</a>

            <a href="/analytics">📊 Analytics</a>

            <a href="/profile">👤 Profile</a>

            <a href="/settings" class="active">
                ⚙️ Settings
            </a>

        </div>

    </div>

    <!-- MAIN -->

    <div class="main">

        <!-- HERO -->

        <div class="hero">

            <div class="hero-content">

                <div>

                    <h1>
                        Application <span class="gradient">Settings</span>
                    </h1>

                    <p>
                        Manage preferences, security, and dashboard settings.
                    </p>

                </div>

                <div class="profile">

                    <div class="avatar">
                        T
                    </div>

                    <div>
                        <h2>test</h2>
                        <p style="color:#94a3b8;">
                            test@test.com
                        </p>
                    </div>

                </div>

            </div>

        </div>

        <!-- GRID -->

        <div class="settings-grid">

            <!-- LEFT -->

            <div class="card">

                <h2>General Settings</h2>

                <div class="setting-item">

                    <div class="setting-info">
                        <h3>Dark Mode</h3>
                        <p>Enable dark dashboard theme</p>
                    </div>

                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>

                </div>

                <div class="setting-item">

                    <div class="setting-info">
                        <h3>Email Notifications</h3>
                        <p>Receive updates about tasks</p>
                    </div>

                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>

                </div>

                <div class="setting-item">

                    <div class="setting-info">
                        <h3>Auto Save</h3>
                        <p>Automatically save dashboard changes</p>
                    </div>

                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>

                </div>

                <div class="setting-item">

                    <div class="setting-info">
                        <h3>Task Reminders</h3>
                        <p>Get reminder alerts for tasks</p>
                    </div>

                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider"></span>
                    </label>

                </div>

                <button class="btn">
                    Save Settings
                </button>

            </div>

            <!-- RIGHT -->

            <div class="card">

                <h2>Security Settings</h2>

                <div class="security-box">

                    <h3>Password Protection</h3>

                    <p>
                        Change your account password regularly for better security.
                    </p>

                    <button class="small-btn">
                        Change Password
                    </button>

                </div>

                <div class="security-box">

                    <h3>Two Factor Authentication</h3>

                    <p>
                        Add an extra layer of security to your account.
                    </p>

                    <button class="small-btn">
                        Enable 2FA
                    </button>

                </div>

                <div class="security-box">

                    <h3>Login Activity</h3>

                    <p>
                        View recent login devices and sessions.
                    </p>

                    <button class="small-btn">
                        View Activity
                    </button>

                </div>

                <div class="security-box">

                    <h3>Danger Zone</h3>

                    <p>
                        Delete account permanently with all data.
                    </p>

                    <button class="small-btn"
                            style="background:linear-gradient(90deg,#dc2626,#ef4444);">
                        Delete Account
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>