{{-- resources/views/welcome.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Laravel Dashboard</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        :root{
            --bg:#020617;
            --sidebar:#081120;
            --card:#0f172a;
            --card2:#111827;

            --border:rgba(255,255,255,.06);

            --text:#f8fafc;
            --muted:#94a3b8;

            --blue:#3b82f6;
            --purple:#8b5cf6;
            --green:#10b981;
            --orange:#f59e0b;
            --red:#ef4444;
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Inter',sans-serif;

            background:
            radial-gradient(circle at top left,
            rgba(59,130,246,.18), transparent 30%),

            radial-gradient(circle at top right,
            rgba(139,92,246,.15), transparent 30%),

            var(--bg);

            color:var(--text);

            min-height:100vh;
            overflow-x:hidden;
        }

        body::before{
            content:'';
            position:fixed;
            inset:0;

            background-image:
            linear-gradient(rgba(255,255,255,.02) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,.02) 1px, transparent 1px);

            background-size:40px 40px;

            pointer-events:none;
        }

        .dashboard{
            display:grid;
            grid-template-columns:280px 1fr;
            min-height:100vh;
        }

        /* SIDEBAR */

        .sidebar{
            background:rgba(8,17,32,.92);

            border-right:1px solid var(--border);

            padding:28px;

            backdrop-filter:blur(20px);

            position:sticky;
            top:0;

            height:100vh;
        }

        .brand{
            display:flex;
            align-items:center;
            gap:16px;

            margin-bottom:50px;
        }

        .brand-icon{
            width:62px;
            height:62px;

            border-radius:20px;

            background:
            linear-gradient(135deg,
            var(--blue),
            var(--purple));

            display:flex;
            align-items:center;
            justify-content:center;

            font-size:28px;

            box-shadow:
            0 20px 40px rgba(59,130,246,.25);
        }

        .brand h1{
            font-size:26px;
            font-weight:800;
        }

        .brand p{
            color:var(--muted);
            margin-top:4px;
            font-size:13px;
        }

        .nav{
            display:flex;
            flex-direction:column;
            gap:12px;
        }

        .nav a{
            text-decoration:none;

            color:var(--muted);

            padding:16px 18px;

            border-radius:18px;

            transition:.3s;

            font-weight:600;
        }

        .nav a:hover,
        .nav a.active{

            background:
            linear-gradient(135deg,
            rgba(59,130,246,.18),
            rgba(139,92,246,.18));

            color:white;

            transform:translateX(4px);
        }

        /* MAIN */

        .main{
            padding:28px;
        }

        /* TOPBAR */

        .topbar{
            display:flex;
            justify-content:space-between;
            align-items:center;

            background:rgba(15,23,42,.75);

            border:1px solid var(--border);

            padding:30px;

            border-radius:30px;

            margin-bottom:28px;

            backdrop-filter:blur(20px);
        }

        .welcome h2{
            font-size:48px;
            font-weight:800;
            line-height:1.1;
        }

        .welcome span{
            background:
            linear-gradient(to right,
            #60a5fa,
            #c084fc);

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .welcome p{
            color:var(--muted);
            margin-top:10px;
        }

        .profile{
            display:flex;
            align-items:center;
            gap:16px;
        }

        .avatar{
            width:58px;
            height:58px;

            border-radius:50%;

            background:
            linear-gradient(135deg,
            var(--blue),
            var(--purple));

            display:flex;
            align-items:center;
            justify-content:center;

            font-weight:800;
            font-size:22px;
        }

        .logout-btn{
            background:rgba(239,68,68,.15);

            border:1px solid rgba(239,68,68,.2);

            color:#f87171;

            padding:12px 18px;

            border-radius:14px;

            cursor:pointer;

            font-weight:700;
        }

        /* STATS */

        .stats{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:22px;

            margin-bottom:28px;
        }

        .stat-card{
            background:rgba(15,23,42,.75);

            border:1px solid var(--border);

            border-radius:28px;

            padding:30px;

            position:relative;

            overflow:hidden;

            backdrop-filter:blur(18px);

            transition:.3s;
        }

        .stat-card:hover{
            transform:translateY(-4px);
        }

        .stat-card h5{
            color:var(--muted);
            font-size:12px;
            letter-spacing:2px;
            text-transform:uppercase;
        }

        .stat-card h2{
            font-size:60px;
            margin-top:10px;
            font-weight:800;
        }

        .stat-icon{
            position:absolute;
            right:24px;
            top:50%;
            transform:translateY(-50%);
            font-size:46px;
            opacity:.12;
        }

        /* CONTENT */

        .content{
            display:grid;
            grid-template-columns:380px 1fr;
            gap:24px;

            margin-bottom:30px;
        }

        .card{
            background:rgba(15,23,42,.75);

            border:1px solid var(--border);

            border-radius:30px;

            backdrop-filter:blur(18px);
        }

        /* FORM */

        .form-card{
            padding:30px;

            position:sticky;
            top:20px;

            height:fit-content;
        }

        .title{
            font-size:30px;
            font-weight:800;
            margin-bottom:8px;
        }

        .sub{
            color:var(--muted);
            margin-bottom:28px;
        }

        .field{
            margin-bottom:20px;
        }

        .field label{
            display:block;

            margin-bottom:10px;

            font-size:13px;

            text-transform:uppercase;

            letter-spacing:1px;

            color:#cbd5e1;

            font-weight:700;
        }

        .field input,
        .field textarea,
        .field select{

            width:100%;

            background:#111827;

            border:1px solid rgba(255,255,255,.08);

            color:white;

            padding:16px 18px;

            border-radius:18px;

            outline:none;

            transition:.3s;
        }

        .field textarea{
            resize:none;
            min-height:120px;
        }

        .field input:focus,
        .field textarea:focus,
        .field select:focus{

            border-color:var(--blue);

            box-shadow:
            0 0 0 4px rgba(59,130,246,.15);
        }

        .submit-btn{
            width:100%;

            border:none;

            padding:18px;

            border-radius:18px;

            background:
            linear-gradient(135deg,
            var(--blue),
            var(--purple));

            color:white;

            font-size:16px;

            font-weight:700;

            cursor:pointer;

            transition:.3s;
        }

        .submit-btn:hover{
            transform:translateY(-2px);
        }

        /* TABLE */

        .table-card{
            overflow:hidden;
        }

        .table-head{
            padding:28px;

            border-bottom:1px solid var(--border);

            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .task-count{
            background:rgba(59,130,246,.12);

            color:#60a5fa;

            padding:10px 16px;

            border-radius:999px;

            font-size:13px;

            font-weight:700;
        }

        .table-wrap{
            width:100%;
            overflow-x:auto;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            padding:20px;

            text-align:left;

            color:var(--muted);

            font-size:12px;

            text-transform:uppercase;

            letter-spacing:1px;
        }

        td{
            padding:22px 20px;

            border-top:1px solid rgba(255,255,255,.05);
        }

        tr:hover{
            background:rgba(255,255,255,.02);
        }

        .task-title{
            font-weight:700;
            margin-bottom:4px;
        }

        .task-desc{
            color:var(--muted);
            font-size:13px;
        }

        .pill{
            padding:8px 14px;

            border-radius:999px;

            font-size:12px;

            font-weight:700;
        }

        .low{
            background:rgba(16,185,129,.15);
            color:#34d399;
        }

        .medium{
            background:rgba(245,158,11,.15);
            color:#fbbf24;
        }

        .high{
            background:rgba(239,68,68,.15);
            color:#f87171;
        }

        .pending{
            background:rgba(59,130,246,.15);
            color:#60a5fa;
        }

        .completed{
            background:rgba(16,185,129,.15);
            color:#34d399;
        }

        .actions{
            display:flex;
            gap:10px;
            flex-wrap:wrap;
        }

        .action-btn{
            padding:10px 16px;

            border-radius:14px;

            text-decoration:none;

            font-size:13px;

            font-weight:700;
        }

        .edit{
            background:rgba(16,185,129,.15);
            color:#34d399;
        }

        .delete{
            background:rgba(239,68,68,.15);
            color:#f87171;
        }

        /* CHARTS */

        .charts-title{
            margin-bottom:18px;
        }

        .charts-title h2{
            font-size:32px;
            font-weight:800;
        }

        .charts{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:24px;
        }

        .chart-card{
            padding:26px;
        }

        .chart-card h3{
            font-size:24px;
            margin-bottom:8px;
        }

        .chart-card p{
            color:var(--muted);
            margin-bottom:20px;
            font-size:13px;
        }

        .chart-box{
            height:280px;
        }

        /* FOOTER */

        .footer{
            margin-top:40px;
            text-align:center;
            color:var(--muted);
        }

        .footer a{
            color:#60a5fa;
            text-decoration:none;
        }

        /* RESPONSIVE */

        @media(max-width:1200px){

            .dashboard{
                grid-template-columns:1fr;
            }

            .sidebar{
                position:relative;
                height:auto;
            }

            .content{
                grid-template-columns:1fr;
            }

            .form-card{
                position:relative;
            }

        }

        @media(max-width:900px){

            .stats{
                grid-template-columns:1fr;
            }

            .charts{
                grid-template-columns:1fr;
            }

            .topbar{
                flex-direction:column;
                gap:20px;
                align-items:flex-start;
            }

            .welcome h2{
                font-size:36px;
            }

        }

    </style>
</head>

<body>

@php

$totalTasks = $tasks->count();

$completedTasks = $tasks->where('status','Completed')->count();

$pendingTasks = $tasks->where('status','Pending')->count();

$lowTasks = $tasks->where('priority','Low')->count();

$mediumTasks = $tasks->where('priority','Medium')->count();

$highTasks = $tasks->where('priority','High')->count();

@endphp

<div class="dashboard">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="brand">

            <div class="brand-icon">
                🚀
            </div>

            <div>
                <h1>Laravel</h1>
                <p>Task Manager</p>
            </div>

        </div>

        <div class="nav">


    <a href="{{ url('/dashboard') }}" class="menu-item active">
        🏠 Dashboard
    </a>

    <a href="{{ url('/tasks') }}" class="menu-item">
        📋 Tasks
    </a>

    <a href="{{ url('/analytics') }}" class="menu-item">
        📊 Analytics
    </a>

    <a href="{{ url('/profile') }}" class="menu-item">
        👤 Profile
    </a>

    <a href="{{ url('/settings') }}" class="menu-item">
        ⚙️ Settings
    </a>

        </div>

    </aside>

    <!-- MAIN -->

    <main class="main">

        <!-- TOPBAR -->

        <div class="topbar">

            <div class="welcome">

                <h2>
                    Professional <span>Laravel</span> Dashboard
                </h2>

                <p>
                    Premium task management system
                </p>

            </div>

            <div class="profile">

                <div class="avatar">

                    {{ strtoupper(substr(Auth::user()->name ?? 'U',0,1)) }}

                </div>

                <div>

                    <h4>
                        {{ Auth::user()->name ?? 'Guest' }}
                    </h4>

                    <p style="color:var(--muted)">
                        {{ Auth::user()->email ?? '' }}
                    </p>

                </div>

                @auth

                <form method="POST"
                action="{{ route('logout') }}">

                    @csrf

                    <button class="logout-btn">
                        Logout
                    </button>

                </form>

                @endauth

            </div>

        </div>

        <!-- STATS -->

        <div class="stats">

            <div class="stat-card">

                <h5>Total Tasks</h5>

                <h2 style="color:#60a5fa">
                    {{ $totalTasks }}
                </h2>

                <div class="stat-icon">📋</div>

            </div>

            <div class="stat-card">

                <h5>Completed</h5>

                <h2 style="color:#34d399">
                    {{ $completedTasks }}
                </h2>

                <div class="stat-icon">✅</div>

            </div>

            <div class="stat-card">

                <h5>Pending</h5>

                <h2 style="color:#c084fc">
                    {{ $pendingTasks }}
                </h2>

                <div class="stat-icon">⏳</div>

            </div>

        </div>

        <!-- CONTENT -->

        <div class="content">

            <!-- FORM -->

            <div class="card form-card">

                <h2 class="title">

                    {{ isset($editTask) ? 'Edit Task' : 'Add New Task' }}

                </h2>

                <p class="sub">
                    Create and manage tasks professionally.
                </p>

                @if(isset($editTask))

<form action="{{ route('task.update', $editTask->id) }}" method="POST">

    @csrf

@else

<form action="/store" method="POST">

    @csrf

@endif

                    <div class="field">

                        <label>Task Title</label>

                        <input
                        type="text"
                        name="title"

                        value="{{ $editTask->title ?? '' }}"

                        required>

                    </div>

                    <div class="field">

                        <label>Description</label>

                        <textarea
                        name="description">{{ $editTask->description ?? '' }}</textarea>

                    </div>

                    <div class="field">

                        <label>Due Date</label>

                        <input
                        type="date"
                        name="due_date"

                        value="{{ $editTask->due_date ?? '' }}">

                    </div>

                    <div class="field">

                        <label>Priority</label>

                        <select name="priority">

                            <option value="Low"
                            {{ isset($editTask) && $editTask->priority == 'Low' ? 'selected' : '' }}>
                                Low
                            </option>

                            <option value="Medium"
                            {{ isset($editTask) && $editTask->priority == 'Medium' ? 'selected' : '' }}>
                                Medium
                            </option>

                            <option value="High"
                            {{ isset($editTask) && $editTask->priority == 'High' ? 'selected' : '' }}>
                                High
                            </option>

                        </select>

                    </div>

                    <div class="field">

                        <label>Status</label>

                        <select name="status">

                            <option value="Pending"
                            {{ isset($editTask) && $editTask->status == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="Completed"
                            {{ isset($editTask) && $editTask->status == 'Completed' ? 'selected' : '' }}>
                                Completed
                            </option>

                        </select>

                    </div>

                    <button class="submit-btn">

                        {{ isset($editTask)
                        ? '✦ Update Task'
                        : '✦ Add Task' }}

                    </button>

                </form>

            </div>

            <!-- TABLE -->

            <div class="card table-card">

                <div class="table-head">

                    <div>

                        <h2 class="title">
                            Task List
                        </h2>

                        <p class="sub">
                            Manage all your tasks professionally.
                        </p>

                    </div>

                    <div class="task-count">

                        {{ $totalTasks }} Tasks

                    </div>

                </div>

                <div class="table-wrap">

                    <table>

                        <thead>

                            <tr>

                                <th>ID</th>
                                <th>Task</th>
                                <th>Due Date</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>

                        </thead>

                        <tbody>

                        @foreach($tasks as $task)

                            <tr>

                                <td>
                                    #{{ $task->id }}
                                </td>

                                <td>

                                    <div class="task-title">
                                        {{ $task->title }}
                                    </div>

                                    <div class="task-desc">
                                        {{ $task->description }}
                                    </div>

                                </td>

                                <td>

                                    {{ $task->due_date ?? '---' }}

                                </td>

                                <td>

                                    <span class="pill
                                    {{ strtolower($task->priority) }}">

                                        {{ $task->priority }}

                                    </span>

                                </td>

                                <td>

                                    <span class="pill
                                    {{ strtolower($task->status) }}">

                                        {{ $task->status }}

                                    </span>

                                </td>

                                <td>

                                    <div class="actions">

                                        <a
                                        href="/edit/{{ $task->id }}"
                                        class="action-btn edit">

                                            Edit

                                        </a>

                                        <a
                                        href="/delete/{{ $task->id }}"
                                        class="action-btn delete">

                                            Delete

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <!-- CHARTS -->

        <div class="charts-title">

            <h2>Analytics Overview</h2>

        </div>

        <div class="charts">

            <div class="card chart-card">

                <h3>Status Overview</h3>

                <p>
                    Completed vs Pending Tasks
                </p>

                <div class="chart-box">
                    <canvas id="statusChart"></canvas>
                </div>

            </div>

            <div class="card chart-card">

                <h3>Priority Report</h3>

                <p>
                    Task priority analytics
                </p>

                <div class="chart-box">
                    <canvas id="priorityChart"></canvas>
                </div>

            </div>

            <div class="card chart-card">

                <h3>Task Activity</h3>

                <p>
                    Weekly productivity overview
                </p>

                <div class="chart-box">
                    <canvas id="activityChart"></canvas>
                </div>

            </div>

        </div>

        <div class="footer">

            Developed by
            <strong>Muhammad Ahmad</strong>

            •

            <a href="https://m-ahmad069.github.io/"
            target="_blank">

                Portfolio Website

            </a>

        </div>

    </main>

</div>

<script>

Chart.defaults.color='#94a3b8';

Chart.defaults.font.family="'Inter', sans-serif";

new Chart(document.getElementById('statusChart'),{

    type:'doughnut',

    data:{
        labels:['Completed','Pending'],

        datasets:[{

            data:[
                {{ $completedTasks }},
                {{ $pendingTasks }}
            ],

            backgroundColor:[
                '#10b981',
                '#3b82f6'
            ],

            borderWidth:0
        }]
    },

    options:{
        responsive:true,
        maintainAspectRatio:false,
        cutout:'70%'
    }

});

new Chart(document.getElementById('priorityChart'),{

    type:'bar',

    data:{
        labels:['Low','Medium','High'],

        datasets:[{

            data:[
                {{ $lowTasks }},
                {{ $mediumTasks }},
                {{ $highTasks }}
            ],

            backgroundColor:[
                '#10b981',
                '#f59e0b',
                '#ef4444'
            ],

            borderRadius:12

        }]
    },

    options:{
        responsive:true,
        maintainAspectRatio:false,

        plugins:{
            legend:{
                display:false
            }
        }
    }

});

new Chart(document.getElementById('activityChart'),{

    type:'line',

    data:{
        labels:['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],

        datasets:[{

            data:[2,4,3,5,4,6,7],

            borderColor:'#8b5cf6',

            backgroundColor:'rgba(139,92,246,.15)',

            fill:true,

            tension:.4

        }]
    },

    options:{
        responsive:true,
        maintainAspectRatio:false,

        plugins:{
            legend:{
                display:false
            }
        }
    }

});

</script>

</body>
</html>