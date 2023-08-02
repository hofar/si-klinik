<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kunjungan</title>

    <link rel="stylesheet" href="<?= site_url('assets/css/laporan.css') ?>">
</head>

<body>
    <div class="text-center mb-4">
        <h2 class="">Sistem Informasi Klinik</h2>
        <small class="">Jalan sehat</small>
        <h3 class=""><?= $title ?></h3>
    </div>
    <div class="">
        <h4>Grafik Kunjungan</h4>

        <div id="lineChartNetwork"><span class="loading">Loading...</span></div>
    </div>
    <div class="">
        <h4>Tabel Kunjungan</h4>

        <table class="bordered">
            <thead>
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Pasien</th>
                    <th>Umur</th>
                    <th>Kelamin</th>
                    <th>Keluhan</th>
                    <th>Diagnosa</th>
                    <th>Penatalaksanaan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($kunjungan as $u) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $u['tgl_berobat']; ?></td>
                        <td><?= $u['nama_pasien']; ?></td>
                        <td><?= $u['umur_pasien']; ?></td>
                        <td><?= $u['jk_pasien'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
                        <td><?= $u['keluhan']; ?></td>
                        <td><?= $u['diagnosa']; ?></td>
                        <td><?= $u['penatalaksaan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="wk-r">
        <table>
            <tbody>
                <tr>
                    <td>
                        <p>
                            Pemalang, <?= date_format(date_create(date('d-m-Y')), 'd M Y'); ?>
                            <?= str_repeat("<br/>", 1) ?>
                            <?= $this->session->userdata('username'); ?>
                            <?= str_repeat("<br/>", 3) ?>
                            ______________________
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="<?= site_url('assets/anychart/anychart_base.min.js') ?>"></script>
    <!-- Include the data adapter -->
    <script src="<?= site_url('assets/anychart/anychart_data_adapter.min.js') ?>"></script>

    <script>
        anychart.onDocumentReady(function() {
            let theme = "light";
            let title = "Jumlah Kunjungan per Tanggal";
            const lineChartNetwork = document.getElementById("lineChartNetwork");
            let background = {
                fill: {
                    keys: ["#fff", "#fff"],
                    angle: 90
                },
            };
            let colorCustom = "black";

            if (theme == "dark") {
                background.fill.keys = ["#212529", "#212529"];
                colorCustom = "white";
            }

            let column = anychart.column({
                xScroller: {
                    autoHide: true
                },
                yScroller: {
                    autoHide: true
                }
            });
            // ----------

            let printed = false;

            anychart.data.loadJsonFile('<?= site_url('/Kunjungan/chart_json') ?>', function(data) {
                // line chart
                var stage = anychart.graphics.create(lineChartNetwork, 600, "auto");
                let lineChart = anychart.line().container(stage).background(background).xGrid({
                    enabled: true,
                    stroke: {
                        color: colorCustom,
                        dash: "3 5"
                    },
                    palette: [null, "black 0.1"],
                }).yGrid({
                    enabled: true,
                    stroke: colorCustom
                }).yScale({
                    // maximum: 50,
                    ticks: {
                        interval: 5
                    }
                }).xAxis({
                    title: "Tanggal Berobat",
                    stroke: colorCustom,
                    labels: {
                        fontColor: colorCustom,
                        fontWeight: 900,
                        height: 50,
                        vAlign: "middle"
                    }
                }).tooltip({
                    titleFormat: "{%value}"
                });
                lineChart.draw(true).listen("chartDraw", () => {
                    lineChartNetwork.querySelector(".loading").style.display = "none";
                    if (!printed) {
                        window.print();

                        printed = true;
                    }
                });

                let series = lineChart.spline(data).stroke({
                    color: "#ff0000",
                    // dash: "4 3",
                    thickness: 3
                }).hovered({
                    stroke: {
                        color: "#555",
                        dash: "4 3",
                        thickness: 3
                    },
                    markers: {
                        fill: "darkred",
                        stroke: "2 white"
                    }
                }).name("dashed stroke").markers({
                    enabled: true,
                    fill: "#555",
                    stroke: "2 white",
                }).tooltip({
                    fontColor: "white",
                    background: {
                        fill: "#212529",
                        stroke: colorCustom,
                        cornerType: "round",
                        corners: 4,
                    }
                });
                series.tooltip().format(function() {
                    let value = data[this.index];
                    return value.name;
                });

                let yAxisB = lineChart.yAxis().ticks(null).stroke(colorCustom).minorTicks(null);
                yAxisB.title("Jumlah Kunjungan");
                yAxisB.labels({
                    fontColor: colorCustom,
                    fontWeight: 900,
                    // width: 50,
                    format: "{%value}"
                });

                let xAxisLabels = lineChart.xAxis().labels();
                xAxisLabels.format(function(param) {
                    let value = data[this.index].name;
                    return value;
                });
                xAxisLabels.width(100);
                xAxisLabels.rotation(0);
                xAxisLabels.wordWrap("break-word");
                xAxisLabels.wordBreak("break-all");
                // ----------
            });
        });
    </script>
</body>

</html>