<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
  </head>

  <body>
    <div id="app">
      <div class="container text-center">
        <h1 class="fs-1">Survey Name</h1>
        <p>Subtitle for the Survey Name</p>
      </div>
      <div class="container">
        <h5 class="fs-5 text-center">Results with perceentages</h5>
        <div v-for="(answers, qNumber) in data">
          <h3 class="fw-blod fs-6">Question #{{qNumber+1}}: Lorem ipsum dolor sit amet consectetur adipisicing elit?</h3>
          <div class="row" v-for="asnwer in [1,2,3,4,5]">
            <div class="col-12 col-md-6">
              <p>Answer for radio {{asnwer}}</p>
            </div>
            <div class="col-12 col-md-6">
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" :style="{ width: calculate(answers, asnwer) + '%'}">{{calculate(answers, asnwer)}}%</div>
              </div>
            </div>
          </div>
          <div v-if="qNumber != data.length - 1">
            <hr />
          </div>
        </div>
      </div>
      <div class="container"></div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>
</html>
