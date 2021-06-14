@extends('layout.master')
<!-- Page Title -->
@section('title', 'Dashboard')
<!-- Page Content -->
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Informações gerais</h1>
        <a href="#" data-toggle="modal" data-target="#infoModal" class="btn btn-secondary btn-icon-split btn-sm" title="Informações">
            <span class="icon text-white-50">
                <i class="fas fa-info-circle"></i>
            </span>
            <span class="text">Informações</span>
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Vegetais -->
        <div class="col-xl-3 col-md-6 mb-4 cards">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Culturas (Quantidade)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-seedling fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Temperatura -->
        <div class="col-xl-3 col-md-6 mb-4 cards">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Temperatura (Geral)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <!-- verifica se existe, se sim apresenta -->
                                @isset($general_sensor->temperature)
                                    {{$general_sensor->temperature.'ºC'}}
                                @else
                                    -
                                @endisset
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-temperature-low fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Humidade -->
        <div class="col-xl-3 col-md-6 mb-4 cards">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidade (Geral)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <!-- verifica se existe, se sim apresenta -->
                                @isset($general_sensor->humidity)
                                    {{$general_sensor->humidity.'%'}}
                                @else
                                    -
                                @endisset
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cloud-rain fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hora -->
        <div class="col-xl-3 col-md-6 mb-4 cards">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Hora (Registo)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <!-- verifica se existe, se sim apresenta -->
                                @isset($general_sensor->created_at)
                                    {{date_format($general_sensor->created_at, "H:i")}}
                                @else
                                    -
                                @endisset
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="d-sm-flex align-items-center justify-content-between mt-3">
            <h1 class="h4 mb-0 text-gray-800">Informações das culturas</h1>
        </div>
        <small class="mb-4 text-muted">*Os dados abaixo apresentados refletem o último registo efectuado às culturas.</small>
        <br><br>
        <div class="row">
          <!-- para cada cultura existente cria uma nova card -->
            @foreach ($plants as $plant)
                @isset($plant)
                    <div class="col-lg-4 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                              <!-- coloca o nome -->
                                <h6 class="m-0 font-weight-bold text-primary text-capitalize">{{$plant->name}}</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                  <!-- escreve a temperatura -->
                                    <span class="col-8 text-left text-gray-700">Temperatura</span>
                                    <span class="col-4 mb-0 font-weight-bold text-gray-800 text-right">{{$plant->temperature}}ºC</span>
                                </div>
                                <hr class="sidebar-divider my-2">
                                <div class="row">
                                  <!-- escreve a luminosidade -->
                                    <span class="col-8 text-left text-gray-700">Luminosidade</span>
                                    <span class="col-4 mb-0 font-weight-bold text-gray-800 text-right">{{$plant->luminosity}}%</span>
                                </div>
                                <hr class="sidebar-divider my-2">
                                <div class="row">
                                  <!-- escreve a humidade -->
                                    <span class="col-8 text-left text-gray-700">Humidade no solo</span>
                                    <span class="col-4 mb-0 font-weight-bold text-gray-800 text-right">{{$plant->humidity}}%</span>
                                </div>
                                <hr class="sidebar-divider my-2">
                                <div class="row">
                                  <!-- escreve o vento -->
                                    <span class="col-8 text-left text-gray-700">Vento</span>
                                    <span class="col-4 mb-0 font-weight-bold text-gray-800 text-right">{{$plant->wind}} km/h</span>
                                </div>
                                <hr class="sidebar-divider my-2">
                                <div class="row">
                                  <!-- escreve estado da rega -->
                                    <span class="col-6 text-left text-gray-700">Rega</span>
                                    <span class="col-6 mb-0 font-weight-bold text-right text-capitalize">
                                        <a class="watering-btn {{($plant->watering) ? "text-success" : " text-danger"}}" href="#" data-planta="{{$plant->id}}">{{($plant->watering) ? "Ligada" : " Desligada"}}</a>
                                    </span>
                                </div>
                                <hr class="sidebar-divider my-2">
                                <div class="row">
                                  <!-- escreve estado da luz -->
                                    <span class="col-6 text-left text-gray-700">Luz</span>
                                    <span class="col-6 mb-0 font-weight-bold text-right text-capitalize">
                                        <a class="light-btn {{($plant->light) ? "text-success" : " text-danger"}}" href="#" data-planta="{{$plant->id}}">{{($plant->light) ? "Ligada" : " Desligada"}}</a>
                                    </span>
                                </div>
                                <hr class="sidebar-divider my-2">
                                <div class="row">
                                  <!-- escreve estado da janela -->
                                    <span class="col-6 text-left text-gray-700">Janela</span>
                                    <span class="col-6 mb-0 font-weight-bold text-right text-capitalize">
                                        <a class="window-btn {{($plant->window_state) ? "text-success" : " text-danger"}}" href="#" data-planta="{{$plant->id}}">{{($plant->window_state) ? "Aberta" : " Fechada"}}</a>
                                    </span>
                                </div>
                                <hr class="sidebar-divider my-2">
                                <div class="row">
                                  <!-- escreve a hora -->
                                    <span class="col-4 text-left text-gray-700">Atualização</span>
                                    <span class="col-8 mb-0 font-weight-bold text-gray-800 text-right"> {{date_format($plant->created_at, "d/m/Y H:i")}} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset
            @endforeach
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
@section('scripts')
<script>
$(document).ready(function() {
    // AJAX Request para a atualização do estado da rega
    $(".watering-btn").click(function(event) {
        event.preventDefault();

        var button = $(event.relatedTarget);
        var anchor = $(this);
        var info = this.text;

        // cria um token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        // altera o valor da rega, dependendo do estado anterior e atualiza na bd
        $.ajax({
            type: "put",
            url: "/plant/update-watering/"+anchor.data('planta'),
            context: this,
            success: function(data) {
                if (info === "Ligada") {
                    anchor.text("Desligada").removeClass("text-success").addClass("text-danger");
                }else {
                    anchor.text("Ligada").removeClass("text-danger").addClass("text-success");
                }
            },
            error: function() {
                alert("Não é possível desligar a rega, porque o valor da humidade está abaixo de 20%.");
            }
        });
    });

    // AJAX Request para a atualização do estado da luz
    $(".light-btn").click(function(event) {
        event.preventDefault();

        var button = $(event.relatedTarget);
        var anchor = $(this);
        var info = this.text;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        // altera o valor da lampada, dependendo do estado anterior e atualiza na bd
        $.ajax({
            type: "put",
            url: "/plant/update-light/"+anchor.data('planta'),
            context: this,
            success: function(data) {
                if (info === "Ligada") {
                    anchor.text("Desligada").removeClass("text-success").addClass("text-danger");
                }else {
                    anchor.text("Ligada").removeClass("text-danger").addClass("text-success");
                }
            },
            error: function() {
                alert("Não é possível desligar a luz, porque o valor da luminosidade está abaixo de 30%.");
            }
        });
    });

    // AJAX Request para a atualização do estado da janela
    $(".window-btn").click(function(event) {
        event.preventDefault();

        var button = $(event.relatedTarget);
        var anchor = $(this);
        var info = this.text;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        // altera o valor da janela, dependendo do estado anterior e atualiza na bd
        $.ajax({
            type: "put",
            url: "/plant/update-window/"+anchor.data('planta'),
            context: this,
            success: function(data) {
                if (info === "Aberta") {
                    anchor.text("Fechada").removeClass("text-success").addClass("text-danger");
                }else {
                    anchor.text("Aberta").removeClass("text-danger").addClass("text-success");
                }
            },
            error: function() {
                alert("Não é possível abrir a janela, porque a velocidade do vento está acima de 10 km/h.");
            }
        });
    });
});
</script>
@endsection
@endsection
