<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="app.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<!-- UI BY Bryde ツ -->
<body>
    <div class="container jumbotron">
        <div class="row">
            <h1>Local Moves</h1>
            <div class="table-responsive">
                <table id="moving" class="table table-striped table-bordered table-hover table-dark">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>File</th>
                            <th>Path</th>
                            <th>GDSA</th>
                            <th>Destination</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>The Avengers (2019) <span class="badge badge-primary" style="float:right;">Movie</span></td>
                            <td>/mnt/move/The Avengers (2019)</td>
                            <td>GDSA10</td>
                            <td>/mnt/PGBlitz/GDSA10/The Avengers (2019)</td>
                        </tr>
                        <tr>
                            <th>2</th>
                            <td>The Avengers (2019) <span class="badge badge-primary">Movie</span></td>
                            <td>/mnt/move/The Avengers (2019)</td>
                            <td>GDSA10</td>
                            <td>/mnt/PGBlitz/GDSA10/The Avengers (2019)</td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>The Avengers (2019)</td>
                            <td>/mnt/move/The Avengers (2019)</td>
                            <td>GDSA10</td>
                            <td>/mnt/PGBlitz/GDSA10/The Avengers (2019)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <h1>Uploads</h1>
            <div class="table-responsive">
                <table id="uploading" class="table table-striped table-bordered table-hover table-dark">
                    <thead>
                        <tr>
                            <th>Filename</th>
                            <th>GDSA</th>
                            <th>Progress bar</th>
                            <th>Speed</th>
                            <th style="width:10%">Time Left</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>The.Avengers.2019.1080p.BluRa.mkv</th>
                            <td>GDSA10</td>
                            <td><div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div></div></td>
                            <td>70 MB/s <i class="fas fa-fighter-jet" style="color:green; float:right;"></i></td>
                            <td>5 min</td>
                        </tr>
                        <tr>
                            <th>The.Avengers.2019.1080p.BluRa.mkv</th>
                            <td>GDSA10</td>
                            <td><div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">50%</div></div></td>
                            <td>69 MB/s <i class="fas fa-truck" style="color:yellow; float:right;"></i></td>
                            <td>30 min</td>
                        </tr>
                        <tr>
                            <th>The.Avengers.2019.1080p.BluRa.mkv</th>
                            <td>GDSA10</td>
                            <td><div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div></div></td>
                            <td>10 MB/s <i class="fas fa-dolly" style="color:red; float:right;"></i></td>
                            <td>1h 5m 10s</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <h1>vfs waits</h1>
            <div class="table-responsive">
                <table id="vfs" class="table table-striped table-bordered table-hover table-dark">
                    <thead>
                        <tr>
                            <th>Filename</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>/tdrive/movies/The Avengers (2019)/The.Avengers.2019.1080p.BluRa.mkv</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <h1>Completed</h1>
            <div class="table-responsive">
                <table id="done" class="table table-striped table-bordered table-hover table-dark">
                    <thead>
                        <tr>
                            <th>Filename</th>
                            <th>GDSA</th>
                            <th>Time spend</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>/tdrive/movies/The Avengers (2019)/The.Avengers.2019.1080p.BluRa.mkv</td>
                            <td>GDSA10</td>
                            <td>15 min</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- container -->
</body>
</html>