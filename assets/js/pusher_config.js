    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    path_name = '';
    if (location.hostname === "localhost" || location.hostname === "127.0.0.1") {
        path_name = ''
    }
    window.pusher = new Pusher('71eb1661715d4d0ed82d', {
        cluster: 'eu',
        encrypted: true,
        authEndpoint: window.location.origin + path_name + '/broadcasting/auth',
        auth: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        },
        forceTLS: true
    });
