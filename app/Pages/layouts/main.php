<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- change this with dynamic change of title -->
        <title> <?= \App\Core\Router::$title; ?> </title>

        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bulma.min.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <!-- import custom css -->
        <link rel="stylesheet" href="/public/assets/css/global-style.css">

        <style>
             footer {
               /* set the footer in the bottom fixed */
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #333;
                color: white;
                text-align: center;
                padding: 10px 0;
            }
        </style>
    </head>

    <body>

        <div class="container is-fluid">
            {{content}}
        </div>

        <footer>
            <p>&copy; 2023 Barangay Name. All rights reserved.</p>
        </footer>
        <!-- import jquery cdn -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- import datatables cdn -->
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

        <script src="">
            let table = new DataTable('#myTable');
        </script>

    </body>

</html>