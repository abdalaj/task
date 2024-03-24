<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    @routes
    @vite('resources/js/app.js')
    @inertiaHead
</head>

<body class="antialiased">
    @inertia

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.language = "{{ session()->get('locale', 'en') }}";
    window.t = (key = null) => {
        let tran = "{{ json_encode(__('app')) }}";
        tran = JSON.parse(decodeEntities(tran));
        return tran[key];
    };
    function decodeEntities(encodedString) {
        const parser = new DOMParser();
        const dom = parser.parseFromString('<!doctype html><body>' + encodedString, 'text/html');
        const decodedString = dom.body.textContent;
        return decodedString;
    }
</script>

</html>
