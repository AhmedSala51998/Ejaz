<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>ايجاز للاستقدام - اختر مدينتك</title>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    /* عام */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background: linear-gradient(135deg, rgba(255,126,95,0.15), rgba(254,180,123,0.15));
        color: #fff;
        padding: 20px;
        overflow-x: hidden;
    }

    h1 {
        font-size: 3rem;
        margin-bottom: 50px;
        text-align: center;
        text-shadow: 2px 2px 15px rgba(0,0,0,0.4);
        letter-spacing: 1px;
    }

    /* شبكة الكروت */
    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 30px;
        width: 100%;
        max-width: 1000px;
        perspective: 1000px; /* لإضافة تأثير 3D عند hover */
    }

    /* تصميم الكروت */
    .card {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 25px;
        padding: 35px 25px;
        text-align: center;
        font-size: 1.3rem;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.6s ease, background 0.5s ease;
        box-shadow: 0 12px 30px rgba(0,0,0,0.25);
        backdrop-filter: blur(12px);
        border: 2px solid rgba(255,255,255,0.15);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .card i {
        font-size: 60px;
        margin-bottom: 18px;
        transition: transform 0.6s ease, color 0.5s ease;
    }

    .card:hover {
        transform: rotateY(10deg) translateY(-12px) scale(1.08);
        box-shadow: 0 25px 60px rgba(0,0,0,0.45);
    }

    /* ألوان مخصصة */
    .jeddah { border-color: #1e90ff; color: #1e90ff; }
    .jeddah:hover { background: #1e90ff; color: #fff; }

    .yanbu { border-color: #32cd32; color: #32cd32; }
    .yanbu:hover { background: #32cd32; color: #fff; }

    .riyadh { border-color: #ff4500; color: #ff4500; }
    .riyadh:hover { background: #ff4500; color: #fff; }

    .location { border-color: #ffea00; color: #ffea00; }
    .location:hover { background: #ffea00; color: #000; }

    /* أيقونة location متحركة */
    .location-icon { animation: bounce 1.5s infinite; }
    @keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-15px); } }

    /* ظل خلف الكروت عند hover */
    .card::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0; left: 0;
        border-radius: 25px;
        background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0));
        opacity: 0;
        transition: opacity 0.5s ease;
        z-index: 0;
    }

    .card:hover::before { opacity: 1; }

    /* responsive */
    @media (max-width: 1024px) { .cards { gap: 25px; } }
    @media (max-width: 768px) {
        .cards { grid-template-columns: 1fr; gap: 20px; }
        h1 { font-size: 2.5rem; margin-bottom: 35px; }
        .card { padding: 28px 20px; font-size: 1.1rem; }
        .card i { font-size: 50px; margin-bottom: 15px; }
    }
    @media (max-width: 480px) {
        h1 { font-size: 2rem; margin-bottom: 25px; }
        .card { padding: 22px 15px; font-size: 1rem; }
        .card i { font-size: 45px; margin-bottom: 12px; }
    }
</style>
</head>
<body>

<h1>اختر مدينتك</h1>

<div class="cards">
    <div class="card jeddah" onclick="goToCity('/jeddah')">
        <i class="fas fa-city"></i>
        جدة
    </div>
    <div class="card yanbu" onclick="goToCity('/yanbu')">
        <i class="fas fa-water"></i>
        ينبع
    </div>
    <div class="card riyadh" onclick="goToCity('/riyadh')">
        <i class="fas fa-building"></i>
        الرياض
    </div>
    <div class="card location" onclick="detectLocation()">
        <i class="fas fa-map-marker-alt location-icon"></i>
        استكشف موقعي
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const savedBranch = localStorage.getItem('branch');
    if (savedBranch) window.location.href = `/${savedBranch}`;
});

function goToCity(url) {
    const branch = url.replace('/', '');
    localStorage.setItem('branch', branch);
    window.location.href = url;
}

function detectLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (pos) => sendCoords(pos.coords.latitude, pos.coords.longitude),
            () => sendCoords(null, null),
            { enableHighAccuracy: true, timeout: 7000 }
        );
    } else sendCoords(null, null);
}

function sendCoords(lat, lng) {
    axios.post('{{ route('detect.location.ajax') }}', { lat, lng }, {
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    }).then(res => {
        const url = res.data.redirect;
        const branch = url.split('/').pop();
        localStorage.setItem('branch', branch);
        window.location.href = url;
    }).catch(() => window.location.href = '/yanbu');
}
</script>

</body>
</html>
