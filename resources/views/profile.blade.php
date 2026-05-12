<!DOCTYPE html>

<html lang="en">

<head>

```
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Profile Dashboard</title>

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
        gap:30px;
        flex-wrap:wrap;
    }

    .hero h1{
        font-size:65px;
        font-weight:800;
        line-height:1.1;
    }

    .gradient{
        background:linear-gradient(90deg,#3b82f6,#a855f7);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
    }

    .hero p{
        color:#94a3b8;
        font-size:20px;
        margin-top:10px;
    }

    .profile-avatar{
        width:120px;
        height:120px;
        border-radius:50%;
        background:linear-gradient(135deg,#2563eb,#8b5cf6);
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:50px;
        font-weight:700;
        box-shadow:0 0 40px rgba(99,102,241,0.5);
    }

    /* GRID */

    .profile-grid{
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
        font-size:32px;
    }

    .field{
        margin-bottom:25px;
    }

    .field label{
        display:block;
        margin-bottom:12px;
        color:#94a3b8;
        font-size:15px;
    }

    .field input,
    .field textarea{
        width:100%;
        padding:18px 20px;
        border-radius:18px;
        border:1px solid rgba(255,255,255,0.08);
        background:#0f172a;
        color:white;
        outline:none;
        font-size:16px;
    }

    .field textarea{
        resize:none;
        height:140px;
    }

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
        box-shadow:0 0 30px rgba(99,102,241,0.3);
    }

    .btn:hover{
        transform:translateY(-3px);
    }

    /* STATS */

    .stats{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:20px;
    }

    .stat-box{
        background:#0f172a;
        border-radius:25px;
        padding:30px;
        text-align:center;
        border:1px solid rgba(255,255,255,0.05);
    }

    .stat-box h3{
        font-size:42px;
        margin-bottom:10px;
    }

    .blue{
        color:#60a5fa;
    }

    .green{
        color:#34d399;
    }

    .purple{
        color:#c084fc;
    }

    .orange{
        color:#fb923c;
    }

    .stat-box p{
        color:#94a3b8;
    }

    /* ACTIVITY */

    .activity{
        margin-top:25px;
    }

    .activity-item{
        background:#0f172a;
        padding:18px 20px;
        border-radius:18px;
        margin-bottom:15px;
        border:1px solid rgba(255,255,255,0.05);
    }

    .activity-item h4{
        margin-bottom:5px;
    }

    .activity-item p{
        color:#94a3b8;
        font-size:14px;
    }

    @media(max-width:1100px){

        .profile-grid{
            grid-template-columns:1fr;
        }

    }

    @media(max-width:900px){

        .sidebar{
            width:100%;
            position:relative;
            height:auto;
        }

        .main{
            margin-left:0;
            width:100%;
        }

        .layout{
            flex-direction:column;
        }

        .hero h1{
            font-size:42px;
        }

        .stats{
            grid-template-columns:1fr;
        }

    }

</style>
```

</head>

<body>

<div class="layout">

```
<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">

        <div class="logo-icon">🚀</div>

        <div>
            <h2>Laravel</h2>
            <p>User Profile</p>
        </div>

    </div>

    <div class="menu">

        <a href="/dashboard">🏠 Dashboard</a>

        <a href="/tasks">📋 Tasks</a>

        <a href="/analytics">📊 Analytics</a>

        <a href="/profile" class="active">
            👤 Profile
        </a>

        <a href="#">⚙️ Settings</a>

    </div>

</div>

<!-- MAIN -->

<div class="main">

    <!-- HERO -->

    <div class="hero">

        <div class="hero-content">

            <div>

                <h1>
                    User <span class="gradient">Profile</span>
                </h1>

                <p>
                    Manage your personal information professionally.
                </p>

            </div>

            <div class="profile-avatar">
                T
            </div>

        </div>

    </div>

    <!-- GRID -->

    <div class="profile-grid">

        <!-- PROFILE FORM -->

        <div class="card">

            <h2>Edit Profile</h2>

            <form>

                <div class="field">

                    <label>Full Name</label>

                    <input type="text"
                           value="Test User">

                </div>

                <div class="field">

                    <label>Email Address</label>

                    <input type="email"
                           value="test@test.com">

                </div>

                <div class="field">

                    <label>Bio</label>

                    <textarea>
```

Professional Laravel Developer & Dashboard Designer. </textarea>

```
                </div>

                <div class="field">

                    <label>Password</label>

                    <input type="password"
                           placeholder="Enter new password">

                </div>

                <button class="btn">
                    Save Changes
                </button>

            </form>

        </div>

        <!-- RIGHT SIDE -->

        <div>

            <!-- STATS -->

            <div class="card">

                <h2>Profile Statistics</h2>

                <div class="stats">

                    <div class="stat-box">

                        <h3 class="blue">24</h3>

                        <p>Total Tasks</p>

                    </div>

                    <div class="stat-box">

                        <h3 class="green">18</h3>

                        <p>Completed</p>

                    </div>

                    <div class="stat-box">

                        <h3 class="purple">6</h3>

                        <p>Pending</p>

                    </div>

                    <div class="stat-box">

                        <h3 class="orange">92%</h3>

                        <p>Performance</p>

                    </div>

                </div>

            </div>

            <!-- ACTIVITY -->

            <div class="card activity">

                <h2>Recent Activity</h2>

                <div class="activity-item">

                    <h4>Task Completed</h4>

                    <p>
                        Completed Laravel dashboard UI design.
                    </p>

                </div>

                <div class="activity-item">

                    <h4>Profile Updated</h4>

                    <p>
                        Changed profile information successfully.
                    </p>

                </div>

                <div class="activity-item">

                    <h4>Analytics Viewed</h4>

                    <p>
                        Checked weekly productivity analytics.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>
```

</div>

</body>
</html>
