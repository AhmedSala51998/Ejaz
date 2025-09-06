<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ايجاز للاستقدام - جاري اكتشاف موقعك...</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
        .loader {
            border: 8px solid rgba(255,255,255,0.3);
            border-top: 8px solid #fff;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        h1 { font-size: 28px; margin-bottom: 10px; }
        p { font-size: 18px; }
    </style>
</head>
<body>
    <div class="loader"></div>
    <h1>ايجاز للاستقدام</h1>
    <p>جاري اكتشاف موقعك...</p>

<script>
    let geoTimeout = setTimeout(() => {
        console.log("⏳ Timeout انتهى، تحويل للفرع الافتراضي");
        window.location.href = '/yanbu';
    }, 15000); // 15 ثانية

    function redirectToServer(lat, lng) {
        axios.post('{{ route('detect.location.ajax') }}', {
            lat: lat,
            lng: lng
        }, {
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        }).then(res => {
            console.log("✅ تم التحويل للفرع:", res.data.redirect);
            window.location.href = res.data.redirect;
        }).catch(err => {
            console.error("❌ خطأ في تحويل الإحداثيات:", err);
            window.location.href = '/yanbu';
        });
    }

    if (navigator.geolocation) {
        console.log("🌍 Geolocation موجود في المتصفح");
        navigator.geolocation.getCurrentPosition(
            (position) => {
                clearTimeout(geoTimeout);
                console.log("✅ موقع المستخدم تم الحصول عليه", position.coords.latitude, position.coords.longitude);
                redirectToServer(position.coords.latitude, position.coords.longitude);
            },
            (error) => {
                clearTimeout(geoTimeout);
                console.warn("⚠️ حصل خطأ في اللوكيشن:", error.code, error.message);
                console.log("🌐 استخدام Fallback: IP-based location على السيرفر");
                // ارسال بدون إحداثيات → السيرفر يستخدم IP لتحديد الفرع
                redirectToServer(24.0890 , 38.0617);
            },
            { timeout: 5000, enableHighAccuracy: true, maximumAge: 0 }
        );
    } else {
        console.warn("❌ المتصفح لا يدعم Geolocation");
        redirectToServer(null, null);
    }
</script>
</body>
</html>
