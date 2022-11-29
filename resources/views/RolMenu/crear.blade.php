@extends('layouts.app')

    @section('content')
        <head>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        </head>

        <section class="section">
            <div class="section-header">
                <center><h3 class="page__heading">ROLES Y PERMISOS</h3></center>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">


                                {!! Form::open(array('route' => 'rolesmenu.store','method'=>'POST')) !!}
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Roles</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr id="product">

                                                <td>
                                                    <select class="select w-100" name="rol_id" id="rol_id" >
                                                        <option value="0" ></option>

                                                        @foreach ($roles as $roles)
                                                                <option value="{{$roles->id}}" >{{$roles->name}}</option>
                                                        @endforeach

                                                    </select>
                                                    </td>

                                                <td></td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <div class="card-body">
                                        <table class="table" id="products_table">
                                            <thead>
                                                <tr>
                                                    <th>Submenus</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr id="product0">

                                                    <td>
                                                        <select class="select w-100" name="submenu_id[]" id="submenu_id" >
                                                            <option value="0" ></option>

                                                            @foreach ($submenus as $submenu)
                                                                    <option value="{{$submenu->id}}" >{{$submenu->name}}</option>
                                                            @endforeach
                                                        </select>

                                                    </td>
                                                </tr>
                                                <tr id="product1"></tr>
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button id="add_row" class="btn btn-default pull-left">+ Agregar Otro</button>
                                                <button id='delete_row' class="pull-right btn btn-danger">- Eliminar Uno</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection

    @section('third_party_scripts')


        <script>
                $(document).ready(function(){
                    let row_number = 1;
                    $("#add_row").click(function(e){
                        e.preventDefault();
                        let new_row_number = row_number - 1;
                        $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
                        $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
                        row_number++;
                    });

                    $("#delete_row").click(function(e){
                        e.preventDefault();
                        if(row_number > 1){
                            $("#product" + (row_number - 1)).html('');
                            row_number--;
                        }
                        else
                                alert("Este rol requiere al menos un submenu!!!")
                    });
            });
        </script>
    @endsection




