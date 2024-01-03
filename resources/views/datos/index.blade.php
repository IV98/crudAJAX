<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <title>Registro de datos</title>
</head>

<body>
    <div class="container">
        <div class="title">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="text-left mt-5 mb-4">Listado de registros</h3>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-dark mt-5 mb-4" data-bs-toggle="modal" data-bs-target="#modalCreate" style="float: right;">
                        Nuevo&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive-md">
                <table class="table table-striped table-bordered mt-2" id="tblDatos" style="width: 100%;">
                    <thead>
                        <th width="7%" class="text-center">Id</th>
                        <th>Nombre</th>
                        <th>Direcci&oacute;n</th>
                        <th width="10%" class="text-center">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($datos as $item)
                        <tr>
                            <td width="7%" class="text-center">{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->direccion }}</td>
                            <td class="text-center">
                                <form action="{{ route('datos.destroy', $item->id) }}" method="POST" class="formEliminarRegistro">
                                    @method('DELETE')
                                    @csrf
                                    <a onclick="getData('{{ $item->id }}')" class="btn btn-secondary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                    <button class="btn btn-dark btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL CREATE -->
    <div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar datos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('datos.store') }}" method="POST" id="formCreateRegistro">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name" class="form-label">Nombre completo:</label>
                                <input type="text" class="form-control" id="name" name="name" maxlength="100" required>
                            </div>
                            <div class="col-sm-12 mt-1">
                                <label for="address" class="form-label">Direcci&oacute;n:</label>
                                <input type="text" class="form-control" id="address" maxlength="200" name="address">
                            </div>
                            <div class="col-sm-6 mt-1">
                                <label for="age" class="form-label">Edad:</label>
                                <input type="number" class="form-control" id="age" maxlength="5" name="age" required>
                            </div>
                            <div class="col-sm-6 mt-1">
                                <label for="ocupacion" class="form-label">Ocupaci&oacute;n:</label>
                                <input type="text" class="form-control" id="ocupacion" maxlength="100" name="ocupacion" required>
                            </div>
                            <div class="col-sm-12 mt-1">
                                <label for="pasatiempo" class="form-label">Pasatiempo:</label>
                                <input type="text" class="form-control" id="pasatiempo" maxlength="50" name="pasatiempo" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark text-right mt-3 mb-2" style="float: right;">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div class="modal fade" id="modalEditData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar datos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('datos.update') }}" method="POST" class="formUpdateData">
                        @method('PUT')
                        @csrf
                        <input type="text" id="registro_id" name="idRegistro" class="d-none">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="nameData" class="form-label">Nombre completo:</label>
                                <input type="text" class="form-control" id="nameData" name="nameData" maxlength="100" required>
                            </div>
                            <div class="col-sm-12 mt-1">
                                <label for="addressData" class="form-label">Direcci&oacute;n:</label>
                                <input type="text" class="form-control" id="addressData" maxlength="200" name="addressData">
                            </div>
                            <div class="col-sm-6 mt-1">
                                <label for="ageData" class="form-label">Edad:</label>
                                <input type="number" class="form-control" id="ageData" maxlength="5" name="ageData" required>
                            </div>
                            <div class="col-sm-6 mt-1">
                                <label for="ocupacionData" class="form-label">Ocupaci&oacute;n:</label>
                                <input type="text" class="form-control" id="ocupacionData" maxlength="100" name="ocupacionData" required>
                            </div>
                            <div class="col-sm-12 mt-1">
                                <label for="pasatiempoData" class="form-label">Pasatiempo:</label>
                                <input type="text" class="form-control" id="pasatiempoData" maxlength="50" name="pasatiempoData" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark text-right mt-3 mb-2" style="float: right;">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#tblDatos').DataTable({
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "Todos"]
            ],
            columns: [{
                    orderable: true
                },
                {
                    orderable: true
                },
                {
                    orderable: true
                },
                {
                    orderable: false
                }
            ],
            "ordering": true,
            "order": [
                [0, "asc"]
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    });

    $('#modalCreate').on('hidden.bs.modal', function() {
        $(this).find("input").val('').end();
    });

    (function() {
        'use strict';
        var form = document.querySelectorAll('#formCreateRegistro');
        form[0].addEventListener('submit', function(event) {
            var contexto = this;
            event.preventDefault();
            event.stopPropagation();
            if (true) {
                function validate() {
                    Swal.fire({
                        title: '¿Está seguro de capturar los datos?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#00887A',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Confirmar',
                        cancelButtonText: 'Cancelar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            contexto.submit();
                        }
                    })
                }
                validate();
            }
        }, false);
    })();

    (function() {
        'use strict';
        var forms = document.querySelectorAll('.formUpdateData');
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    Swal.fire({
                        title: '¿Está seguro de actualizar el registro?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#1A897A',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Confirmar',
                        cancelButtonText: 'Cancelar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    })
                }, false);
            });
    })();

    (function() {
        'use strict';
        var forms = document.querySelectorAll('.formEliminarRegistro');
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    Swal.fire({
                        title: '¿Está seguro de eliminar el registro?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#2E2E2E',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Confirmar',
                        cancelButtonText: 'Cancelar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    })
                }, false);
            });
    })();

    //AJAX
    function getData(id) {
        let url = "{{ route('datos.getData',':id') }}";
        $.ajax({
            url: url.replace(':id', id),
            type: 'GET',
            data: {
                "id": id
            },
            success: function(data) {
                $('#registro_id').val(id);
                $('#nameData').val(data.nombre);
                $('#addressData').val(data.direccion);
                $('#ageData').val(data.edad);
                $('#ocupacionData').val(data.ocupacion);
                $('#pasatiempoData').val(data.pasatiempo);
                $('#modalEditData').modal('show');
            },
            error: function(xhr) {
                alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                console.log(xhr);
            }
        })
    }

    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true
    });

    @if($message = Session::get('success'))
    Toast.fire({
        icon: 'success',
        title: '{{$message}}'
    })
    @endif

    @if($message = Session::get('info'))
    Toast.fire({
        icon: 'info',
        title: '{{$message}}'
    })
    @endif
</script>

</html>