  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 accent-color">Dashboard</h1>
      <!--
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
              class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Registered Users</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Registered Animals</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalRegisteredPets }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-paw fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                              Adopted Pets</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAdoptedPets }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-home fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                              Volunteers</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalVolunteers }}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-heart fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>


  <div class="row">
      <div class="col-xl-6 col-lg-6">
          <div class="card shadow mb-4">

              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Donations per Type</h6>
              </div>

              <div class="card-body">
                <div class="">
                    <canvas id="pie-chart"></canvas>
                </div>

              </div>
          </div>
      </div>


      <div class="col-xl-6 col-lg-6">
          <div class="card shadow mb-4">

              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Volunteers per Program</h6>
              </div>
              <div class="card-body">
                  @if ($volunteers['volunteers_data'] != '{}')
                      <div class="">
                          <canvas id="volunteer-chart"></canvas>
                      </div>
                  @else
                      <div class="text-center py-4">
                          <p>There are no available data.</p>
                      </div>
                  @endif
              </div>


          </div>
      </div>
  </div>


  <script>
      $(function() {
          var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
          var ctx = $("#pie-chart");

          var data = {
              labels: cData.label,
              datasets: [{
                  label: "Donations Count",
                  data: cData.data,
                  backgroundColor: [
                      '#4e73df',
                      '#1cc88a',
                  ],
                  borderColor: [
                      '#4e73df',
                      '#1cc88a',
                  ],
                  borderWidth: [1, 1, 1, 1, 1, 1, 1]
              }]
          };


          var options = {
              responsive: true,
              title: {
                  display: true,
                  position: "top",
                  text: "Donations per Type",
                  fontSize: 18,
                  fontColor: "#111",
                  fontFamily: "Montserrat",
              },
              legend: {
                  display: true,
                  position: "bottom",
                  labels: {
                      fontColor: "#333",
                      fontSize: 16,
                      fontFamily: "Montserrat",
                  }
              }
          };


          var chart1 = new Chart(ctx, {
              type: "doughnut",
              data: data,
              options: options
          });

      });

      $(function() {
          var cData = JSON.parse(`<?php echo $volunteers['volunteers_data']; ?>`);
          var volunteer = $("#volunteer-chart");

          var data = {
              labels: cData.label,
              datasets: [{
                  label: "Volunteers Count",
                  data: cData.data,
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(255, 205, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(201, 203, 207, 0.2)'
                  ],
                  borderColor: [
                      'rgb(255, 99, 132)',
                      'rgb(255, 159, 64)',
                      'rgb(255, 205, 86)',
                      'rgb(75, 192, 192)',
                      'rgb(54, 162, 235)',
                      'rgb(153, 102, 255)',
                      'rgb(201, 203, 207)'
                  ],
                  borderWidth: [1, 1, 1, 1, 1, 1, 1]
              }]
          };


          var options = {
              responsive: true,
              title: {
                  display: true,
                  position: "top",
                  text: "Volunteers per Type",
                  fontSize: 18,
                  fontColor: "#111",
                  fontFamily: "Montserrat",
              },
              legend: {
                  display: true,
                  position: "bottom",
                  labels: {
                      fontColor: "#333",
                      fontSize: 16,
                      fontFamily: "Montserrat",
                  }
              }
          };


          var chart1 = new Chart(volunteer, {
              type: "doughnut",
              data: data,
              options: options
          });

      });
  </script>
