<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    TESTING SOCKET
    <p id="test"></p> 
    @vite(['resources/js/app.js', 'resources/js/laravel-echo-setup.js'])
    <script>
       window.onload = function() {
          window.Echo.channel('order').listen('.NewOrder', (data) => {
            console.log(data);
            const pElement = document.querySelector('#test');
            pElement.value = data;
          })
       }
    </script>
</body>
</html>