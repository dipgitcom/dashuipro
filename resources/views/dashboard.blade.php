@extends('backend.master')

@section('title', 'Dashboard')

@section('content')
<div class="page-wrapper">
    <div class="greeting-box p-4 mb-4 rounded-3 shadow-sm bg-light text-center">
        <h3 class="fw-bold mb-1">👋 Hey {{ Auth::user()->name ?? 'Guest' }}!</h3>
        <p class="text-muted mb-2" id="greetingText">🌞 Have a wonderful day ahead!</p>
        <p class="fw-semibold">🕒 <span id="currentTime"></span></p>
    </div>
</div>

<script>
function updateGreeting() {
    const hour = new Date().getHours();
    let greeting = "🌞 Have a wonderful day ahead!";
    if(hour>=5 && hour<12) greeting = "☀️ Good Morning!";
    else if(hour>=12 && hour<15) greeting = "🌤 Good Noon!";
    else if(hour>=15 && hour<18) greeting = "🌤 Good Afternoon!";
    else if(hour>=18 && hour<21) greeting = "🌙 Good Evening!";
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
/* Page wrapper: adjusts with sidebar */
.page-wrapper {
    transition: margin-left 0.3s ease;
    margin-left: 250px; /* full sidebar width */
    padding: 20px;
}

/* When sidebar is collapsed */
.navbar-vertical.collapsed + .page-wrapper,
.sidebar.collapsed + .page-wrapper {
    margin-left: 80px; /* collapsed sidebar width */
}

/* Mobile responsiveness */
@media (max-width: 992px) {
    .page-wrapper {
        margin-left: 0 !important;
        padding: 15px;
    }
}

/* Center the greeting box */
.greeting-box {
    max-width: 600px;
    margin: 40px auto; /* center horizontally */
    background-color: #f8f9fa; /* light background */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    text-align: center;
}
</style>
@endsection
