<main id="main" class="main">
  <div class="pagetitle">
    <h1>Tambah User</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item active">Tambah User</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Tambah User</h5>

            <form action="<?= base_url('home/simpanUser') ?>" method="post">
              <div class="row mb-3">
                <label for="username" class="col-sm-4 col-form-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="username" name="username" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="level" class="col-sm-4 col-form-label">Level</label>
                <div class="col-sm-8">
                  <select class="form-select" id="level" name="level" required>
                    <option value="" disabled selected>Select Level</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('home/user') ?>" class="btn btn-secondary">Batal</a>
              </div>
            </form><!-- End Form Tambah User -->

          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->





<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Tambah User</h2>
    <form action="<?= base_url('home/simpanUser') ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select class="form-select" id="level" name="level" required>
                <option value="" disabled selected>Select Level</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('home/user') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

</body>
</html>
 -->