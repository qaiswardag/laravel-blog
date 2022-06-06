<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Errors running the app locally

clear the application cache and route cache:

```
composer dump-autoload
php artisan cache:clear
php artisan route:clear
```

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and
creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in
many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache)
  storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all
modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video
tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging
into our comprehensive video library.

## Installing Vue to Laravel project
1. npm install
```
npm install --save vue@next vue-router@next && npm install --save-dev vue-loader@next
```


2. Insert below in webpack.mix.js file:
```
mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        //
]);
````


3. Create a Vue 3 component:
In directory resources/js create a directory named "vue" and another directory named "components"
Inside "components" create a vue file. Example "Posts.vue"


4. Import Vue to the Laravel javascript file. Open app.js file and insert below:
```
import './bootstrap';
import {createApp} from 'vue'
import router from './vue/router'


// import vue components
import Posts from "./vue/components/Posts";

// create app
createApp({
    components: {
        'posts': Posts,
    }
})
    .use(router)
    .mount('#app')
```


5. Prepare Blade for Vue:
```
<body>

   <div id="app">

     <div>
        <posts></posts>
     </div>
 
   </div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
```



6. in terminal run: npm run watch




## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
