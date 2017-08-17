<div class="container-fluid">
<?php echo $error;?>
<!--Modal para cargar un excel-->
<div class="modal fade bs-example-modal-sm" id="Upload_users" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Eliminar Usuario</h4>
      </div>
        <div class="modal-body">
            <?php echo form_open_multipart('usuario_admin/do_upload');?>
            <input type="file" name="userfile" size="20" />

<br /><br />
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button id="submit"  type="submit" value="upload" class="btn btn-primary">upload</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#Upload_users">
  Launch demo modal
</button>
<!-- Cierra el div principal-->
</div>