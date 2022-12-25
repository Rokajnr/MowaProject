var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    // CSS FILES - Vital
    'css/style.css',
    'css/theme.bundle.css',
    'js/theme.bundle.js',
    'css/custom-default.css',
    'css/style.default.css',
    'vendor/datatable/responsive.bootstrap.min.css',
    'vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css',
    'vendor/font-awesome/css/font-awesome.min.css',
    'vendor/jquery-timepicker/jquery.timepicker.min.css',
    'vendor/dripicons/webfont.css',
    'vendor/datatable/dataTables.bootstrap4.min.css',

    // JS FILES - Vital
    'vendor/jquery/jquery.min.js',
    'vendor/jquery/jquery-ui.min.js',
    'vendor/bootstrap/js/bootstrap.min.js',
    'vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
    'vendor/datatable/dataTables.responsive.min.js',
    'vendor/datatable/dataTables.fixedHeader.min.js',
    'vendor/datatable/jquery.dataTables.min.js',
    'vendor/datatable/dataTables.bootstrap4.min.js',
    'vendor/datatable/dataTables.buttons.min.js',
    //'vendor/chart.js/Chart.min.js',
    'js/grasp_mobile_progress_circle-1.0.0.min.js',
    //'js/charts-custom.js',
    'vendor/datatable/buttons.bootstrap4.min.js',
    'vendor/datatable/buttons.html5.min.js',

    // Webfonts
    'vendor/font-awesome/webfonts/fa-regular-400.woff2',
    'vendor/font-awesome/webfonts/fa-solid-900.woff2',
    'vendor/dripicons/fonts/dripicons-v2.woff',
    'vendor/font-awesome/webfonts/fa-light-300.woff2',
    'vendor/font-awesome/webfonts/fa-thin-100.woff2',

    // ICONS
    'public/images/icons/streamlinehq-receipt-register-1-shopping-ecommerce-48.png',
    'public/images/icons/streamlinehq-spirits-glass-food-drinks-48.png',
    'public/images/icons/streamlinehq-performance-money-increase-business-products-48.png',

    'vendor/bootstrap/css/bootstrap-datepicker.min.css',
    'vendor/bootstrap/css/awesome-bootstrap-checkbox.css',
    'vendor/bootstrap/css/bootstrap-select.min.css',
    'css/grasp_mobile_progress_circle-1.0.0.min.css',
    'public/beep/beep-07.mp3',
    'public/beep/beep-timber.mp3',

    //'css/dropzone.css',
    'vendor/jquery/bootstrap-datepicker.min.js',
    'vendor/jquery/jquery.timepicker.min.js',
    'vendor/bootstrap-toggle/js/bootstrap-toggle.min.js',
    'vendor/bootstrap/js/bootstrap-select.min.js',
    'js/front.js',
    'vendor/daterange/js/daterangepicker.min.js',
    'vendor/jquery.cookie/jquery.cookie.js',
    'vendor/daterange/js/moment.min.js',
    'pos',
    '/',










];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});
