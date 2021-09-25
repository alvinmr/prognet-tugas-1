<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Form Data Diri</title>
</head>

<body>
    <div class="container">
        <form action="/hasil-form" method="post">
            @csrf
            @foreach ($formdata as $key => $value)
                @if ($value[0] == 'text' || $value[0] == 'email' || $value[0] == 'password')
                    <div class="mb-3">
                        <label for="{{ $key }}" class="form-label">{{ $value[1] }}</label>
                        <input name="{{ $key }}" type="{{ $value[0] }}" class="form-control"
                            id="{{ $key }}">
                    </div>
                @endif

                @if ($value[0] == 'select')
                    <div class="mb-3">
                        <label for="{{ $key }}" class="form-label">{{ $value[1] }}</label>
                        <select name="{{ $key }}" class="form-select" aria-label="{{ $key }}">
                            <option selected>Open this select menu</option>
                            @foreach ($value[2] as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if ($value[0] == 'checkbox' || $value[0] == 'radio')
                    <div class="mb-3">
                        <label for="{{ $key }}" class="form-label">{{ $value[1] }}</label>
                        @foreach ($value[2] as $option)
                            <div class="form-check">
                                <input name="{{ $key }}[]" class="form-check-input"
                                    type="{{ $value[0] }}" value="{{ $option }}" id="{{ $option }}">
                                <label class="form-check-label" for="{{ $option }}">
                                    {{ $option }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ($value[0] == 'textarea')
                    <div class="mb-3">
                        <label for="{{ $key }}" class="form-label">{{ $value[1] }}</label>
                        <textarea name="{{ $key }}" class="form-control" id="{{ $key }}"
                            rows="3"></textarea>
                    </div>
                @endif

                @if ($value[0] == 'submit')
                    <button class="btn btn-primary" type="{{ $value[0] }}">{{ $value[1] }}</button>
                @endif
            @endforeach
        </form>
    </div>
</body>

</html>
