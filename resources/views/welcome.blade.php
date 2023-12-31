<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat Appplication</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js']);
</head>

<body>
    <div class="app">
        <div class="row">

            <div class="col-sm-6 offset-sm-3 my-2">
                <input type="text" class="form-control" name="username" id="username"
                    placeholder="Enter a user ..........">
            </div>

            <div class="col-sm-6 offset-sm-3">
                <div class="box box-primary direct-chat direct-chat-primary">

                    <div class="box-body">
                        <div class="direct-chat-messages" id="messageBody"></div>
                    </div>

                    <div class="box-footer">
                        <form action="#" method="post" id="message_form">
                            <div class="input-group">
                                <input type="text" name="message" id="message" placeholder="Type Message ..."
                                    class="form-control">
                                <span class="input-group-btn">
                                    <button type="submit" id="button-addon1"
                                        class="btn btn-primary btn-flat">Send</button>
                                </span>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>

</html>
