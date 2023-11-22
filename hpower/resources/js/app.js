import './bootstrap';

if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/service-worker.js')
        .then((registration) => {
            console.log('Service Worker enregistré avec succès:', registration);
        })
        .catch((error) => {
            console.error('Erreur d\'enregistrement du Service Worker:', error);
        });
}

//bannière d'installation
PWACompat({
    promptOnPwaLaunch: true,
    showCloseButton: true,
    showInstallPrompt: true,
});