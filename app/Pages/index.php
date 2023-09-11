<link rel="stylesheet" href="/public/assets/css/sidebar-style.css">
<link rel="stylesheet" href="/public/assets/css/card-style.css">
<link rel="stylesheet" href="/public/assets/css/table-style.css">
<link rel="stylesheet" href="/public/assets/css/icons-style.css">
<link rel="stylesheet" href="/public/assets/css/responsive-style.css">

<div class="sidebar is-fullwidth">

    <!-- admin header -->
    <ul class="side-menu">

        <div class="admin-header">
            <p class="title has-text-centered ">Barangay Palico 4</p>
        </div>
        <!-- links with icon using boxicon and gap their spacing -->
        <li class="has-text-centered-mobile "><a href="#"><i
                    class='bx bxs-dashboard bx-tada-hover is-size-5-mobile has-text-danger'></i><span
                    class="hide">Dashboard</span></a></li>
        <li class="has-text-centered-mobile"><a href="residents.php"><i
                    class='bx bxs-user bx-tada-hover is-size-5-mobile has-text-link-dark'></i><span
                    class="hide">Residents</span></a></li>
        <li class="has-text-centered-mobile"><a href="settings.php"><i
                    class='bx bxs-cog bx-tada-hover is-size-5-mobile has-text-black-ter'></i><span
                    class="hide">Settings</span></a></li>

        <!-- logout -->
        <!-- this should be put in navbar or put this sidebar in a condition -->
        <li class="has-text-centered-mobile"><a class="has-text-danger " href="/logout"><i
                    class='bx bx-log-out bx-tada-hover is-size-5-mobile'></i>Logout</a></li>
    </ul>

</div>

<div class="content">


    <!-- 3 Card Here in Flex -->
    <div class="columns card-flex">
        <div class="column ">
            <div class="card has-background-primary-light">
                <div class="card-content has-text-centered">
                    <p class="title is-size-4-mobile">
                        1
                    </p>
                    <p class="subtitle is-size-7-mobile ">
                        Total New Reports
                    </p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card has-background-black-bis ">
                <div class="card-content  has-text-centered">
                    <p class="title has-text-white">
                        2
                    </p>
                    <p class="subtitle is-size-7-mobile has-text-white-bis">
                        Total number of Reports
                    </p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card has-background-warning">
                <div class="card-content has-text-centered">
                    <p class="title">
                        3
                    </p>
                    <p class="subtitle is-size-7-mobile">
                        Total number of Users
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end of 3 cards -->

    <!-- List of Cases here using DATATABLE -->
    <table id="myTable" class="table is-bordered is-fullwidth  is-hoverable">
        <!-- header for the table -->
        <div class="table-header">
            <p class="table-header-title">List of Cases</p>

            <!-- <div class="buttons">
                            <button class="button is-danger is-small">
                                Mark as done
                            </button>
                        </div> -->
        </div>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>30</td>
                <td>USA</td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>jane@example.com</td>
                <td>25</td>
                <td>Canada</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

</div>