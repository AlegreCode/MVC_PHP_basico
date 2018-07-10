$(function(){
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

    $('#agregar').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/helper/registro.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                if (response.status) {
                    swal(
                        'OK!',
                        'Datos registrado con éxito!',
                        'success'
                      ).then(()=>{
                          window.location.href = "/";
                      });
                }
            }
        });
    });

    $('#editar').on('submit', function(e){
        e.preventDefault();
        swal({
            title: 'Estás seguro de enviar estos datos?',
            text: "Una vez enviado los datos serán actualizados",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, enviar!',
            cancelButtonText: 'No, cancelar'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "/helper/editar.php",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function (response) {
                        if (response.status) {
                            toast({
                                type: 'success',
                                title: response.msg
                              }).then(()=>{
                                  window.location.href = "/";
                              });
                        }
                    }
              });
            }
          })
    });

    $('.delete').on('submit', function (e) {
        e.preventDefault();
        swal({
            title: 'Estás seguro?',
            text: "Al aceptar el registro será borrado!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, borralo!'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "/helper/delete.php",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function (response) {
                        if (response.status) {
                            swal(
                            'OK!',
                            response.msg,
                            'success'
                            ).then(() => {
                                window.location.href = '/';
                            });

                        }
                    }
                });
            }
          })
     });
});