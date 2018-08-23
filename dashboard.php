<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
   <div id="container">

        <div id="header">
            <div id="welcome">
               <h2>Welcome, </h2>
            </div>
            <div id="title">
                <h1>Vester Dorm Management System</h1>
            </div>
            <div id="real-time">
                <p>
                <?php echo "Today is "  . date("l"). date("Y/m/d"). "<br>"; ?>
                </p>
            </div>
        </div>

        <div id="stat">
            <div id="vacant-div" class="stat-div-style">
                <div class="label-div-style">Vacant</div>
                <div id="green-div" class="colored-div-style"></div>
                <div class="vacant-num-div-style">50</div>
            </div>

            <div id="occupied-div" class="stat-div-style">
                <div class="label-div-style">Occupied</div>
                <div id="red-div" class="colored-div-style"></div>
                <div class="vacant-num-div-style">50</div>
            </div>

            <div id="reserved-div" class="stat-div-style">
                <div class="label-div-style">Reserved</div>
                <div id="orange-div" class="colored-div-style"></div>
                <div class="vacant-num-div-style">50</div>
            </div>

             <div id="reserved-div" class="stat-div-style">
                <div class="label-div-style">NRFO</div>
                <div id="black-div" class="colored-div-style"></div>
                <div class="vacant-num-div-style">50</div>
            </div>

        </div>

        <div id="schedule">
            <h1>Schedule of Activities</h1>
            <div id="move-in-div"></div>
        </div>

        <div id="options">

        </div>
   </div>
</body>
</html>