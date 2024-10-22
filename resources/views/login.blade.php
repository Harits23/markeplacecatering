<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login<title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
            background: linear-gradient(to right, #A91D3A, #ff4d4d);
            /* Gradien merah */
        }

        .container {
            text-align: center;
        }

        .form-container {
            display: inline-block;
            text-align: left;
            width: 50%;
            height: 100%;
            background-color: white;
            /* Background putih untuk form */
            padding: 20px;
            border-radius: 8px;
            /* Optional: Membuat sudut form sedikit melengkung */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            /* Optional: Menambahkan bayangan */
        }

        .header {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-items: center;
        }

        .header-text {
            display: flex;
            flex-direction: column;
            margin-left: 120px;
        }

        .input-icon {
            position: relative;
        }

        .input-icon input {
            padding-left: 30px;
            /* Atur padding kiri untuk memberi ruang bagi ikon */
        }

        .input-icon i {
            position: absolute;
            left: 10px;
            top: 70%;
            transform: translateY(-50%);
        }

        .divider-vertical {
            border-left: 1px solid #A91D3A;
            height: 100%;
            position: absolute;
            left: 10%;
            top: 1%;
            transform: translateX(-50%);
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="form-container">
            <form action="{{ route('actionlogin') }}" method="post">
                <div class="col">
                    <div class="col-md-10 col-md-offset-1">
                        @csrf
                        <div class="md-7">
                            <h2 class="text-center"><b>LOGIN</b></h2>
                            <div class="divider"></div>
                            @if(session('error'))
                            <div class="alert alert-danger">
                                <b>Opps!</b> {{ session('error') }}
                            </div>
                            @endif
                            <div class="form-group input-icon">
                                <label for="username">USERNAME<span style="color: red;"> *</span></label>
                                <i class="fas fa-user"></i>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group input-icon">
                                <label for="password">PASSWORD<span style="color: red;"> *</span></label>
                                <i class="fas fa-lock"></i> <!-- Icon Password -->
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-block" style="background-color: #A91D3A; color:white;"><i class="fas fa-sign-in-alt"></i> Log In</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>
