<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>جارٍ التحويل...</title>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const params = new URLSearchParams(window.location.search);
            const id = params.get('id');
            const city = localStorage.getItem('branch') || 'yanbu';

            if (id) {
                const target = `https://codeyla.com/${city}/all-workers/${id}`;
                window.location.href = target;
            } else {
                document.body.innerHTML = '<h3>لم يتم تحديد العامل</h3>';
            }
        });
    </script>
    <style>
        body {
            font-family: "Tajawal", sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: #fafafa;
            color: #444;
        }
        .loader {
            width: 40px;
            height: 40px;
            border: 4px solid #ff6a00;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-inline-end: 10px;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        .msg {
            display: flex;
            align-items: center;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="msg">
        <div class="loader"></div>
        <span>يتم تحويلك الآن...</span>
    </div>
</body>
</html>
