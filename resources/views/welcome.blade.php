<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Laravel To Do App</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-1: #0f172a;
            --bg-2: #111827;
            --card: rgba(255, 255, 255, 0.92);
            --card-border: rgba(148, 163, 184, 0.22);
            --text: #0f172a;
            --muted: #64748b;
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --success: #16a34a;
            --danger: #ef4444;
            --warning: #f59e0b;
            --shadow: 0 30px 80px rgba(15, 23, 42, 0.28);
            --radius: 28px;
        }

        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            min-height: 100%;
            font-family: 'Inter', Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(59, 130, 246, 0.26), transparent 28%),
                radial-gradient(circle at top right, rgba(14, 165, 233, 0.18), transparent 22%),
                linear-gradient(135deg, var(--bg-1), var(--bg-2));
        }

        body {
            padding: 28px;
        }

        .shell {
            max-width: 1480px;
            margin: 0 auto;
            padding: 14px;
        }

        .hero {
            position: relative;
            overflow: hidden;
            border-radius: 34px;
            padding: 28px;
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(248, 250, 252, 0.92));
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: var(--shadow);
            backdrop-filter: blur(16px);
        }

        .hero::before,
        .hero::after {
            content: '';
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .hero::before {
            width: 220px;
            height: 220px;
            right: -60px;
            top: -80px;
            background: rgba(37, 99, 235, 0.12);
            filter: blur(10px);
        }

        .hero::after {
            width: 180px;
            height: 180px;
            left: -70px;
            bottom: -70px;
            background: rgba(99, 102, 241, 0.12);
            filter: blur(10px);
        }

        .header {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 26px;
            position: relative;
            z-index: 1;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-badge {
            width: 58px;
            height: 58px;
            display: grid;
            place-items: center;
            border-radius: 18px;
            background: linear-gradient(145deg, #2563eb, #7c3aed);
            color: white;
            font-size: 28px;
            box-shadow: 0 16px 35px rgba(37, 99, 235, 0.35);
        }

        .brand-copy h1 {
            margin: 0;
            font-size: clamp(2rem, 3vw, 3.3rem);
            line-height: 1.05;
            letter-spacing: -0.04em;
            color: #0f172a;
        }

        .brand-copy p {
            margin: 8px 0 0;
            color: var(--muted);
            font-size: 0.98rem;
        }

        .stats {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .stat-card {
            min-width: 150px;
            padding: 16px 18px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(148, 163, 184, 0.2);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.07);
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.14em;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: -0.04em;
            color: #0f172a;
        }

        .workspace {
            position: relative;
            z-index: 1;
            margin-top: 24px;
            display: grid;
            grid-template-columns: 380px 1fr;
            gap: 24px;
            align-items: start;
        }

        .panel {
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid var(--card-border);
            border-radius: var(--radius);
            box-shadow: 0 22px 60px rgba(15, 23, 42, 0.10);
            overflow: hidden;
        }

        .panel-head {
            padding: 22px 22px 0;
        }

        .panel-title {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            color: #0f172a;
        }

        .panel-subtitle {
            margin: 8px 0 0;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .form-wrap {
            padding: 18px 22px 22px;
        }

        .field {
            margin-top: 14px;
        }

        .label-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        label {
            display: inline-block;
            font-size: 0.9rem;
            font-weight: 700;
            color: #111827;
        }

        .hint {
            font-size: 0.8rem;
            color: var(--muted);
        }

        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            appearance: none;
            border: 1px solid rgba(148, 163, 184, 0.35);
            background: linear-gradient(180deg, #fff, #fbfdff);
            color: #0f172a;
            border-radius: 18px;
            padding: 15px 16px;
            font-size: 0.98rem;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }

        textarea {
            min-height: 132px;
            resize: vertical;
            line-height: 1.55;
        }

        input::placeholder,
        textarea::placeholder {
            color: #94a3b8;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: rgba(37, 99, 235, 0.85);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
            transform: translateY(-1px);
        }

        .select-wrap {
            position: relative;
        }

        .select-wrap::after {
            content: '▾';
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-46%);
            color: #64748b;
            pointer-events: none;
            font-size: 1rem;
        }

        .actions-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 18px;
        }

        .btn {
            border: none;
            border-radius: 16px;
            padding: 14px 18px;
            font-size: 0.98rem;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            box-shadow: 0 14px 28px rgba(37, 99, 235, 0.25);
        }

        .btn-primary:hover {
            box-shadow: 0 18px 35px rgba(37, 99, 235, 0.33);
        }

        .btn-ghost {
            background: #e2e8f0;
            color: #0f172a;
        }

        .btn-success {
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
        }

        .table-panel {
            padding: 0;
        }

        .table-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            padding: 22px 22px 16px;
            border-bottom: 1px solid rgba(148, 163, 184, 0.18);
        }

        .table-top h2 {
            margin: 0;
            font-size: 1.2rem;
            color: #0f172a;
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .table-top p {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .table-wrap {
            overflow-x: auto;
            padding: 0 0 8px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 920px;
        }

        thead th {
            text-align: left;
            background: #0f172a;
            color: white;
            padding: 18px 18px;
            font-size: 0.9rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        thead th:first-child { border-top-left-radius: 18px; }
        thead th:last-child { border-top-right-radius: 18px; }

        tbody tr {
            background: #fff;
        }

        tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        tbody td {
            padding: 17px 18px;
            border-bottom: 1px solid #e2e8f0;
            color: #0f172a;
            vertical-align: top;
            font-size: 0.95rem;
        }

        .id-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            height: 34px;
            padding: 0 12px;
            border-radius: 999px;
            background: #e2e8f0;
            color: #0f172a;
            font-weight: 800;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-low { background: #dcfce7; color: #166534; }
        .badge-medium { background: #fef3c7; color: #92400e; }
        .badge-high { background: #fee2e2; color: #991b1b; }
        .badge-pending { background: #dbeafe; color: #1d4ed8; }
        .badge-completed { background: #dcfce7; color: #166534; }

        .task-title {
            font-weight: 800;
            font-size: 1rem;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .task-desc {
            color: #64748b;
            line-height: 1.5;
            max-width: 420px;
        }

        .task-row-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .empty-state {
            padding: 48px 22px 58px;
            text-align: center;
            color: #64748b;
        }

        .empty-state .icon {
            width: 76px;
            height: 76px;
            margin: 0 auto 14px;
            border-radius: 24px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.12), rgba(124, 58, 237, 0.12));
            color: #2563eb;
            font-size: 34px;
        }

        .footer-note {
            padding: 14px 22px 24px;
            color: #94a3b8;
            font-size: 0.85rem;
            text-align: center;
        }

        @media (max-width: 1180px) {
            .workspace {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 14px;
            }

            .hero {
                padding: 18px;
                border-radius: 26px;
            }

            .brand-copy h1 {
                font-size: 1.9rem;
            }

            .table-top,
            .header {
                align-items: flex-start;
                flex-direction: column;
            }

            .stat-card {
                min-width: 120px;
                flex: 1 1 120px;
            }
        }
    </style>
</head>
<body>
@php
    use Illuminate\Support\Carbon;
    $totalTasks = $tasks->count();
    $completedTasks = $tasks->where('status', 'Completed')->count();
    $pendingTasks = $tasks->where('status', 'Pending')->count();
    $isEditing = isset($editTask);
@endphp

<div class="shell">
    <div class="hero">
        <div class="header">
            <div class="brand">
                <div class="brand-badge">🚀</div>
                <div class="brand-copy">
                    <h1>{{ $isEditing ? 'Update Task' : 'Professional Laravel To Do App' }}</h1>
                    <p>Clean CRUD interface powered by Laravel, MySQL, and Blade templates.</p>
                </div>
            </div>

            <div class="stats">
                <div class="stat-card">
                    <div class="stat-label">Total Tasks</div>
                    <div class="stat-value">{{ $totalTasks }}</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Completed</div>
                    <div class="stat-value">{{ $completedTasks }}</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Pending</div>
                    <div class="stat-value">{{ $pendingTasks }}</div>
                </div>
            </div>
        </div>

        <div class="workspace">
            <div class="panel">
                <div class="panel-head">
                    <h2 class="panel-title">{{ $isEditing ? 'Edit Task Details' : 'Add New Task' }}</h2>
                    <p class="panel-subtitle">Enter the task information and save it to your database.</p>
                </div>

                <div class="form-wrap">
                    @if($isEditing)
                        <form action="/update/{{ $editTask->id }}" method="POST">
                    @else
                        <form action="/store" method="POST">
                    @endif
                        @csrf

                        <div class="field">
                            <div class="label-row">
                                <label for="title">Task Title</label>
                                <span class="hint">Required</span>
                            </div>
                            <input id="title" type="text" name="title" placeholder="e.g. Complete Laravel assignment" value="{{ $editTask->title ?? '' }}" required>
                        </div>

                        <div class="field">
                            <div class="label-row">
                                <label for="description">Description</label>
                                <span class="hint">Optional</span>
                            </div>
                            <textarea id="description" name="description" placeholder="Write a short description of the task">{{ $editTask->description ?? '' }}</textarea>
                        </div>

                        <div class="field">
                            <div class="label-row">
                                <label for="due_date">Due Date</label>
                                <span class="hint">Optional</span>
                            </div>
                            <input id="due_date" type="date" name="due_date" value="{{ $editTask->due_date ?? '' }}">
                        </div>

                        <div class="field">
                            <div class="label-row">
                                <label for="priority">Priority</label>
                                <span class="hint">Choose urgency</span>
                            </div>
                            <div class="select-wrap">
                                <select id="priority" name="priority">
                                    <option value="Low" {{ (isset($editTask) && $editTask->priority === 'Low') || (!isset($editTask) && false) ? 'selected' : '' }}>Low</option>
                                    <option value="Medium" {{ (isset($editTask) && $editTask->priority === 'Medium') || !isset($editTask) ? 'selected' : '' }}>Medium</option>
                                    <option value="High" {{ isset($editTask) && $editTask->priority === 'High' ? 'selected' : '' }}>High</option>
                                </select>
                            </div>
                        </div>

                        <div class="field">
                            <div class="label-row">
                                <label for="status">Status</label>
                                <span class="hint">Track progress</span>
                            </div>
                            <div class="select-wrap">
                                <select id="status" name="status">
                                    <option value="Pending" {{ (isset($editTask) && $editTask->status === 'Pending') || !isset($editTask) ? 'selected' : '' }}>Pending</option>
                                    <option value="Completed" {{ isset($editTask) && $editTask->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>
                        </div>

                        <div class="actions-row">
                            <button type="submit" class="btn btn-primary">{{ $isEditing ? 'Update Task' : 'Add Task' }}</button>
                            @if($isEditing)
                                <a href="/" class="btn btn-ghost">Cancel Edit</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel table-panel">
                <div class="table-top">
                    <div>
                        <h2>Task List</h2>
                        <p>Manage your tasks with edit and delete actions.</p>
                    </div>
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 86px;">ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th style="width: 150px;">Due Date</th>
                                <th style="width: 140px;">Priority</th>
                                <th style="width: 140px;">Status</th>
                                <th style="width: 190px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tasks as $task)
                                <tr>
                                    <td><span class="id-pill">{{ $task->id }}</span></td>
                                    <td>
                                        <div class="task-title">{{ $task->title }}</div>
                                    </td>
                                    <td>
                                        <div class="task-desc">{{ $task->description ?: 'No description added' }}</div>
                                    </td>
                                    <td>{{ $task->due_date ? Carbon::parse($task->due_date)->format('d M Y') : '—' }}</td>
                                    <td>
                                        <span class="badge {{ strtolower($task->priority) === 'high' ? 'badge-high' : (strtolower($task->priority) === 'low' ? 'badge-low' : 'badge-medium') }}">
                                            {{ $task->priority }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge {{ strtolower($task->status) === 'completed' ? 'badge-completed' : 'badge-pending' }}">
                                            {{ $task->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="task-row-actions">
                                            <a href="/edit/{{ $task->id }}" class="btn btn-success">Edit</a>
                                            <a href="/delete/{{ $task->id }}" class="btn btn-danger" onclick="return confirm('Delete this task?')">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            <div class="icon">🗂️</div>
                                            <h3 style="margin:0 0 8px; color:#0f172a;">No tasks yet</h3>
                                            <p style="margin:0;">Add your first task using the form on the left.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="footer-note">Built with Laravel MVC, MySQL, Blade, and secure database interaction.</div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
