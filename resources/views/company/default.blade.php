<!DOCTYPE html>
<html>
<head>
    <title>Laravel Livewire Example >
    @livewireStyles
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <link href="{{ asset('wizard.css') }}" rel="stylesheet" id="bootstrap-css">
</head>
<body>

<div class="container">

    <div class="card">

      <div class="card-body">
        <livewire:company />
      </div>
    </div>

</div>

</body>

@livewireScripts

</html>
