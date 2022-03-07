if('serviceWorker' in navigator){
    navigator.serviceWorker.register('/DMS_Microtek/assets/customJS/ServiceWorkerFile.js')
    .then((reg) => console.log('Service Worker Registred',reg))
    .catch((err) => console.log('Service Worker Not Registred',err))
}

