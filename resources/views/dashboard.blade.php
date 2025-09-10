@extends('backend.master')

@section('title', 'Dashboard')

@section('content')
<div class="page-wrapper">
    <div class="greeting-card shadow-lg rounded-4 bg-gradient-light p-5">
        <h2 class="fw-bold mb-2">👋 Hello, {{ Auth::user()->name ?? 'Guest' }}!</h2>
        <p class="lead mb-3" id="greetingText">🌞 Have a wonderful day ahead!</p>
        <p class="fw-semibold fs-5">🕒 <span id="currentTime"></span></p>
        <div class="mt-4 d-flex flex-wrap gap-2">
            
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary shadow-sm">
                <i class="bi bi-person-circle me-1"></i> Profile
            </a>
        </div>
    </div>
</div>

<script>
function updateGreeting() {
    const hour = new Date().getHours();
    let greeting = "🌞 Have a wonderful day ahead!";
    if(hour >= 5 && hour < 12) greeting = "☀️ Good Morning!";
    else if(hour >= 12 && hour < 15) greeting = "🌤 Good Noon!";
    else if(hour >= 15 && hour < 18) greeting = "🌤 Good Afternoon!";
    else if(hour >= 18 && hour < 21) greeting = "🌙 Good Evening!";
    else greeting = "🌙 Good Night!";
    document.getElementById("greetingText").innerText = greeting;
}

function updateTime() {
    document.getElementById("currentTime").innerText =
        new Date().toLocaleTimeString([], { hour:'2-digit', minute:'2-digit', second:'2-digit' });
}

updateGreeting();
updateTime();
setInterval(updateTime, 1000);
</script>

<style>
/* Page wrapper respects sidebar width */
.page-wrapper {
    margin-left: 100px; /* full sidebar width */
    transition: margin-left 0.3s ease;
    min-height: 100vh;
    padding: 30px;
}

/* Collapsed sidebar adjustments */
.navbar-vertical.collapsed + .page-wrapper,
.sidebar.collapsed + .page-wrapper {
    margin-left: 100px;
}

/* Mobile responsiveness */
@media (max-width: 992px) {
    .page-wrapper {
        margin-left: 0 !important;
        padding: 15px;
    }
}

/* Greeting card stretches to fill remaining space */
.greeting-card {
    width: 100%;
    background: linear-gradient(135deg, #ffffff, #f1f3f6);
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.greeting-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.15);
}

/* Typography */
.greeting-card h2 {
    font-size: 2rem;
    color: #1b263b;
}
.greeting-card p {
    font-size: 1.1rem;
    color: #4b5d6b;
}

/* Buttons */
.greeting-card .btn {
    min-width: 160px;
    font-weight: 500;
    border-radius: 50px;
}
.greeting-card .btn i {
    vertical-align: middle;
}
</style>
@endsection
