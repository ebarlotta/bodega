const version = 2;
const assetCacheName = `assets-${version}`;

self.addEventListener("activate", event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (cacheName !== assetCacheName) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});