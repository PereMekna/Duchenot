<section id="concerts">
  <div class="container">
    <div class="row">
      <div class="center col l12 s12 m12">
        <h1>Prochains concerts</h1>
      </div>
    </div>
    <div class="row">
      <?php foreach ($prog as $artiste) { ?>
              <div class="col s12 m12 l6">
                  <div class="card">
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
                      <span class="card-title activator grey-text text-darken-4"><?php echo $artiste['NOM'].', le '.date("d/m/Y ", strtotime($artiste['DATE_CONCERT'])).' à '.$artiste['HOUR_CONCERT']; ?><i class="material-icons right">more_vert</i></span>
                      <p class="grey-text"><?php echo substr($artiste['DESCRIPTION'],0,strpos($artiste['DESCRIPTION'],' ',120)).' (...)'; ?></p>
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><?php echo $artiste['NOM']; ?><i class="material-icons right">close</i></span>
                      <p><?php echo $artiste['DESCRIPTION']; ?></p>
                    </div>
                  </div>
                </div>
      <?php } ?>
      </div>
    </div>
</section>