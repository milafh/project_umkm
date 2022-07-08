<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Foodie Indonesia</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url('public/user_assets/css/styles.css') ?>" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="#page-top">Foodie</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <?php if(!empty($has_login)){ ?>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="#!">Hi <?= $has_login->username ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/user/logout') ?>">Logout</a></li>
                        </ul>
                    <?php }else{ ?>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('home/register') ?>">Sign Up</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('home/login') ?>">Log In</a></li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="masthead text-center text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Foodie</h1>
                    <h2 class="masthead-subheading mb-0">Good Food for Good Mood</h2>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>
        <!-- Content section 1-->
        <!-- <div class="col-md-12">
            <?= $this->session->flashdata("mess") ?>
        </div>
        <section id="scroll">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid" src="<?= base_url('public/user_assets/assets/img/umkm1.jpg') ?>" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">UMKM adalah...</h2>
                            <p>Usaha produktif yang dimiliki perorangan maupun badan usaha yang telah memenuhi kriteria sebagai usaha mikro.
                                Secara lebih jelas, pengertian UMKM diatur dalam Undang-Undang Republik Indonesia No. 20 Tahun 2008 tentang UMKM. Dalam UU tersebut disebutkan bahwa 
                                UMKM adalah sesuai dengan jenis usahanya yakni usaha mikro, usaha kecil dan usaha menengah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Content section 2-->
        <!-- <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5"><img class="img-fluid" src="<?= base_url('public/user_assets/assets/img/umkm2.jpg') ?>" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Tujuan Dibuatnya Website Ini...</h2>
                            <p>Sebagai upaya meningkatkan kemampuan usaha dan pemasaran produk usaha mikro kecil menengah (UMKM)
                                dan diharapkan dapat membeli produk UMKM melalui website serta e-katalog dan laman UMKM untuk pengadaan barang/jasa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Content section 3-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-12 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Our Product</h2>
                        </div>
                        <div class="row">
                            <?php foreach($produk as $key => $val): ?>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <img class="img-fluid order-product" src="<?= base_url('public/produk/'.$val->foto) ?>" alt="..." />
                                    <label for="" class="display-4"><?= $val->nama ?></label>
                                    <p><?= $val->deskripsi ?>.<br> 
                                        click 
                                        <?php if(!empty($has_login)){ ?>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal-<?= $val->id ?>">here</a> 
                                        <?php }else{ ?>
                                            <a href="<?= base_url('home/login') ?>">here</a> 
                                        <?php } ?>
                                        to order
                                    </p>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal-<?= $val->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="<?= base_url('welcome/order') ?>" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Order Product <?= $val->nama ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="produk_id" value="<?= $val->id ?>">
                                                <label for="">Jumlah</label>
                                                <input type="number" name="jumlah" placeholder="Masukan jumlah pesanan" class="form-control">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Order</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; Foodie | Produk Promosi UMKM 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url('public/user_assets/js/scripts.js') ?>"></script>
    </body>
</html>
