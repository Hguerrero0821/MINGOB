@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
      <center><h3 class="page__heading">Permisos de usuario logeado</h3></center>
  </div>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">

                            <table class="table table-striped mt-3">
                                    <thead class="table-dark">
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">USUARIO</th>
                                        <th style="color:#fff;">ROLES</th>
                                        <th style="color:#fff;">SUBMENUS</th>
                                    </thead>

                                    @foreach ($usuarios_submenus as $usuarios_submenu)
                                    <tr>
                                        <td>{{ $usuarios_submenu->user_id }}</td>
                                        <td>{{ $usuarios_submenu->rol_id }}</td>
                                        <td>{{ $usuarios_submenu->submenu_id }}</td>

                                    </tr>
                                    @endforeach

                                  </tr>

                              </tbody>
                            </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
@endsection
