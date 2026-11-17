<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SAPA - Sistem Aspirasi dan Pengaduan Akademik</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f8f7ff;
            color: #38354d;
        }

        /* NAVBAR */
        .navbar {
            width: 100%;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.95);
            position: relative;
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand img {
            width: 52px;
            height: 52px;
            object-fit: contain;
        }

        .brand-text h2 {
            color: #7568bd;
            font-size: 22px;
        }

        .brand-text p {
            color: #999;
            font-size: 11px;
            margin-top: 2px;
        }

        .nav-buttons {
            display: flex;
            gap: 10px;
        }

        .nav-buttons a {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 12px;
            font-size: 14px;
            transition: 0.2s;
        }

        .btn-login {
            color: #7568bd;
            border: 1px solid #ddd7f5;
            background: white;
        }

        .btn-login:hover {
            background: #f0edff;
        }

        .btn-register {
            color: white;
            background: #8174c8;
        }

        .btn-register:hover {
            background: #7063b4;
        }

        /* HERO */
        .hero {
            min-height: 590px;
            padding: 70px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
            background:
                radial-gradient(circle at 90% 20%, #e7e2ff 0, transparent 28%),
                radial-gradient(circle at 10% 80%, #e4f0ff 0, transparent 28%),
                #f8f7ff;
        }

        .hero-text {
            width: 52%;
        }

        .badge {
            display: inline-block;
            background: #eeeaff;
            color: #7568bd;
            padding: 9px 16px;
            border-radius: 20px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .hero-text h1 {
            font-size: 48px;
            line-height: 1.15;
            color: #46415e;
            margin-bottom: 18px;
        }

        .hero-text h1 span {
            color: #8174c8;
        }

        .hero-text .tagline {
            font-size: 19px;
            color: #7568bd;
            font-weight: bold;
            margin-bottom: 14px;
        }

        .hero-text .description {
            color: #777;
            font-size: 15px;
            line-height: 1.8;
            max-width: 580px;
            margin-bottom: 28px;
        }

        .hero-buttons {
            display: flex;
            gap: 12px;
        }

        .hero-buttons a {
            text-decoration: none;
            padding: 13px 24px;
            border-radius: 13px;
            font-size: 14px;
            font-weight: bold;
        }

        .primary {
            background: #8174c8;
            color: white;
            box-shadow: 0 8px 20px rgba(129, 116, 200, 0.25);
        }

        .secondary {
            background: white;
            color: #7568bd;
            border: 1px solid #ddd7f5;
        }

        /* HERO CARD */
        .hero-illustration {
            width: 42%;
            display: flex;
            justify-content: center;
        }

        .illustration-card {
            width: 360px;
            height: 350px;
            background: white;
            border-radius: 30px;
            padding: 28px;
            box-shadow: 0 15px 45px rgba(70, 60, 120, 0.12);
            position: relative;
        }

        .illustration-circle {
            width: 210px;
            height: 210px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #eeeaff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .illustration-circle img {
            width: 130px;
            height: 130px;
            object-fit: contain;
        }

        .mini-card {
            position: absolute;
            background: white;
            border-radius: 12px;
            padding: 12px 15px;
            box-shadow: 0 7px 20px rgba(80, 70, 120, 0.12);
            font-size: 12px;
        }

        .mini-one {
            top: 35px;
            right: -30px;
            color: #7568bd;
        }

        .mini-two {
            bottom: 35px;
            left: -30px;
            color: #6685b5;
        }

        .illustration-title {
            text-align: center;
            color: #5b5576;
            font-weight: bold;
            font-size: 16px;
        }

        .illustration-subtitle {
            text-align: center;
            color: #aaa;
            font-size: 12px;
            margin-top: 5px;
        }

        /* FEATURES */
        .features {
            padding: 70px 7%;
            background: white;
            text-align: center;
        }

        .section-title {
            font-size: 30px;
            color: #4b4663;
            margin-bottom: 10px;
        }

        .section-description {
            color: #999;
            font-size: 14px;
            margin-bottom: 40px;
        }

        .feature-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            max-width: 1050px;
            margin: auto;
        }

        .feature-card {
            padding: 28px 22px;
            border-radius: 20px;
            background: #faf9ff;
            border: 1px solid #eeeaff;
            transition: 0.2s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(80, 70, 120, 0.08);
        }

        .feature-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 17px;
            border-radius: 17px;
            background: #eeeaff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 25px;
        }

        .feature-card h3 {
            font-size: 17px;
            color: #55506f;
            margin-bottom: 9px;
        }

        .feature-card p {
            color: #999;
            font-size: 13px;
            line-height: 1.6;
        }

        /* ABOUT */
        .about {
            padding: 70px 7%;
            background: #f8f7ff;
        }

        .about-container {
            max-width: 1050px;
            margin: auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .about-text h2 {
            font-size: 30px;
            color: #4b4663;
            margin-bottom: 18px;
        }

        .about-text p {
            color: #777;
            line-height: 1.8;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .about-box {
            background: white;
            border-radius: 22px;
            padding: 28px;
            box-shadow: 0 10px 30px rgba(80, 70, 120, 0.07);
        }

        .about-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .about-item:last-child {
            margin-bottom: 0;
        }

        .about-number {
            min-width: 35px;
            height: 35px;
            border-radius: 11px;
            background: #eeeaff;
            color: #7568bd;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        .about-item h4 {
            color: #57516f;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .about-item p {
            color: #999;
            font-size: 12px;
            line-height: 1.5;
        }

        /* CTA */
        .cta {
            padding: 65px 7%;
            background: white;
            text-align: center;
        }

        .cta-box {
            max-width: 950px;
            margin: auto;
            padding: 45px 30px;
            border-radius: 25px;
            background: #eeeaff;
        }

        .cta-box h2 {
            color: #4f496c;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .cta-box p {
            color: #888;
            font-size: 14px;
            margin-bottom: 23px;
        }

        .cta-box a {
            display: inline-block;
            text-decoration: none;
            background: #8174c8;
            color: white;
            padding: 13px 25px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: bold;
        }

        /* FOOTER */
        footer {
            background: #4f496c;
            color: white;
            text-align: center;
            padding: 25px 7%;
        }

        footer h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        footer p {
            font-size: 12px;
            color: #d8d5e5;
        }

        /* RESPONSIVE */
        @media (max-width: 850px) {

            .hero {
                flex-direction: column;
                text-align: center;
                padding-top: 50px;
            }

            .hero-text,
            .hero-illustration {
                width: 100%;
            }

            .hero-text h1 {
                font-size: 38px;
            }

            .description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .feature-container {
                grid-template-columns: 1fr;
            }

            .about-container {
                grid-template-columns: 1fr;
            }

            .hero-illustration {
                margin-top: 20px;
            }
        }

        @media (max-width: 550px) {

            .navbar {
                padding: 15px 5%;
            }

            .brand-text p {
                display: none;
            }

            .nav-buttons a {
                padding: 9px 13px;
                font-size: 12px;
            }

            .hero {
                padding-left: 5%;
                padding-right: 5%;
            }

            .hero-text h1 {
                font-size: 32px;
            }

            .hero-text .tagline {
                font-size: 16px;
            }

            .illustration-card {
                width: 300px;
                height: 320px;
            }

            .mini-one {
                right: -5px;
            }

            .mini-two {
                left: -5px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="brand">

            <img src="{{ asset('images/logo-sapa.jpeg') }}" alt="Logo SAPA">

            <div class="brand-text">
                <h2>SAPA</h2>
                <p>SMK Budi Bakti Ciwidey</p>
            </div>

        </div>

        <div class="nav-buttons">

            <a href="{{ route('login') }}" class="btn-login">
                Login
            </a>

            <a href="{{ route('register') }}" class="btn-register">
                Daftar
            </a>

        </div>

    </nav>


    <!-- HERO -->
    <section class="hero">

        <div class="hero-text">

            <span class="badge">
                Sistem Informasi Sekolah
            </span>

            <h1>
                Sampaikan Aspirasi,
                <span>Wujudkan Solusi.</span>
            </h1>

            <p class="tagline">
                SAPA — Sistem Aspirasi dan Pengaduan Akademik
            </p>

            <p class="description">
                SAPA merupakan sistem berbasis web yang membantu siswa
                menyampaikan aspirasi dan pengaduan terkait kegiatan
                pembelajaran, fasilitas, dan pelayanan sekolah secara
                lebih mudah, terstruktur, dan transparan.
            </p>

            <div class="hero-buttons">

                <a href="{{ route('login') }}" class="primary">
                    Mulai Sekarang →
                </a>

                <a href="#tentang" class="secondary">
                    Tentang SAPA
                </a>

            </div>

        </div>


        <div class="hero-illustration">

            <div class="illustration-card">

                <div class="illustration-circle">

                    <img
                        src="{{ asset('images/logo-sapa.jpeg') }}"
                        alt="Logo SAPA"
                    >

                </div>

                <div class="illustration-title">
                    Aspirasi & Pengaduan
                </div>

                <div class="illustration-subtitle">
                    SMK Budi Bakti Ciwidey
                </div>

                <div class="mini-card mini-one">
                    ✓ Terstruktur
                </div>

                <div class="mini-card mini-two">
                    💬 Mudah Disampaikan
                </div>

            </div>

        </div>

    </section>


    <!-- FITUR -->
    <section class="features">

        <h2 class="section-title">
            Kenapa Menggunakan SAPA?
        </h2>

        <p class="section-description">
            Memudahkan proses penyampaian dan pengelolaan pengaduan sekolah.
        </p>


        <div class="feature-container">

            <div class="feature-card">

                <div class="feature-icon">
                    📝
                </div>

                <h3>
                    Mudah Menyampaikan
                </h3>

                <p>
                    Siswa dapat menyampaikan aspirasi dan pengaduan
                    melalui formulir yang sederhana dan mudah digunakan.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    🎫
                </div>

                <h3>
                    Nomor Tiket
                </h3>

                <p>
                    Setiap pengaduan memiliki nomor tiket sehingga
                    proses pengaduan dapat dipantau dengan lebih terstruktur.
                </p>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    📊
                </div>

                <h3>
                    Monitoring
                </h3>

                <p>
                    Guru, Wakasek, dan Kepala Sekolah dapat memantau
                    perkembangan pengaduan sesuai dengan hak aksesnya.
                </p>

            </div>

        </div>

    </section>


    <!-- TENTANG -->
    <section class="about" id="tentang">

        <div class="about-container">

            <div class="about-text">

                <h2>
                    Tentang SAPA
                </h2>

                <p>
                    SAPA dirancang sebagai media penyampaian aspirasi dan
                    pengaduan siswa di SMK Budi Bakti Ciwidey.
                </p>

                <p>
                    Sistem ini membantu sekolah mengelola pengaduan secara
                    lebih terstruktur mulai dari pengiriman, pemrosesan,
                    pemberian tanggapan, hingga penyelesaian.
                </p>

            </div>


            <div class="about-box">

                <div class="about-item">

                    <div class="about-number">
                        1
                    </div>

                    <div>
                        <h4>
                            Siswa
                        </h4>

                        <p>
                            Menyampaikan aspirasi atau pengaduan dan
                            memantau statusnya.
                        </p>
                    </div>

                </div>


                <div class="about-item">

                    <div class="about-number">
                        2
                    </div>

                    <div>
                        <h4>
                            Guru/Admin
                        </h4>

                        <p>
                            Memeriksa, memproses, memberikan tanggapan,
                            dan menyelesaikan pengaduan.
                        </p>
                    </div>

                </div>


                <div class="about-item">

                    <div class="about-number">
                        3
                    </div>

                    <div>
                        <h4>
                            Wakasek & Kepala Sekolah
                        </h4>

                        <p>
                            Memantau pengaduan dan melihat informasi
                            serta rekapitulasi pengaduan.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- CTA -->
    <section class="cta">

        <div class="cta-box">

            <h2>
                Punya Aspirasi atau Pengaduan?
            </h2>

            <p>
                Sampaikan melalui SAPA dan bantu wujudkan lingkungan
                sekolah yang lebih baik.
            </p>

            <a href="{{ route('login') }}">
                Sampaikan Sekarang →
            </a>

        </div>

    </section>


    <!-- FOOTER -->
    <footer>

        <h3>
            SAPA
        </h3>

        <p>
            Sistem Aspirasi dan Pengaduan Akademik
        </p>

        <p style="margin-top: 8px;">
            © {{ date('Y') }} SMK Budi Bakti Ciwidey
        </p>

    </footer>

</body>
</html>
