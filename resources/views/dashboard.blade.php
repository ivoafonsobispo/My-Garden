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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Vegetais (Quantidade)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Temperatura (Diária)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">23ºC</div>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Humidade (Diária)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">29%</div>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Hora</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">10:53</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
        <h1 class="h4 mb-0 text-gray-800">Informações das culturas</h1>
    </div>
    <div class="row">
        @foreach ($plants as $plant)
            <div class="col-lg-4 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-capitalize">{{$plant->name}}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <span class="col-8 text-left text-gray-700">Luminosidade</span>
                            <span class="col-4 mb-0 font-weight-bold text-gray-800 text-right">{{$plant->luminosity}}%</span>
                        </div>
                        <hr class="sidebar-divider my-2">
                        <div class="row">
                            <span class="col-8 text-left text-gray-700">Temperatura</span>
                            <span class="col-4 mb-0 font-weight-bold text-gray-800 text-right">{{$plant->temperature}}ºC</span>
                        </div>
                        <hr class="sidebar-divider my-2">
                        <div class="row">
                            <span class="col-8 text-left text-gray-700">Humidade no solo</span>
                            <span class="col-4 mb-0 font-weight-bold text-gray-800 text-right">{{$plant->humidity}}%</span>
                        </div>
                        <hr class="sidebar-divider my-2">
                        <div class="row">
                            <span class="col-6 text-left text-gray-700">Rega</span>
                            <span class="col-6 mb-0 font-weight-bold text-right text-capitalize {{($plant->watering) ? "text-success" : " text-danger"}}">{{($plant->watering) ? "Ligada" : " Desligada"}}</span>
                        </div>
                        <hr class="sidebar-divider my-2">
                        <div class="row">
                            <span class="col-6 text-left text-gray-700">Luz</span>
                            <span class="col-6 mb-0 font-weight-bold text-right text-capitalize {{($plant->light) ? "text-success" : " text-danger"}}">{{($plant->light) ? "Ligada" : " Desligada"}}</span>
                        </div>
                        <hr class="sidebar-divider my-2">
                        <div class="row">
                            <span class="col-8 text-left text-gray-700">Camera</span>
                            <span class="col-4 mb-0 font-weight-bold text-gray-800 text-right"> <a href="#">Ver</a> </span>
                        </div>
                        <hr class="sidebar-divider my-2">
                        <div class="row">
                            <span class="col-4 text-left text-gray-700">Atualização</span>
                            <span class="col-8 mb-0 font-weight-bold text-gray-800 text-right"> {{date_format($plant->created_at, "d/m/Y H:i")}} </span>
                        </div>
                    </div>
                </div>
            </div>
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
@endsection
