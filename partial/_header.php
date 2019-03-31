<?php
 session_start();
 require_once'./database/db_connection.php';

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cssstyle.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<body>


          <div class="bg-dark collapse" id="topbar">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-8 py-4">
                          <h4 class="text-white">About</h4>
                          <p class="text-muted">
                              Something short and leading about the collection below—its
                              contents,
                              etc. Make it short and sweet, but not too short so folks don’t.

                          </p>
                      </div>
                      <div class="col-sm-4 py-4">
                          <h3 class="text-white">LLC</h3>
                          <p class="text-muted">
                              Make it short and sweet, but not too short so folks don’t.
                          </p>
                      </div>

                  </div>
              </div>
          </div>

        <div class="navbar navbar-dark bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <strong>PPI_BATCH</strong>
                </a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#topbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </div>


