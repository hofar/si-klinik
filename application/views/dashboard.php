<main role="main" class="">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="mb-4 border-bottom">
        <h2 class="">
            Sistem Informasi Klinik
        </h2>
        <p class="">
            Selamat Datang <strong><?= $user['username']; ?>
        </p>
    </div>
    <div class="">
        <h4>Grafik Kunjungan</h4>

        <div id="lineChartNetwork"><span class="loading">Loading...</span></div>
    </div>
</main>


<script src="<?= site_url('assets/anychart/anychart_base.min.js') ?>"></script>
<!-- Include the data adapter -->
<script src="<?= site_url('assets/anychart/anychart_data_adapter.min.js') ?>"></script>

<script>
    anychart.onDocumentReady(function() {
        const getStoredTheme = () => localStorage.getItem("theme")
        const setStoredTheme = theme => localStorage.setItem("theme", theme)
        const getPreferredTheme = () => {
            const storedTheme = getStoredTheme()
            if (storedTheme) {
                return storedTheme
            }

            return window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"
        }
        let theme = getPreferredTheme() || "<?= $this->input->get("theme") ?>";
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