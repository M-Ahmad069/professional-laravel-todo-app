<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks - Laravel Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#050816;
            color:white;
        }

        .layout{
            display:flex;
            min-height:100vh;
        }

        /* SIDEBAR */

        .sidebar{
            width:280px;
            background:#081028;
            border-right:1px solid rgba(255,255,255,0.06);
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
            margin-bottom:50px;
        }

        .logo-box{
            width:60px;
            height:60px;
            border-radius:18px;
            background:linear-gradient(135deg,#2563eb,#8b5cf6);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:28px;
        }

        .logo h2{
            font-size:20px;
        }

        .menu{
            display:flex;
            flex-direction:column;
            gap:14px;
        }

        .menu a{
            text-decoration:none;
            color:#94a3b8;
            padding:16px 18px;
            border-radius:16px;
            transition:0.3s;
            font-weight:500;
        }

        .menu a:hover,
        .menu a.active{
            background:linear-gradient(90deg,#1d4ed8,#7c3aed);
            color:white;
        }

        /* CONTENT */

        .content{
            margin-left:280px;
            width:calc(100% - 280px);
            padding:40px;
        }

        .topbar{
            background:#091225;
            border:1px solid rgba(255,255,255,0.06);
            border-radius:28px;
            padding:35px;
            margin-bottom:35px;
        }

        .topbar h1{
            font-size:52px;
            margin-bottom:10px;
        }

        .gradient{
            background:linear-gradient(90deg,#3b82f6,#a855f7);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .topbar p{
            color:#94a3b8;
            font-size:18px;
        }

        /* TABLE */

        .table-card{
            background:#091225;
            border:1px solid rgba(255,255,255,0.05);
            border-radius:28px;
            overflow:hidden;
        }

        .table-header{
            padding:30px;
            border-bottom:1px solid rgba(255,255,255,0.06);
        }

        .table-header h2{
            font-size:36px;
            margin-bottom:8px;
        }

        .table-header p{
            color:#94a3b8;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            text-align:left;
            padding:22px 28px;
            color:#94a3b8;
            font-size:14px;
            letter-spacing:1px;
        }

        td{
            padding:28px;
            border-top:1px solid rgba(255,255,255,0.05);
        }

        tr:hover{
            background:rgba(255,255,255,0.02);
        }

        .task-title{
            font-size:20px;
            font-weight:600;
            margin-bottom:8px;
        }

        .task-desc{
            color:#94a3b8;
            max-width:300px;
        }

        .badge{
            padding:10px 18px;
            border-radius:50px;
            font-size:14px;
            font-weight:600;
            display:inline-block;
        }

        .medium{
            background:rgba(251,191,36,0.15);
            color:#fbbf24;
        }

        .high{
            background:rgba(239,68,68,0.15);
            color:#ef4444;
        }

        .low{
            background:rgba(34,197,94,0.15);
            color:#22c55e;
        }

        .pending{
            background:rgba(59,130,246,0.15);
            color:#60a5fa;
        }

        .completed{
            background:rgba(16,185,129,0.15);
            color:#34d399;
        }

        .actions{
            display:flex;
            gap:12px;
        }

        .btn{
            padding:12px 20px;
            border-radius:14px;
            text-decoration:none;
            font-weight:600;
            transition:0.3s;
        }

        .edit{
            background:rgba(16,185,129,0.15);
            color:#34d399;
        }

        .delete{
            background:rgba(239,68,68,0.15);
            color:#f87171;
        }

        .btn:hover{
            transform:translateY(-2px);
        }

        @media(max-width:1100px){

            .sidebar{
                width:100%;
                position:relative;
                height:auto;
            }

            .content{
                margin-left:0;
                width:100%;
            }

            .layout{
                flex-direction:column;
            }

            .table-card{
                overflow:auto;
            }

            table{
                min-width:900px;
            }

        }

    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->

    <div class="sidebar">

        <div class="logo">
            <div class="logo-box">🚀</div>

            <div>
                <h2>Laravel</h2>
                <p style="color:#94a3b8;">Task Manager</p>
            </div>
        </div>

        <div class="menu">

            <a href="/dashboard">🏠 Dashboard</a>

            <a href="/tasks" class="active">📋 Tasks</a>

            <a href="#">📊 Analytics</a>

            <a href="#">👤 Profile</a>

            <a href="#">⚙️ Settings</a>

        </div>

    </div>

    <!-- CONTENT -->

    <div class="content">

        <div class="topbar">

            <h1>Manage <span class="gradient">Tasks</span></h1>

            <p>Professional task management system with Laravel.</p>

        </div>

        <div class="table-card">

            <div class="table-header">

                <h2>All Tasks</h2>

                <p>Manage, edit and delete all tasks professionally.</p>

            </div>

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

                        <td>#{{ $task->id }}</td>

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

                            <span class="badge
                            {{ strtolower($task->priority) }}">

                                {{ $task->priority }}

                            </span>

                        </td>

                        <td>

                            <span class="badge
                            {{ strtolower($task->status) }}">

                                {{ $task->status }}

                            </span>

                        </td>

                        <td>

                            <div class="actions">

                                <a href="/edit/{{ $task->id }}"
                                class="btn edit">

                                    Edit

                                </a>

                                <a href="/delete/{{ $task->id }}"
                                class="btn delete">

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

</body>
</html>