<!DOCTYPE html>
<html lang="en">
<head>
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
  <!-- Start Favicon-->
  <meta name="theme-color" content="#ffffff">
  <!-- End Favicon -->
  <!-- Start OEmbed -->
  <meta content="MMMMM" property="og:site_name">
  <meta content="MMMMM" property="og:title">
  <meta content="Mediocre Mapper Multi Mapper Manager" property="og:description">
  <meta content="#FF99B0" name="theme-color">
  <meta content="" property="og:image">
  <!-- End OEmbed -->
  <title>MMMMM</title>
  <link href="/resources/bulma.css" media="screen" rel="stylesheet">
  <link href="/resources/custom.css" rel="stylesheet">
  <link href="/resources/dropzone.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar has-shadow" aria-label="main navigation">
  <div class="container">
    <div class="navbar-brand">
      <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu"  aria-expanded="false">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
    <div class="navbar-menu" id="navMenu">
      <div class="navbar-start">
        <a class="navbar-item home" href="/">
          <i class="fas fa-home fa-2x"></i>
        </a>
        <a class="navbar-item upload modal-trigger" data-target="upload">
          <i class="fas fa-cloud-upload-alt fa-2x"></i>
        </a>
        <a class="navbar-item settings modal-trigger" data-target="settings">
          <i class="fas fa-cog fa-2x"></i>
        </a>
      </div>
      <div class="navbar-end">
      </div>
    </div>
  </div>
</nav>
<section class="container">
  <div class="art">
    <h2 class="title">Running Servers</h2>
    <div class="columns">
<?php
  echo shell_exec ( "./mmmmm --get" );
?>
    </div>
  </div>
</div>
<section class="container">
  <div class="manager">
    <div class="items">
    </div>
    <div class="modal" data-type="delete" id="delete-$index">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Delete $filename?</p>
          <button class="delete modal-x" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
          <p class="has-text-centered">
            <figure class="image">
              <img src="/$dir$file" data-id="$index" alt="$filename" title="$filename">
            </figure>
          </p>
        </section>
        <footer class="modal-card-foot">
          <button data-target="$dir$file" class="button is-danger">Delete</button>
          <button class="button cancel">Cancel</button>
        </footer>
      </div>
    </div>
    <div class="modal" data-type="upload" id="upload">
      <form action="upload.php" method="POST" id="zipUpload" enctype="multipart/form-data">
        <div class="modal-background"></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Upload Songe</p>
            <a class="delete modal-x" aria-label="close"></a>
          </header>
          <section class="modal-card-body">
              <div class="file is-fullwidth has-name">
                <label class="file-label">
                  <input class="file-input" type="file" accept=".zip" name="zipFile" form="zipUpload" required>
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                      Where is songe??
                    </span>
                  </span>
                  <span class="file-name">
                    zip
                  </span>
                </label>
              </div>
          </section>
          <footer class="modal-card-foot">
            <div class="field is-fullwidth has-addons has-addons-centered">
              <p class="control">
                <span class="select">
                  <select form="zipUpload" name="difficulty" autocomplete="off" required>
                    <option value="" name="default" disabled hidden selected>Difficulty</option>
                    <option value="Easy">Easy</option>
                    <option value="Normal">Normal</option>
                    <option value="Hard">Hard</option>
                    <option value="Expert">Expert</option>
                    <option value="ExpertPlus">ExpertPlus</option>
                  </select>
                </span>
              </p>
              <p class="control is-expanded">
                <input class="input" name="password" form="zipUpload" type="text" placeholder="Password (Optional)">
              </p>
              <p class="control">
                <button class="button is-primary" type="submit" name="submit" form="zipUpload">
                  Deploy MMMM Server
                </button>
              </p>
            </div>
          </footer>
        </div>
      </form> 
    </div>
    <div class="modal" data-type="settings" id="settings">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">Settings</p>
          <button class="delete modal-x" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
<?php
echo shell_exec ( "./mmmmm --get-list" );
?>
        </section>
        <footer class="modal-card-foot">
          <button class="button cancel">Close</button>
        </footer>
      </div>
    </div>
  </div> 
</section>
<script src="/resources/modal.js"></script>
</body>
</html>