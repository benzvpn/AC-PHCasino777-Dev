<head>
    <title>How to use and customize SweetAlert2</title>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

    <style>
        body {
            background-color: aliceblue;
            font-family: sans-serif;
            text-align: center;
        }

        button {
            background-color: cadetblue;
            color: whitesmoke;
            border: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
            font-size: 18px;
            font-weight: 500;
            border-radius: 7px;
            padding: 15px 35px;
            cursor: pointer;
            white-space: nowrap;
            margin: 10px;
        }

        img {
            width: 200px;
        }

        input[type="text"] {
            padding: 12px 20px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }

        h1 {
            border-bottom: solid 2px grey;
        }

        #success {
            background: green;
        }

        #error {
            background: red;
        }

        #warning {
            background: coral;
        }

        #info {
            background: cornflowerblue;
        }

        #question {
            background: grey;
        }
    </style>
</head>

<body>
    <div>
        <h1>How to use and customize <img src="https://sweetalert2.github.io/images/swal2-logo.png"></h1>
        <div>
            <h4>Modal Type</h4>
            <p>Sweet alert with modal type and customize message alert with html and css</p>
            <button id="success">Success</button>
            <button id="error">Error</button>
            <button id="warning">Warning</button>
            <button id="info">Info</button>
            <button id="question">Question</button>
        </div>
        <br>
        <div>
            <h4>Custom image and alert size</h4>
            <p>Alert with custom icon and background icon</p>
            <button id="icon">Custom Icon</button>
            <button id="image">Custom Background Image</button>
        </div>
        <br>
        <div>
            <h4>Alert with input type</h4>
            <p>Sweet Alert with Input and loading button</p>
            <button id="subscribe">Subscribe</button>
        </div>
        <br>
        <div>
            <h4>Redirect to visit another site</h4>
            <p>Alert to visit a link to another site</p>
            <button id="link">Redirect to Utopian</button>
        </div>
    </div>
    <script>
        // Alert Modal Type
        $(document).on('click', '#success', function(e) {
            swal(
                'Success',
                'You clicked the <b style="color:green;">Success</b> button!',
                'success'
            )
        });

        $(document).on('click', '#error', function(e) {
            swal(
                'Error!',
                'You clicked the <b style="color:red;">error</b> button!',
                'error'
            )
        });

        $(document).on('click', '#warning', function(e) {
            swal(
                'Warning!',
                'You clicked the <b style="color:coral;">warning</b> button!',
                'warning'
            )
        });

        $(document).on('click', '#info', function(e) {
            swal(
                'Info!',
                'You clicked the <b style="color:cornflowerblue;">info</b> button!',
                'info'
            )
        });

        $(document).on('click', '#question', function(e) {
            swal(
                'Question!',
                'You clicked the <b style="color:grey;">question</b> button!',
                'question'
            )
        });

        // Alert With Custom Icon and Background Image
        $(document).on('click', '#icon', function(event) {
            swal({
                title: 'Custom icon!',
                text: 'Alert with a custom image.',
                imageUrl: 'https://image.shutterstock.com/z/stock-vector--exclamation-mark-exclamation-mark-hazard-warning-symbol-flat-design-style-vector-eps-444778462.jpg',
                imageWidth: 200,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: false
            })
        });

        $(document).on('click', '#image', function(event) {
            swal({
                title: 'Custom background image, width and padding.',
                width: 700,
                padding: 150,
                background: '#fff url(https://image.shutterstock.com/z/stock-vector--exclamation-mark-exclamation-mark-hazard-warning-symbol-flat-design-style-vector-eps-444778462.jpg)'
            })
        });

        // Alert With Input Type
        $(document).on('click', '#subscribe', function(e) {
            swal({
                title: 'Submit email to subscribe',
                input: 'email',
                inputPlaceholder: 'Example@email.xxx',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                preConfirm: (email) => {
                    return new Promise((resolve) => {
                        setTimeout(() => {
                            if (email === 'example@email.com') {
                                swal.showValidationError(
                                    'This email is already taken.'
                                )
                            }
                            resolve()
                        }, 2000)
                    })
                },
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    swal({
                        type: 'success',
                        title: 'Thank you for subscribe!',
                        html: 'Submitted email: ' + result.value
                    })
                }
            })
        });

        // Alert Redirect to Another Link
        $(document).on('click', '#link', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "You will be redirected to https://utopian.io",
                    type: "warning",
                    confirmButtonText: "Yes, visit link!",
                    showCancelButton: true
                })
                .then((result) => {
                    if (result.value) {
                        window.location = 'https://utopian.io';
                    } else if (result.dismiss === 'cancel') {
                        swal(
                            'Cancelled',
                            'Your stay here :)',
                            'error'
                        )
                    }
                })
        });
    </script>
</body>