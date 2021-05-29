@extends('layout.master')
<!-- Page Title -->
@section('title', 'Histórico dos tomates')
<!-- Page Content -->
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Histórico dos tomates</h1>
        <a href="#" data-toggle="modal" data-target="#infoModal" class="btn btn-secondary btn-icon-split btn-sm" title="Informações">
            <span class="icon text-white-50">
                <i class="fas fa-info-circle"></i>
            </span>
            <span class="text">Informações</span>
        </a>
    </div>
    <!-- Approach -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Listagem do histórico dos tomates</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive p-1">
                <table class="table table-bordered table-striped" id="table" width="100%">
                    <thead>
                        <tr>
                            <th>Temperatura</th>
                            <th>Luminosidade</th>
                            <th>Humidade</th>
                            <th>Rega</th>
                            <th>Luz</th>
                            <th>Data e Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tomates as $tomate)
                        <tr>
                            <td>{{$tomate->temperature}}ºC</td>
                            <td>{{$tomate->luminosity}}%</td>
                            <td>{{$tomate->humidity}}%</td>
                            <td class="{{($tomate->watering) ? "text-success" : " text-danger"}}">{{($tomate->watering) ? "Ligada" : " Desligada"}}</td>
                            <td class="{{($tomate->light) ? "text-success" : " text-danger"}}">{{($tomate->light) ? "Ligada" : " Desligada"}}</td>
                            <td>{{date_format($tomate->created_at, "d/m/Y H:i")}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End of container-fluid -->

<!-- Modal for more information -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pl-4 pb-1 pt-4">
                <h5 class="modal-title text-gray-800 font-weight-bold">Para que serve?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-gray-800 pl-4 pr-5">
                Na <i>dashboard</i>, pode encontrar todos os dados gerais acerca das estufas My Garden, bem como outros dados importantes para as culturas que se criam.
            </div>
            <div class="modal-footer mt-3">
                <a data-dismiss="modal" class="mr-4 font-weight-bold" id="close-option">Fechar</a>
                <button type="button" data-dismiss="modal" class="btn btn-success font-weight-bold mr-2">Entendido!</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal for more information  -->

<!-- Begin of Scripts -->
@section('scripts')
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "language": {
                "sEmptyTable": "Não foi encontrado nenhum registo",
                "sLoadingRecords": "A carregar...",
                "sProcessing": "A processar...",
                "sLengthMenu": "Mostrar _MENU_ registos",
                "sZeroRecords": "Não foram encontrados resultados",
                "sInfo": "Mostrando _END_ de _TOTAL_ registos",
                "sInfoEmpty": "Mostrando de 0 de 0 registos",
                "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
                "sInfoPostFix": "",
                "sSearch": "Procurar:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext": "Seguinte",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            "order": [],
        });
    });
</script>
@endsection
<!-- End of Scripts -->
@endsection
