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
        }

        :root {
            --pink: #d99eae;
            --pink-dark: #b96f87;
            --pink-light: #fff3f6;
            --pink-soft: #fbe4eb;
            --text: #45363c;
            --muted: #85747b;
            --white: #ffffff;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #fffafb;
            color: var(--text);
            line-height: 1.7;
        }

        a {
            text-decoration: none;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 8%;
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid #f3e4e9;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: var(--pink-soft);
            color: var(--pink-dark);
            font-size: 22px;
            font-weight: bold;
        }

        .brand-name {
            font-size: 23px;
            font-weight: 800;
            letter-spacing: 2px;
            color: var(--pink-dark);
        }

        .brand-desc {
            font-size: 11px;
            color: var(--muted);
            margin-top: -5px;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn {
            display: inline-block;
            padding: 10px 22px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            transition: 0.2s;
            cursor: pointer;
        }

        .btn-outline {
            border: 1px solid var(--pink);
            color: var(--pink-dark);
            background: white;
        }

        .btn-primary {
            background: var(--pink-dark);
            color: white;
            border: 1px solid var(--pink-dark);
        }

        .btn:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .hero {
            padding: 85px 8% 75px;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            align-items: center;
            gap: 55px;
            background:
                radial-gradient(circle at 85% 20%, #fbe4eb 0, transparent 30%),
                linear-gradient(135deg, #fffafb, #fff3f6);
        }

        .eyebrow {
            display: inline-block;
            background: #fbe4eb;
            color: #a85f78;
            border-radius: 30px;
            padding: 7px 15px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: clamp(34px, 4.5vw, 55px);
            line-height: 1.2;
            margin-bottom: 20px;
            letter-spacing: -1.5px;
        }

        .hero h1 span {
            color: var(--pink-dark);
        }

        .hero p {
            color: var(--muted);
            max-width: 540px;
            font-size: 15px;
            margin-bottom: 28px;
        }

        .hero-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .hero-visual {
            background: white;
            padding: 30px;
            border-radius: 25px;
            border: 1px solid #f4dfe6;
            box-shadow: 0 20px 55px rgba(166, 100, 123, 0.10);
        }

        .visual-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f4e8ec;
        }

        .visual-symbol {
            width: 48px;
            height: 48px;
            border-radius: 15px;
            background: var(--pink-light);
            display: grid;
            place-items: center;
            font-size: 25px;
        }

        .visual-header h3 {
            font-size: 17px;
        }

        .visual-header p {
            font-size: 12px;
            margin: 0;
        }

        .visual-content {
            padding-top: 20px;
        }

        .visual-content h4 {
            font-size: 15px;
            margin-bottom: 15px;
        }

        .feature-row {
            display: flex;
            gap: 13px;
            align-items: flex-start;
            padding: 13px;
            margin-bottom: 11px;
            background: #fffafb;
            border: 1px solid #f7e9ee;
            border-radius: 13px;
        }

        .feature-icon {
            font-size: 21px;
        }

        .feature-row strong {
            display: block;
            font-size: 13px;
        }

        .feature-row small {
            display: block;
            font-size: 11px;
            color: var(--muted);
        }

        .section {
            padding: 75px 8%;
        }

        .section-heading {
            text-align: center;
            max-width: 650px;
            margin: 0 auto 40px;
        }

        .section-heading h2 {
            font-size: clamp(25px, 3vw, 34px);
            margin-bottom: 12px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 14px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .card {
            background: white;
            border: 1px solid #f2e2e8;
            border-radius: 19px;
            padding: 27px;
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(166, 100, 123, 0.08);
        }

        .card-icon {
            width: 52px;
            height: 52px;
            display: grid;
            place-items: center;
            border-radius: 16px;
            background: var(--pink-light);
            font-size: 25px;
            margin-bottom: 18px;
        }

        .card h3 {
            font-size: 17px;
            margin-bottom: 9px;
        }

        .card p {
            font-size: 13px;
            color: var(--muted);
        }

        .steps-section {
            background: #fff3f6;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 25px;
        }

        .step {
            text-align: center;
            padding: 15px;
        }

        .step-number {
            width: 47px;
            height: 47px;
            margin: 0 auto 16px;
            display: grid;
            place-items: center;
            background: var(--pink-dark);
            color: white;
            border-radius: 50%;
            font-weight: bold;
            font-size: 18px;
        }

        .step h3 {
            font-size: 16px;
            margin-bottom: 8px;
        }

        .step p {
            font-size: 13px;
            color: var(--muted);
        }

        .cta {
            margin: 70px 8%;
            padding: 45px 25px;
            text-align: center;
            background: linear-gradient(135deg, #fbe4eb, #fff3f6);
            border: 1px solid #f1d9e2;
            border-radius: 24px;
        }

        .cta h2 {
            font-size: clamp(24px, 3vw, 32px);
            margin-bottom: 12px;
        }

        .cta p {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 24px;
        }

        footer {
            text-align: center;
            padding: 25px 8%;
            background: white;
            border-top: 1px solid #f3e4e9;
            color: var(--muted);
            font-size: 12px;
        }

        @media (max-width: 800px) {
            .navbar {
                padding: 15px 5%;
            }

            .brand-name {
                font-size: 20px;
            }

            .brand-desc {
                font-size: 9px;
            }

            .brand-icon {
                width: 38px;
                height: 38px;
            }

            .nav-actions {
                gap: 7px;
            }

            .btn {
                padding: 9px 13px;
                font-size: 12px;
            }

            .hero {
                grid-template-columns: 1fr;
                padding: 55px 6%;
                gap: 35px;
            }

            .hero-visual {
                max-width: 500px;
                width: 100%;
                margin: 0 auto;
                padding: 22px;
            }

            .section {
                padding: 55px 6%;
            }

            .cards {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .card {
                padding: 23px;
            }

            .steps {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .cta {
                margin: 45px 6%;
                padding: 35px 20px;
            }
        }

        @media (max-width: 380px) {
            .brand-desc {
                display: none;
            }

            .brand-name {
                font-size: 18px;
            }

            .nav-actions {
                gap: 5px;
            }

            .btn {
                padding: 8px 10px;
                font-size: 11px;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <a href="{{ url('/') }}" class="brand">
            <div class="brand-icon">S</div>
            <div>
                <div class="brand-name">SAPA</div>
                <div class="brand-desc">Aspirasi dan Pengaduan Akademik</div>
            </div>
        </a>

        <div class="nav-actions">
            <a href="{{ route('login') }}" class="btn btn-outline">
                Login
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-primary">
                    Daftar Akun
                </a>
            @endif
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <div class="eyebrow">
                    SISTEM ASPIRASI SEKOLAH
                </div>

                <h1>
                    Suaramu Berarti,<br>
                    <span>Perubahan Dimulai di Sini.</span>
                </h1>

                <p>
                    SAPA adalah Sistem Aspirasi dan Pengaduan Akademik
                    berbasis web yang membantu siswa menyampaikan aspirasi
                    dan pengaduan mengenai pembelajaran, fasilitas, serta
                    pelayanan sekolah secara lebih terarah.
                </p>

                <div class="hero-buttons">
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        Mulai Sampaikan Aspirasi &rarr;
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline">
                            Buat Akun
                        </a>
                    @endif
                </div>
            </div>

            <div class="hero-visual">
                <div class="visual-header">
                    <div class="visual-symbol">💗</div>
                    <div>
                        <h3>Selamat Datang di SAPA</h3>
                        <p>Ruang aspirasi warga sekolah</p>
                    </div>
                </div>

                <div class="visual-content">
                    <h4>Apa yang bisa kamu sampaikan?</h4>

                    <div class="feature-row">
                        <div class="feature-icon">📚</div>
                        <div>
                            <strong>Pembelajaran</strong>
                            <small>Aspirasi dan kendala kegiatan belajar.</small>
                        </div>
                    </div>

                    <div class="feature-row">
                        <div class="feature-icon">🏫</div>
                        <div>
                            <strong>Fasilitas Sekolah</strong>
                            <small>Masukan mengenai sarana dan prasarana.</small>
                        </div>
                    </div>

                    <div class="feature-row">
                        <div class="feature-icon">🤝</div>
                        <div>
                            <strong>Pelayanan Sekolah</strong>
                            <small>Saran untuk meningkatkan pelayanan.</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="section-heading">
                <h2>Satu Tempat untuk Menyampaikan Aspirasi</h2>
                <p>
                    SAPA membantu aspirasi sekolah tercatat dan dapat
                    ditindaklanjuti oleh pihak yang berwenang.
                </p>
            </div>

            <div class="cards">
                <div class="card">
                    <div class="card-icon">📝</div>
                    <h3>Sampaikan Pengaduan</h3>
                    <p>
                        Tulis judul, kategori, dan isi pengaduan
                        sesuai dengan hal yang ingin disampaikan.
                    </p>
                </div>

                <div class="card">
                    <div class="card-icon">🔎</div>
                    <h3>Pantau Status</h3>
                    <p>
                        Lihat perkembangan pengaduan melalui status
                        yang tersedia di sistem.
                    </p>
                </div>

                <div class="card">
                    <div class="card-icon">📋</div>
                    <h3>Tindak Lanjut</h3>
                    <p>
                        Pengaduan dapat ditinjau dan ditindaklanjuti
                        oleh petugas sesuai dengan kewenangannya.
                    </p>
                </div>
            </div>
        </section>

        <section class="section steps-section">
            <div class="section-heading">
                <h2>Bagaimana Cara Menggunakan SAPA?</h2>
                <p>
                    Ikuti langkah sederhana berikut untuk menyampaikan
                    aspirasi melalui sistem.
                </p>
            </div>

            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Login ke Akun</h3>
                    <p>
                        Masuk menggunakan akun siswa yang telah terdaftar.
                    </p>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Kirim Pengaduan</h3>
                    <p>
                        Isi informasi pengaduan dengan jelas dan sesuai kategori.
                    </p>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Pantau Perkembangan</h3>
                    <p>
                        Periksa status dan tindak lanjut pengaduan melalui akunmu.
                    </p>
                </div>
            </div>
        </section>

        <section class="cta">
            <h2>Ayo, Sampaikan Aspirasi dengan SAPA</h2>
            <p>
                Bersama-sama membangun lingkungan sekolah yang lebih baik.
            </p>

            <a href="{{ route('login') }}" class="btn btn-primary">
                Masuk ke SAPA &rarr;
            </a>
        </section>
    </main>

    <footer>
        <p>
            &copy; {{ date('Y') }} SAPA — Sistem Aspirasi dan Pengaduan Akademik
        </p>
        <p>SMK Budi Bakti Ciwidey</p>
    </footer>

</body>
</html>
