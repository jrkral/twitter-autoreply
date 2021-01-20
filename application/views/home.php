<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Twitter Auto Reply</title>

  <link rel="shortcut icon" href="<?= base_url('assets/img/twitter-logo.png'); ?>" type="image/x-icon">

  <link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/libs/fontawesome-free/css/all.min.css'); ?>" type="text/css" />
  <link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/'); ?>">
        <i class="fab fa-twitter"></i> Twitter Auto Reply
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('/'); ?>"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <?php
    if ($this->session->flashdata('result')) : ?>
      <div class="alert alert-dark" role="alert">
        <?= $this->session->flashdata('result'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card bg-dark text-light">
          <div class="card-header">
            <i class="fas fa-reply"></i> Auto Reply
          </div>
          <div class="card-body">
            <?= form_open(base_url('home/setup'), "method='post'"); ?>
            <div class="form-group">
              <label for="tweet">Tweet/Minute</label>
              <?= form_input(['class' => 'form-control', 'type' => 'number', 'name' => 'tweet', 'id' => 'tweet', 'placeholder' => '3', 'value' => $value->tweet, 'required' => true]); ?>
            </div>
            <div class="form-group">
              <label for="reply">Reply Tweet</label>
              <div class="input-group">
                <?= form_textarea(['class' => 'form-control', 'rows' => 4, 'name' => 'reply', 'id' => 'reply', 'placeholder' => 'Halo kak! aku jual apk premium nih.. legal, murah, dan trusted.', 'value' => json_decode($value->reply, true), 'required' => true]); ?>
              </div>
            </div>
            <?= form_submit('submit', 'Submit', ['class' => 'btn btn-light']); ?>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer fixed-bottom bg-dark">
    <div class="container text-center">
      <span class="text-white">Copyright 2020 <i class="far fa-copyright"></i> Made with <i class="fas fa-heart"></i> by <a href=" https://www.zacky.id" target="_blank" class="text-decoration-none text-white">Zacky Achmad</a></span>
      <!-- <span class="text-white">Copyright 2020 &copy; Zetbot Indonesia</span> -->
    </div>
  </footer>

  <script src="<?= base_url('assets/libs/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>