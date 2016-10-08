<div class="container-fluid">


<section id="about" class="section-content about">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <figure class="fig-profile wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
          <img class="img-responsive img-circle img-profile" src="<?php echo $imagen; ?>">
        </figure>
        <h2 class="name"><b><?php echo $nombre; ?></b> Locutor</</h2>
      </div>
      <div class="col-md-8 col-md-offset-2 text-center">
        <h2 class="slogan"><b>ID transmisión:</b> RLX<?php echo $token; ?></h2>
      </div>
    </div>
</section>

</div>


<style>
.about {
  background: url(http://rolyart.ro/wp-content/uploads/2016/07/bg.png) no-repeat top center;
  background-size: cover;
  background-color: rgba(255, 255, 255, 0.2);
  text-align: center;
  padding: 50px 0;
  min-height:100%;
  border-top:1px solid #ddd;
  border-bottom:1px solid #ddd;
}
.about .fig-profile {
  max-width: 200px;
  max-height: 200px;
  margin: 0 auto 0;
  position: relative;
  overflow: hidden !important;
  border: 12px solid #fff;
  border-radius: 50%;
  margin-bottom: 30px;
}
.about .name {
  font-size: 1.3em;
  text-transform: uppercase;
  margin: 20px 0 0 0;
}
.about .slogan {
  margin-bottom: 40px;
  margin-top: 40px;
}
.about p {
  font-size: 16px;
}
</style>