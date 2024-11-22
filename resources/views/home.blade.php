<x-layouts.app title="Inicio" :breadcrumbs="['App', route('home') => 'Inicio']" :container="false">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card border-end">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $patients }}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pacientes
                                </h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card border-end ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                        class="set-doller">$</sup>{{ $totalEarnings }}
                                </h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Ganancias este mes
                                </h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card border-end ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $doctors }}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Doctores
                                </h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $treatments }}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Tratamientos</h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pagos</h4>
                        <div>
                            <x-chartjs-component :chart="$sales" />
                        </div>
                        <ul class="list-style-none mb-0">
                            <li>
                                <i class="fas fa-circle text-primary font-10 me-2"></i>
                                <span class="text-muted">Transferencias</span>
                                <span class="text-dark float-end font-weight-medium">$
                                    {{ $methods_months['Transferencia'] ?? 0 }}</span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-danger font-10 me-2"></i>
                                <span class="text-muted">Efectivo</span>
                                <span class="text-dark float-end font-weight-medium">$
                                    {{ $methods_months['Efectivo'] ?? 0 }}</span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-cyan font-10 me-2"></i>
                                <span class="text-muted">Pago móvil</span>
                                <span class="text-dark float-end font-weight-medium">$
                                    {{ $methods_months['PagoMovil'] ?? 0 }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Citas activas</h4>
                        <div>
                            <x-chartjs-component :chart="$appointments" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <h4 class="card-title mb-0">Ingresos</h4>
                        </div>
                    </div>
                    <div class="pl-4 mb-5">
                        <div>
                            <x-chartjs-component :chart="$earnings" />
                        </div>
                    </div>
                    <ul class="list-inline text-center mt-4 mb-0">
                        <li class="list-inline-item text-muted fst-italic">Ganancias de esta semana</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>

    @push('css')
        <link href="{{ asset('vendor/css/dashboard/c3.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('vendor/css/dashboard/chartist.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('vendor/css/dashboard/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    @endpush

    @push('js')
        <script src="{{ asset('vendor/js/dashboard/d3.min.js') }}"></script>
        <script src="{{ asset('vendor/js/dashboard/c3.min.js') }}"></script>
        <script src="{{ asset('vendor/js/dashboard/chartist.min.js') }}"></script>
        <script src="{{ asset('vendor/js/dashboard/chartist-plugin-tooltip.min.js') }}"></script>
        <script src="{{ asset('vendor/js/dashboard/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('vendor/js/dashboard/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ asset('vendor/js/dashboard/dashboard1.min.js') }}"></script>
        <script src="{{ asset('vendor/js/chart.umd.js') }}"></script>
    @endpush

</x-layouts.app>
