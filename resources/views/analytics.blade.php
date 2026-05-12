<!DOCTYPE html>

<html lang="en">
<head>

```
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Analytics Dashboard</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
        z-index:100;
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
        font-size:30px;
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

    .hero h1{
        font-size:65px;
        font-weight:800;
        line-height:1.1;
        margin-bottom:12px;
    }

    .gradient{
        background:linear-gradient(90deg,#3b82f6,#a855f7);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
    }

    .hero p{
        color:#94a3b8;
        font-size:20px;
    }

    /* STATS */

    .stats{
        display:grid;
        grid-template-columns:repeat(4,1fr);
        gap:25px;
        margin-bottom:35px;
    }

    .card{
        background:rgba(9,18,37,0.95);
        border:1px solid rgba(255,255,255,0.05);
        border-radius:30px;
        padding:30px;
        position:relative;
        overflow:hidden;
        transition:0.3s;
    }

    .card:hover{
        transform:translateY(-5px);
        box-shadow:0 20px 40px rgba(0,0,0,0.3);
    }

    .card h4{
        color:#94a3b8;
        font-size:14px;
        letter-spacing:2px;
        margin-bottom:20px;
    }

    .card h2{
        font-size:60px;
        font-weight:800;
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

    /* CHARTS */

    .charts{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:30px;
    }

    .chart-card{
        background:rgba(9,18,37,0.95);
        border:1px solid rgba(255,255,255,0.05);
        border-radius:30px;
        padding:30px;
    }

    .chart-card h2{
        margin-bottom:10px;
        font-size:32px;
    }

    .chart-card p{
        color:#94a3b8;
        margin-bottom:25px;
    }

    canvas{
        width:100% !important;
        height:350px !important;
    }

    @media(max-width:1200px){

        .stats{
            grid-template-columns:repeat(2,1fr);
        }

        .charts{
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
            <p>Analytics Panel</p>
        </div>

    </div>

    <div class="menu">

        <a href="/dashboard">🏠 Dashboard</a>

        <a href="/tasks">📋 Tasks</a>

        <a href="/analytics" class="active">
            📊 Analytics
        </a>

        <a href="#">👤 Profile</a>

        <a href="#">⚙️ Settings</a>

    </div>

</div>

<!-- MAIN -->

<div class="main">

    <div class="hero">

        <h1>
            Analytics <span class="gradient">Dashboard</span>
        </h1>

        <p>
            Visualize your task performance professionally.
        </p>

    </div>

    <!-- STATS -->

    <div class="stats">

        <div class="card">

            <h4>TOTAL TASKS</h4>

            <h2 class="blue">12</h2>

        </div>

        <div class="card">

            <h4>COMPLETED</h4>

            <h2 class="green">8</h2>

        </div>

        <div class="card">

            <h4>PENDING</h4>

            <h2 class="purple">4</h2>

        </div>

        <div class="card">

            <h4>PRODUCTIVITY</h4>

            <h2 class="orange">92%</h2>

        </div>

    </div>

    <!-- CHARTS -->

    <div class="charts">

        <div class="chart-card">

            <h2>Status Report</h2>

            <p>Completed vs pending tasks</p>

            <canvas id="statusChart"></canvas>

        </div>

        <div class="chart-card">

            <h2>Priority Report</h2>

            <p>Tasks by priority level</p>

            <canvas id="priorityChart"></canvas>

        </div>

        <div class="chart-card">

            <h2>Weekly Activity</h2>

            <p>Tasks created per week</p>

            <canvas id="activityChart"></canvas>

        </div>

        <div class="chart-card">

            <h2>Performance Growth</h2>

            <p>Monthly productivity report</p>

            <canvas id="growthChart"></canvas>

        </div>

    </div>

</div>
```

</div>

<script>

    // STATUS CHART

    new Chart(document.getElementById('statusChart'), {

        type:'doughnut',

        data:{
            labels:['Completed','Pending'],
            datasets:[{
                data:[8,4],
                backgroundColor:[
                    '#10b981',
                    '#8b5cf6'
                ],
                borderWidth:0
            }]
        },

        options:{
            responsive:true,
            plugins:{
                legend:{
                    labels:{
                        color:'white'
                    }
                }
            }
        }

    });

    // PRIORITY CHART

    new Chart(document.getElementById('priorityChart'), {

        type:'bar',

        data:{
            labels:['Low','Medium','High'],
            datasets:[{
                data:[2,6,4],
                backgroundColor:[
                    '#22c55e',
                    '#f59e0b',
                    '#ef4444'
                ],
                borderRadius:15
            }]
        },

        options:{
            responsive:true,
            plugins:{
                legend:{
                    display:false
                }
            },
            scales:{
                x:{
                    ticks:{color:'white'},
                    grid:{color:'rgba(255,255,255,0.05)'}
                },
                y:{
                    ticks:{color:'white'},
                    grid:{color:'rgba(255,255,255,0.05)'}
                }
            }
        }

    });

    // ACTIVITY CHART

    new Chart(document.getElementById('activityChart'), {

        type:'line',

        data:{
            labels:['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
            datasets:[{
                data:[2,4,3,5,7,6,8],
                borderColor:'#3b82f6',
                backgroundColor:'rgba(59,130,246,0.2)',
                fill:true,
                tension:0.4
            }]
        },

        options:{
            responsive:true,
            plugins:{
                legend:{
                    display:false
                }
            },
            scales:{
                x:{
                    ticks:{color:'white'},
                    grid:{color:'rgba(255,255,255,0.05)'}
                },
                y:{
                    ticks:{color:'white'},
                    grid:{color:'rgba(255,255,255,0.05)'}
                }
            }
        }

    });

    // GROWTH CHART

    new Chart(document.getElementById('growthChart'), {

        type:'radar',

        data:{
            labels:[
                'Design',
                'Coding',
                'Testing',
                'Planning',
                'Research',
                'Deployment'
            ],

            datasets:[{
                data:[85,95,75,80,88,92],
                backgroundColor:'rgba(168,85,247,0.2)',
                borderColor:'#a855f7',
                pointBackgroundColor:'#a855f7'
            }]
        },

        options:{
            responsive:true,
            plugins:{
                legend:{
                    labels:{
                        color:'white'
                    }
                }
            },
            scales:{
                r:{
                    angleLines:{
                        color:'rgba(255,255,255,0.1)'
                    },
                    grid:{
                        color:'rgba(255,255,255,0.1)'
                    },
                    pointLabels:{
                        color:'white'
                    },
                    ticks:{
                        color:'white',
                        backdropColor:'transparent'
                    }
                }
            }
        }

    });

</script>

</body>
</html>
