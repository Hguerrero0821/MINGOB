@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
      <center><h3 class="page__heading">Tabla de Usuarios</h3></center>
  </div>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                        @can('crear-usuario')
                          <a class="btn btn-primary" href="{{ route('usuarios.create') }}">Crear Usuario</a>
                        @endcan

                            <table class="table table-striped mt-3">
                              <thead style="background-color:#00008B">
                                  <th style="display: none;">ID</th>
                                  <th style="color:#fff;">Nombre</th>
                                  <th style="color:#fff;">E-mail</th>
                                  <th style="color:#fff;">Acciones</th>

                              </thead>
                              <tbody>
                                @foreach ($usuarios as $usuario)
                                  <tr>
                                    <td style="display: none;">{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>

                                    <td>
                                      @can('editar-usuario')
                                        <a class="btn btn-warning" href="{{ route('usuarios.edit',$usuario->id) }}">Editar</a>
                                      @endcan

                                      @can('borrar-usuario')
                                        {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
                                          {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                      @endcan
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->
                          <div class="pagination justify-content-end">
                            {!! $usuarios->links() !!}
                          </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
@endsection
