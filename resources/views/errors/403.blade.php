<!DOCTYPE html>
<html>
<head>
    <title>Error 403 - Acceso prohibido</title>
    <style>
        body {
            background-color: #f3f3f3;
            font-family: Arial, sans-serif;
        }

        .error-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .error-title {
            font-size: 48px;
            color: #FE0895;
            margin-bottom: 20px;
        }

        .error-subtitle {
            font-size: 24px;
            color: #000;
            text-align: center;
            margin-bottom: 40px;
        }

        .error-image {
            width: 200px;
            margin-bottom: 40px;
        }

        .error-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 8px 16px;
    background-color: #EFA39C;
    border: none;
    border-radius: 4px;
    font-weight: 600;
    font-size: 18px;
    text-transform: uppercase;
    color: #fff;
    transition: all 0.3s ease-in-out;
    cursor: pointer;
}

.error-button:hover {
    transform: translateY(-1px) scale(1.1);
}

.error-button:focus {
    outline: none;
    box-shadow: 0 0 0 2px #FFA2A2;
}

.error-button:active {
    background-color: #FFA2A2;
}


        .error-button:hover {
            background-color: #FE0895;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <img src="{{ asset('/img/icono.png') }}" class="error-image" alt="Error 403">
        <h1 class="error-title">Acceso prohibido</h1>
        <p class="error-subtitle">Para poder acceder a esta ventana requieres permisos adicionales</p>
        
        <button onclick="redirectToInicio()" class="error-button">Volver al inicio</button>
    </div>
</body>
</html>
<script>
    function redirectToInicio() {
        // Redirigir a la ruta de inicio definida en Laravel
        window.location.href = "{{ route('iniciologin') }}";
    }
</script>