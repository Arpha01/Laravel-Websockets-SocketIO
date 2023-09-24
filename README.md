# Sample Laravel Websockets SocketIO

A sample repository to get started with Laravel 10 using websocket Socket.IO and Redis

* Install Predis
`composer require predis/predis`

* Update the .env file, add this configuration:
```
BROADCAST_DRIVER=redis
QUEUE_CONNECTION=redis
QUEUE_DRIVER=redis
DB_DATABASE=blog_chat
DB_USERNAME=root
DB_PASSWORD=root
REDIS_HOST=localhost
REDIS_PASSWORD=null
REDIS_PORT=6379
```
* In database.php add this redis config
```
'redis' => [
        'client' => env('REDIS_CLIENT', 'predis'), //use predis
        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', ''),
        ],
        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],
        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],
    ],
```
* Install laravel-echo-server
`npm install -g laravel-echo-server`

* Go to the project root directory and run
`laravel-echo-server init`

* Install laravel-echo package
`npm install laravel-echo`

* Install Socket.IO Client v2.0^ (currently only supports v2)
`npm i socket.io-client@2.5.0`

* Run `npm install`
  
* Create file on /resources/js/laravel-echo-setup.js
  
* In laravel-echo-setup.js add this code
```
import Echo from 'laravel-echo';
import io  from 'socket.io-client';

window.io = io;
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ":6001"
});
```
* Run `npm run dev` command to compile the laravel-echo-setup.js script using vite
  
* Create an event to broadcast message and use `implements ShouldBroadcastNow`
  
* Run `laravel-echo-server start` to start websocket
  
* Run `php artisan serve`
  
* In the blade file add this code
```
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
```

* The @vite is used to use the compiled js file to the blade file, and don't forget to use "." dot in front of the event name e.g `listen('.CheckoutEvent')`
  
* Done, try to run the event using `event(new YourEvent());` or `YourEvent::dispatch();`
