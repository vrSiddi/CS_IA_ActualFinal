<?php
    include_once 'header.php';
?>
  <title>Home</title>
  <main>
    <!--Carousel-->
    <h2 class = "m-2">About this website</h2>
    <div id="carouselExampleIndicators" class="carousel carousel-dark slide border mt-2 mb-4" data-bs-ride="carousel">
      <div class="carousel-indicators my-1 ">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>

      <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner text-center my-5">
            <div class="carousel-item active">
                <div class="d-flex h-100 align-items-center justify-content-center">
                    <h3>Welcome to this website</h3>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex h-100 align-items-center justify-content-center">
                    <h3>This website allows for the easy organization of a multitude of essays.</h3>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex h-100 align-items-center justify-content-center">
                    <h3>Store up to unlimited essays across unlimited colleges</h3>
                </div>
            </div>
        </div>
    </div>

      <button class="carousel-control-prev pe-4" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next ps-4" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>      
  

    <!--Buttons-->
    <div class="d-flex flex-row justify-content-center">
      <div class="card mx-5">
        <div class="card-body">
          <h4 class="card-title">My colleges</h4>
          <p class="card-text">Add more colleges and essays</p>
          <a href="colleges.php" class="btn btn-primary">Edit</a>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">My profile</h4>
          <p class="card-text">Edit Profile Information</p>
          <a href="profile.php" class="btn btn-primary">Access</a>
        </div>
      </div>
  </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  
</body>

</html>