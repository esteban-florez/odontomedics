<x-layouts.app title="Respaldo y recuperación" :breadcrumbs="['Respaldo', route('backups.index') => 'Respaldo']">

    <x-slot name="rightbar">
        <a href="{{ route('backups.create') }}" class="btn btn-success">
            Respaldo
        </a>
    </x-slot>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Creado</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($backups as $backup)
                    <tr>
                        <td>{{ $backup['date'] }}</td>
                        <td>{{ $backup['size'] }}</td>
                        <td class="d-flex align-items-center gap-1">
                            <a href="{{ route('backups.download', $backup['key']) }}"
                                class="btn btn-sm btn-warning">Descargar</a>
                            <form method="POST" action="{{ route('backups.restore', ['id' => $backup['key']]) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">
                                    Restaurar
                                </button>
                            </form>
                            <a href="{{ route('backups.delete', $backup['key']) }}"
                                class="btn btn-sm btn-danger">Borrar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="4">No existen registros.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layouts.app>
