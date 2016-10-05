<!DOCTYPE html5>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../resources/default/css/materialize.min.css"  media="screen,projection"/>
    <style>
      .disabled {
        pointer-events: none;
      }
    </style>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Elysium-Forum Installation</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col s12" id="header">Installation Script</div>
      </div>
      <div class="divider"></div>
      <ul class="tabs">
        <li class="tab col s3" id="step-0"><a class="active" href="#step-0-content">ReadMe</a></li>
        <li class="tab col s3 disabled" id="step-1"><a href="#step-1-content">Database Settings</a></li>
        <li class="tab col s3 disabled" id="step-2"><a href="#step-2-content">Administrator Settings</a></li>
        <li class="tab col s3 disabled" id="step-3"><a href="#step-3-content">Finish</a></li>
      </ul>
      <br />
      <div id="step-0-content" class="col s12">
        <div id="disclaimer" class="col s8 red lighten-5">
          You're just about installing an alpha version of Elysium-Forum,<br />
          This forum is open-source and created by Olivier Seror-Droin, under license MIT,<br />
          If you paid to get this software, you should consider trying to get your money back.<br />
          <br />
          MIT License<br />
          <br />
          Copyright (c) 2016 Olivier Seror-Droin<br />
          <br />
          Permission is hereby granted, free of charge, to any person obtaining a copy
          of this software and associated documentation files (the "Software"), to deal
          in the Software without restriction, including without limitation the rights
          to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
          copies of the Software, and to permit persons to whom the Software is
          furnished to do so, subject to the following conditions:<br />
          <br />
          The above copyright notice and this permission notice shall be included in all
          copies or substantial portions of the Software.<br />
          <br />
          THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
          IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
          FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
          AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
          LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
          OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
          SOFTWARE.<br />
        </div>
      </div>
      <div id="step-1-content" class="col s12">
        <form class="col s12" id="step-1-form">
          <div class="row">
            <div class="input-field col s12 m6">
              <input placeholder="localhost" id="server" name="server" type="text" class="validate" required>
              <label for="server">Server (:port)</label>
            </div>
            <div class="input-field col s12 m6">
              <select id="driver" name="driver">
                <option value="mysql" selected>MySQL</option>
                <option value="pgsql">PostgreSQL</option>
                <option value="sqlsvr">SQL Server</option>
              </select>
              <label>Database Type</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Database Name" id="db-name" name="db-name" type="text" class="validate" required>
              <label for="db-name">Database Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Database Username" id="db-user" name="db-user" type="text" class="validate" required>
              <label for="db-user">Database Username</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Database User Password" id="db-password" name="db-password" type="password" class="validate">
              <label for="db-password">Database User Password (optional)</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input placeholder="Prefix" id="db-prefix" name="db-prefix" type="text" class="validate">
              <label for="db-prefix">Prefix (optional)</label>
            </div>
          </div>
        </form>
        <a class="waves-effect waves-light btn-large blue lighten-2" id="test-db"><i class="material-icons left">build</i>Test Configuration</a>
      </div>
      <div id="step-2-content" class="col s12">
        <form class="col s12" id="step-2-form">
          <div class="row">
            <div class="input-field col s12 m6">
              <input id="admin-username" name="admin-username" type="text" class="validate" required>
              <label for="admin-username">Administrator Username</label>
            </div>
            <div class="input-field col s12 m6">
              <input id="admin-email" name="admin-email" type="email" class="validate" required>
              <label for="admin-email">Administrator E-mail</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6">
              <input id="admin-pwd" name="admin-pwd" type="password" class="validate" required>
              <label for="admin-pwd">Password</label>
            </div>
            <div class="input-field col s12 m6">
              <input id="retype-pwd" name="retype-pwd" type="password" class="validate" required>
              <label for="retype-pwd">Re-type Password</label>
            </div>
          </div>
        </form>
      </div>
      <div id="step-3-content" class="col s12">
        <div id="ready-msg" class="col s8 green lighten-5">
          The installation is ready to start, just press the button below to start the process:<br />
        </div>
        <br />
        <div class="row center-align">
          <a class="waves-effect waves-light btn-large green lighten-2 center-align" id="start-install"><i class="material-icons left">save</i>Start Installation</a>
        </div>
      </div>
      <br />
      <a class="waves-effect waves-light btn-large disabled" id="prevStep"><i class="material-icons left">navigate_before</i>previous</a>
      <a class="waves-effect waves-light btn-large" id="nextStep"><i class="material-icons left">navigate_next</i>next</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="../resources/default/js/materialize.min.js"></script>
    <script>
      $(function(){
        var step = 0;
        var lastStep = 3;

        // Intitialize select
        $('select').material_select();

        $('#nextStep').click(function(){
          //TODO: add custom error msg to checkValidity ?
          if ((step != 1 && step != 2) || $("#step-" + step + "-form")[0].checkValidity()) {
            step++;
            $('#step-' + step).removeClass('disabled');
            $('ul.tabs').tabs('select_tab', 'step-' + step + '-content');
            $('#prevStep').removeClass('disabled');
            if (step == lastStep) {
              $('#nextStep').addClass('disabled');
            }
          }
        });

        $('#prevStep').click(function(){
          step--;
          $('#nextStep').removeClass('disabled');
          $('ul.tabs').tabs('select_tab', 'step-' + step + '-content');
          if (step == 0) {
            $('#prevStep').addClass('disabled');
          }
        });

        $('#test-db').click(function(){
          // Call AJAX to a test script
          var dbForm = new FormData($('#step-1-form')[0]);

          $.ajax({
            url: "test.php",
            type: "POST",
            data: {
              "dbForm": dbForm
            },
            processData: false,
            contentType: false
          });
        });

        $('#start-install').click(function(){
          // Call AJAX to start the installation process
          var dbForm = new FormData($('#step-1-form')[0]);
          var adminForm = new FormData($('#step-2-form')[0]);

          $.ajax({
            url: "",
            type: "POST",
            data: {
              "dbForm": dbForm,
              "adminForm": adminForm
            },
            processData: false,
            contentType: false
          });
        });

      });
    </script>
  </body>
</html>
