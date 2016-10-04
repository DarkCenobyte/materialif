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
        <li class="tab col s3" id="step-0"><a class="active" href="#readme">ReadMe</a></li>
        <li class="tab col s3 disabled" id="step-1"><a href="#database">Database Settings</a></li>
        <li class="tab col s3 disabled" id="step-2"><a href="#admin">Administrator Settings</a></li>
        <li class="tab col s3 disabled" id="step-3"><a href="#finish">Finish</a></li>
      </ul>
      <br />
      <div id="readme" class="col s12">
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
        <br />
        <a class="waves-effect waves-light btn-large disabled" id="prevStep"><i class="material-icons left">navigate_before</i>previous</a>
        <a class="waves-effect waves-light btn-large" id="nextStep"><i class="material-icons left">navigate_next</i>next</a>
      </div>
      <div id="database" class="col s12">Test 2</div>
      <div id="admin" class="col s12">Test 3</div>
      <div id="finish" class="col s12">Test 4</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="../resources/default/js/materialize.min.js"></script>
    <script>
      $(function(){
        var step = 0;
        var lastStep = 3;

        $("#nextStep").click(function(){
          //checkForm before
          step++;
          $("#prevStep").removeClass('disabled');
          if (step == lastStep) {
            $("#nextStep").addClass('disabled');
          }
        });
        $("#prevStep").click(function(){
          step--;
          $("#nextStep").removeClass('disabled');
          if (step == 0) {
            $("#prevStep").addClass('disabled');
          }
        });
      });
    </script>
  </body>
</html>
