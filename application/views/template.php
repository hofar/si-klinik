<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>{title}</title>

    <link rel="icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="<?= site_url('/assets/css/sidebars.css'); ?>" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .anychart-credits {
            display: none;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-nowrap">
        <div class="sidebars flex-shrink-0 p-3 col-3">
            <a href="<?= site_url('dashboard'); ?>" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
                <i class="bi bi-file-earmark-medical pe-none me-2" width="30" height="24"></i>
                <span class="fs-5 fw-semibold">Si Klinik</span>
            </a>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button type="button" class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                        Dashboard
                    </button>
                    <div class="collapse <?= in_array($this->uri->segment(1), array('dashboard')) ? 'show' : '' ?>" href="<?= site_url(); ?>" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="<?= site_url('dashboard'); ?>">
                                    <i class="bi bi-stars me-2"></i> Overview
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button type="button" class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        Master Data
                    </button>
                    <div class="collapse <?= in_array($this->uri->segment(1), array('dokter', 'pasien', 'obat', 'kunjungan')) ? 'show' : '' ?>" href="<?= site_url('users'); ?>" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="<?= site_url('dokter'); ?>">
                                    <i class="fas fa-user-md"></i> Dokter
                                </a>
                            </li>
                            <li>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="<?= site_url('pasien'); ?>">
                                    <i class="fa fa-user-injured"></i> Pasien
                                </a>
                            </li>
                            <li>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="<?= site_url('obat'); ?>">
                                    <i class="fas fa-pills"></i> Obat
                                </a>
                            </li>
                            <li>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="<?= site_url('kunjungan'); ?>">
                                    <i class="fas fa-book-medical"></i> Kunjungan
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button type="button" class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                        Report
                    </button>
                    <div class="collapse <?= in_array($this->uri->segment(1), array('laporan')) ? 'show' : '' ?>" href="<?= site_url('users'); ?>" id="orders-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="<?= site_url('laporan/dokter'); ?>" target="_report">
                                    <i class="fas fa-notes-medical"></i> Dokter
                                </a>
                            </li>
                            <li>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="<?= site_url('laporan/pasien'); ?>" target="_report">
                                    <i class="fas fa-notes-medical"></i> Pasien
                                </a>
                            </li>
                            <li>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="<?= site_url('laporan/obat'); ?>" target="_report">
                                    <i class="fas fa-notes-medical"></i> Obat
                                </a>
                            </li>
                            <li>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="<?= site_url('laporan/kunjungan'); ?>" target="_report">
                                    <i class="fas fa-notes-medical"></i> Kunjungan
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="border-top my-3"></li>
                <li class="mb-1">
                    <button type="button" class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                        Account
                    </button>
                    <div class="collapse <?= in_array($this->uri->segment(1), array('users')) ? 'show' : '' ?>" href="<?= site_url('users'); ?>" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="<?= site_url('users'); ?>">
                                    <i class="fas fa-users"></i> Overview
                                </a>
                            </li>
                            <li>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="<?= site_url('auth/logout'); ?>">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div id="content" class="col-md-9 ms-sm-auto px-md-4">
            <div class="container">
                {content}
            </div>
        </div>
    </div>

    <!-- ================================= -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="<?= site_url('/assets/js/sidebars.js'); ?>"></script>

    <script>
        (() => {
            "use strict"
            // tooltip
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

            // theme
            const getStoredTheme = () => localStorage.getItem("theme")
            const setStoredTheme = theme => localStorage.setItem("theme", theme)

            const getPreferredTheme = () => {
                const storedTheme = getStoredTheme()
                if (storedTheme) {
                    return storedTheme
                }

                return window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"
            }

            const setTheme = theme => {
                if (theme === "auto" && window.matchMedia("(prefers-color-scheme: dark)").matches) {
                    document.documentElement.setAttribute("data-bs-theme", "dark")
                } else {
                    document.documentElement.setAttribute("data-bs-theme", theme)
                }
            }

            setTheme(getPreferredTheme())

            const showActiveTheme = (theme, focus = false) => {
                const themeSwitcher = document.querySelector("#bd-theme")

                if (!themeSwitcher) {
                    return
                }

                const themeSwitcherText = document.querySelector("#bd-theme-text")
                const activeThemeIcon = document.querySelector(".theme-icon-active use")
                const btnToActive = document.querySelector('[data-bs-theme-value="${theme}"]')
                const svgOfActiveBtn = btnToActive.querySelector("svg use").getAttribute("href")

                document.querySelectorAll("[data-bs-theme-value]").forEach(element => {
                    element.classList.remove("active")
                    element.setAttribute("aria-pressed", "false")
                })

                btnToActive.classList.add("active")
                btnToActive.setAttribute("aria-pressed", "true")
                activeThemeIcon.setAttribute("href", svgOfActiveBtn)
                const themeSwitcherLabel = '${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})'
                themeSwitcher.setAttribute("aria-label", themeSwitcherLabel)

                if (focus) {
                    themeSwitcher.focus()
                }
            }

            window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", () => {
                const storedTheme = getStoredTheme()
                if (storedTheme !== "light" && storedTheme !== "dark") {
                    setTheme(getPreferredTheme())
                }
            })

            window.addEventListener("DOMContentLoaded", () => {
                showActiveTheme(getPreferredTheme())

                document.querySelectorAll("[data-bs-theme-value]").forEach(toggle => {
                    toggle.addEventListener("click", () => {
                        const theme = toggle.getAttribute("data-bs-theme-value")
                        setStoredTheme(theme)
                        setTheme(theme)
                        showActiveTheme(theme, true)
                    })
                })
            })
        })()
    </script>
</body>

</html>