    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="<?php echo base_url(); ?>/public/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/bootstrap/bootstrap.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
      let mensaje = '<?php echo $mensaje ?>'
      if (mensaje == '1') {
        swal('Completado', 'Agregado exitosamente!', 'success')
      } else if(mensaje == '0'){
        swal('Hay un error', 'No se pudo agregar', 'error')
      }

      if (mensaje == '2') {
        swal('Completado', 'Registro actualizado exitosamente!', 'success')
      } else if(mensaje == '3'){
        swal('Hay un error', 'El registro no se pudo actualizar', 'error')
      }

      if (mensaje == '4') {
        swal('Completado', 'Eliminado exitosamente!', 'success')
      } else if(mensaje == '5'){
        swal('Hay un error', 'No se pudo eliminar', 'error')
      }

    </script>
  </body>
</html>