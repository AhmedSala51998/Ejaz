<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>ايجاز للاستقدام - اختر مدينتك</title>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- استخدام FontAwesome للأيقونات -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
<style>
    body {
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background: linear-gradient(135deg, #ff914d, #ffb347);
        font-family: 'Tahoma', sans-serif;
        color: #fff;
    }

    h1 {
        font-size: 32px;
        margin-bottom: 40px;
        text-shadow: 1px 1px 4px rgba(0,0,0,0.3);
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        width: 80%;
        max-width: 900px;
    }

    .card {
        background: rgba(255,255,255,0.15);
        border-radius: 25px;
        padding: 30px 20px;
        text-align: center;
        font-size: 22px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.4s ease;
        box-shadow: 0 8px 25px rgba(0,0,0,0.25);
        backdrop-filter: blur(6px);
        border: 2px solid rgba(255,255,255,0.3);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .card:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 15px 35px rgba(0,0,0,0.4);
    }

    .card i {
        font-size: 50px;
        margin-bottom: 15px;
        transition: all 0.4s ease;
    }

    /* ألوان مختلفة لكل كارت */
    .jeddah { border-color: #1e90ff; color: #1e90ff; }
    .jeddah:hover { background: #1e90ff; color: #fff; }

    .yanbu { border-color: #32cd32; color: #32cd32; }
    .yanbu:hover { background: #32cd32; color: #fff; }

    .riyadh { border-color: #ff4500; color: #ff4500; }
    .riyadh:hover { background: #ff4500; color: #fff; }

    .location { border-color: #ffea00; color: #ffea00; }
    .location:hover { background: #ffea00; color: #000; }

    /* أيقونة location متحركة */
    .location-icon {
        animation: bounce 1.5s infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @media (max-width: 600px) {
        .cards {
            grid-template-columns: 1fr;
        }
        .card {
            padding: 25px 15px;
            font-size: 20px;
        }
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
function goToCity(url) {
    window.location.href = url;
}

function detectLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (pos) => {
                sendCoords(pos.coords.latitude, pos.coords.longitude);
            },
            () => {
                // رفض المستخدم → نرسل بدون إحداثيات → السيرفر يحسب IP-based
                sendCoords(null, null);
            },
            { enableHighAccuracy: true, timeout: 7000 }
        );
    } else {
        sendCoords(null, null);
    }
}

function sendCoords(lat, lng) {
    axios.post('{{ route('detect.location.ajax') }}', {
        lat: lat, lng: lng
    }, {
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    }).then(res => {
        window.location.href = res.data.redirect;
    }).catch(() => {
        // fallback بسيط لو حدث خطأ غير متوقع
        window.location.href = '/yanbu';
    });
}

</script>

</body>
</html>
