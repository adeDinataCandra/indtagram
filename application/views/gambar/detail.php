<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<link rel = "stylesheet" type = "text/css" href ="<?php echo base_url('assets/css/vidio-js.css');?>">
<script src="<?php echo base_url('assets/js/vidio.js');?>"> </script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>


<br>
<br>
<div class="col-md-6 offset-md-3">
  
  <?php $teks = explode(".", base_url('gambar/'.$file_name) ); ?>
  <?php if( $teks[1] == 'gif|jpg|png|') : ?>
  <div class="img">
  <img src="<?php echo base_url('gambar/'.$file_name);?>" alt="..." class="img-thumbnail">
  </div>
  <?php else : ?>
  <embed source src="<?php echo base_url('gambar/'.$file_name); ?>">
 <?php endif ?>
  <br>
  <hr style="height:1px; border:none; color:#000; background-color:#000;">
  <p>Komentar:</p>

  <?php foreach ($komentar_data as $komentar): ?>

          <p><?php echo $komentar['komentar']; ?></p>
          <hr style="height:1px; border:none; color:#000; background-color:#000;">

  <?php endforeach; ?>


  <hr>
  <br>
  <?php echo form_open('Komentar/create/'.$id); ?>
    <textarea id="summernote" name="komentar"></textarea>
  <br>
  <br>

     <button type="submit" class="btn btn-primary">Beri Komentar</button>
  </form>
  <br>
  <br>
  <script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });
  </script>
</div>