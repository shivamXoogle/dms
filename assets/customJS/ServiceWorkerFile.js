
//Install Service Worker
self.addEventListener('install',event =>{
    console.log('Service installed');
});

//Activate Service Worker
self.addEventListener('activate',event =>{
    console.log('Service Activated');
});

