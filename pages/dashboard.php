<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" type="image/png" href="../assets/img/logo_web.png" />
  <title>ddc_moph_dashboard</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integr />
  <style>
    @media (max-width: 820px) {
      .welcome-area {
        margin-left: 15px;
      }
    }

    @media (max-width: 540px) {
      .welcome-area {
        margin-left: 35px;
      }

    }

    @media (max-width: 412px) {
      .welcome-area {
        margin-left: 45px;
      }
    
    }
    
  </style>
</head>

<body class="g-sidenav-show bg-gray-100" id="capture">
  <main class="main-content position-relative max-height-vh-100 h-100 mt-0 border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-success">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb" style="color: white">
          <div class="row">
            <div class="col-1">
              <img style="margin-top:10px" src="../assets/img/logo_web.png" alt="" width="70px" height="auto">
            </div>
            <div class="col-11 ">
              <h3 style="margin-top:10px" class="welcome-area">SORDPC-DDC Daily Dashboard </h3>
              <p class="mb-0 welcome-area">
                สำนักงานเลขานุการคณะกรรมการโครงการพระราชดำริ
                โครงการเฉลิมพระเกียรติ
                และโครงการที่เกี่ยวเนื่องกับพระบรมวงศานุวงศ์ กรมควบคุมโรค
              </p>
            </div>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-1">
      <div class="row mt-1 mb-2">
        <div class="col-12">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h4 style="margin-left:30px; margin-top:0px">รถตรวจชีวะนิรภัย</h4>
          <h6 style="margin-left:30px; margin-top:0px">ข้อมูล ณ วันที่ <?php echo date('d/m/Y') ?></h6>

        </div>
        <div class="col">
          <div class="p-0 d-flex justify-content-end ">
            <button onclick="capturePage()" type="button" id="printPageButton" class="a btn-generate btn btn-primary mb-0" style="background-color: #009CEC; ">บันทึก</button>
            <FORM>
                <INPUT style="margin-left:3px; " TYPE="button" value="กลับหน้าหลัก" class="btn-generate btn btn-light mb-0 " onClick="history.back()">
              </FORM>
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-lg-7 pb-2">
          <div class="card h-100 z-index-2">
            <div class="card-header pb-0">
              <h6>รถเก็บตัวอย่าง (สคร. จำนวนยอดตรวจทั้งหมด)</h6>
            </div>
            <div class="card-body p-3 pt-0">
              <div class="row">
                <div class="col-md-6">
                <form class="form-inline">
                    <label>กรุณาเลือกวันที่ :</label>
                  </form>
                  <div class="form-group input-group-sm">
                    <input onChange="filterDate1(this.value)" id="date1" type="text" class="form-control datepicker1" placeholder="วัน/เดือน/ปี" autocomplete="off" autofill="off">
                  </div>
                </div>
              </div>
              <div class="chartBar1">
                <canvas id="graphCanvasBar1" class="chartBarCanvas1" height="135" style="border-radius: .8rem;"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 pb-2">
          <div class="card h-100 z-index-2">
            <div class="card-header pb-0">
              <h6>รถเก็บตัวอย่าง (จังหวัดที่จำนวนยอดตรวจทั้งหมด)</h6>
            </div>
            <div class="card-body p-3 pt-0">
              <div class="row">
                <div class="col-md-8">
                  <form class="form-inline">
                    <label>กรุณาเลือกวันที่ :</label>
                  </form>
                  <div class="form-group input-group-sm">
                    <input onChange="filterDate2(this.value)" id="date2" type="text" class="form-control datepicker2" placeholder="วัน/เดือน/ปี" autocomplete="off" autofill="off">
                  </div>
                </div>
              </div>
              <div class="chartBar3">
                <canvas id="graphCanvasBar2" class="chartBarCanvas3" height="560" style="border-radius: .8rem;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- footer -->
      <footer class="footer pt-3">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                ,
                <a href="https://www.creative-tim.com" class="copyright text-center text-sm text-muted text-lg-start">TGS Enterprise Network Co., Ltd.</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- end footer -->
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



  <!-- DatePicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="../node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
  <script src="../node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="../node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.th.min.js"></script>

  <!--start export png -->
  <script src="../assets/js/html2canvas.min.js"></script>
  <script src="../assets/js/capture.js"></script>
  <!--end export png -->


  <script>
    $(document).ready(function() {
      var barGraph1, barGraph2;
      var date = "";
      createChartBar1(date);
      createChartBar2(date);
    });

    // create chart
    // createChartBar1
    async function createChartBar1(date) {
      let result;
      try {
        data = await $.ajax({
          url: '../api/GetBioListData.php',
          type: 'POST',
          data: {
            'date': date
          }
        });

        if (data.length === 0) {
          window.alert("ไม่มีข้อมูลสำหรับวันดังกล่าว")

        } else {
          let inspector = [];
          let name = [];

          for (let i in data) {
            inspector.push(data[i].inspectorNumberSum)
            name.push(data[i].name)
          }

          let chartdata = {
            labels: name,
            datasets: [{
              label: 'inspector',
              backgroundColor: [
                "#fff",

              ],
              borderColor: '#46d5f1',
              hoverBackgroundColor: '#CCCCCC',
              hoverBorderColor: '#666666',
              data: inspector
            }]
          };
          var graphTarget = $('#graphCanvasBar1');
          barGraph1 = new Chart(graphTarget, {
            type: 'bar',
            data: chartdata,
            options: {
              indexAxis: 'y',
              plugins: {
                legend: {
                  display: false,
                }
              },
              scales: {
                y: {
                  grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                  },
                  ticks: {
                    display: true,
                    padding: 10,
                    color: '#000 ',
                    font: {
                      size: 11,
                      family: "Open Sans",
                      style: 'normal',
                    },
                  }
                },
                x: {
                  grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5]
                  },
                  ticks: {
                    display: true,
                    color: '#000 ',
                    padding: 20,
                    font: {
                      size: 11,
                      family: "Open Sans",
                      style: 'normal',
                    },
                  }
                },
              },
            },
            plugins: [pluginBarChart_1]
          })
        }
      } catch (error) {
        console.error(error);
      }
    }


    // createChartBar2
    async function createChartBar2(date) {
      let result;
      try {
        data = await $.ajax({
          url: '../api/GetBioListByProvinceData.php',
          type: 'POST',
          data: {
            'date': date
          }
        });

        // console.log(data);
        if (data.length === 0) {
          window.alert("ไม่มีข้อมูลสำหรับวันดังกล่าว")

        } else {
          let province3 = [];
          let inspector3 = [];

          for (let i in data) {
            province3.push(data[i].province)
            inspector3.push(data[i].inspectorNumberSum)
          }

          let chartdata = {
            labels: province3,
            datasets: [{
              label: 'inspector',
              backgroundColor: '#fff',
              borderColor: '#46d5f1',
              hoverBackgroundColor: '#CCCCCC',
              hoverBorderColor: '#666666',
              data: inspector3
            }]
          };
          var graphTarget = $('#graphCanvasBar2');
          barGraph2 = new Chart(graphTarget, {
            type: 'bar',
            data: chartdata,
            options: {
              indexAxis: 'y',
              plugins: {
                legend: {
                  display: false,
                }
              },
              scales: {
                y: {
                  grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                  },
                  ticks: {
                    display: true,
                    padding: 10,
                    color: '#000',
                    font: {
                      size: 11,
                      family: "Open Sans",
                      style: 'normal',
                      // lineHeight: 2
                    },
                  }
                },
                x: {
                  grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5]
                  },
                  ticks: {
                    display: true,
                    color: '#000',
                    padding: 20,
                    font: {
                      size: 11,
                      family: "Open Sans",
                      style: 'normal',
                      // lineHeight: 2
                    },
                  }
                },
              },
            },
            plugins: [pluginBarChart_2]
          })
        }
      } catch (error) {
        console.error(error);
      }
    }


    // filter date
    function filterDate1(date) {
      date = date.split('/').reverse().join('/');
      barGraph1.destroy();
      createChartBar1(date)
    }

    function filterDate2(date) {
      date = date.split('/').reverse().join('/');
      barGraph2.destroy();
      createChartBar2(date)
    }

    // plugin chart

    const pluginBarChart_1 = {
      id: 'custom_canvas_background_color',
      beforeDraw: (chart) => {
        const ctx = chart.canvas.getContext('2d');
        ctx.save();
        ctx.globalCompositeOperation = 'destination-over';
        ctx.fillStyle = '#8dc179';
        ctx.fillRect(0, 0, chart.width, chart.height);
        ctx.restore();
      }
    };

    const pluginBarChart_2 = {
      id: 'custom_canvas_background_color',
      beforeDraw: (chart) => {
        const ctx = chart.canvas.getContext('2d');
        ctx.save();
        ctx.globalCompositeOperation = 'destination-over';
        ctx.fillStyle = '#8dc179';
        ctx.fillRect(0, 0, chart.width, chart.height);
        ctx.restore();
      }
    };

    // diable keyboard input date

    $(function() {
      $('.datepicker1')
        // datepicker setting
        .datepicker({
          language: 'th',
          format: "dd/mm/yyyy",
          endDate: "0d",
          clearBtn: true,
          todayHighlight: true
        })
        // disable keyboard input
        .keypress(function(event) {
          event.preventDefault();
          return false;
        });
      $('.datepicker2')
        // datepicker setting
        .datepicker({
          language: 'th',
          format: "dd/mm/yyyy",
          endDate: "0d",
          clearBtn: true,
          todayHighlight: true
        })
        // disable keyboard input
        .keypress(function(event) {
          event.preventDefault();
          return false;
        })


    });
  </script>
</body>

</html>