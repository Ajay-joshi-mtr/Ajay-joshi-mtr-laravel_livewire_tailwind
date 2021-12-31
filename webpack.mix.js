const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.js(['resources/js/app.js'], 'public/js') //main

// .scripts(['resources/js/charts-bars.js','resources/js/charts-lines.js','resources/js/charts-pie.js','resources/js/focus-trap.js','resources/js/init-alpine.js'],'public/js/all.js') //all merged

.sass('resources/sass/app.scss', 'public/css')
      .options({
          processCssUrls: false,
          postCss: [tailwindcss('./tailwind.config.js')],
      })
    //  .styles([
    //     'resources/sass/Chart.min.css'
    // ], 'public/css/all.css')
    
    ;//end

    // if (mix.inProduction()) {
    //     mix.version(); //cache bursting
    // }

     

    //,