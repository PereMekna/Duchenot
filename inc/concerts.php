<section id="concerts" class="light-green lighten-2">
  <div class="container">
    <div class="row">
      <div class="center col l12 s12 m12">
        <h1>Prochains concerts</h1>
      </div>
    </div>
    <div class="row">
      <?php foreach ($prog as $artiste) { ?>
              <div class="col s12 m12 l6">
                  <div class="card sticky-action">
                    <div class="card-image">
                      <?php 
                      if (!empty($artiste['VIDEO_URL'])) {
                        echo '<div class="video-container">
                        <iframe width="420" height="315" src="'.$artiste['VIDEO_URL'].'" frameborder="0" allowfullscreen></iframe>
                      </div>';
                      }
                      else echo '<img src="'.$artiste['IMG_URL'].'" />';
                      ?>
                      
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4"><?php echo date("d/m/Y ", strtotime($artiste['DATE_CONCERT'])).' : '.$artiste['NOM']; ?><i class="material-icons right">more_vert</i></span>
                      <p class="grey-text"><?php echo substr($artiste['DESCRIPTION'],0,strpos($artiste['DESCRIPTION'],' ',100)).' (...)'; ?></p>
                    </div>
                    <div class="card-action grey lighten-2">
                      <a href="#"><img width="32px" src="facebook.png" /></a>
                    </div>
                    <div class="card-reveal grey lighten-3">
                      <span class="card-title grey-text text-darken-4"><?php echo $artiste['NOM']; ?><i class="material-icons right">close</i></span>
                      <p><?php echo $artiste['DESCRIPTION']; ?></p>
                      <span class="card-title"><?php echo date("d/m/Y ", strtotime($artiste['DATE_CONCERT'])).' à '.$artiste['HOUR_CONCERT']; ?></span>
                    </div>
                  </div>
                </div>
      <?php } ?>
      </div>
    </div>
</section>