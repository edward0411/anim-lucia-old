@extends('layouts.app',
        $vars=[ 'breadcrum' => ['<a href="#">Administración</a>','Cuenta Bancaria'],
                'title'=>'Cuenta Bancaria',
                'activeMenu'=>'21'
              ])

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- general form elements disabled -->
            <div class="card card-primary shadow">
                <div class="card-header">
                    <h3 class="card-title">Editar Cuenta Bancaria</h3>
                </div>
                <!-- /.card-header -->
                <form role="form" method="POST"  action="{{route('terceros_cuentas_bancarias.update')}}">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                    <div class="form-row">
                    <datalist id="browsersTerceros">
                                        @foreach ($listaterceros as $listatercero)
                                        <option value="{{$listatercero->identificacion}} - <?=str_replace('"', '\" ', $listatercero->nombre)?>" data-value="{{$listatercero->id}}">
                                          @endforeach
                                    </datalist>

                        <div class="col-md-4 col-lg-6">
                            <div class="form-group">

                                <label>Nombre Tercero*</label>
                                <input list="browsersTerceros" name="tercero" id="tercero" onchange="llenarTerceros('tercero')" class="form-control"  placeholder="Digite el nit o el nombre" value="{{$terceros_cuentas_bancarias[0]->nombre}}" required>
                                  <input type="hidden"  name="id_tercero" id="id_tercero"  value="" >

                            </div>
                        </div>
                        <div class="col-md-4 col-lg-6">
                                            <div class="form-group">
                                                <label>Tipo de Cuenta*</label>
                                                <select id='' name="tipo_cuenta" class="form-control" required>
                                                    <option value="{{$terceros_cuentas_bancarias[0]->param_tipo_cuenta_valor}}">{{$terceros_cuentas_bancarias[0]->param_tipo_cuenta_texto}}</option>
                                                    @foreach($tipo_cuenta as $cuenta)
                                                    <option value="{{$cuenta->valor}}">{{$cuenta->texto}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-6">
                                            <div class="form-group">
                                                <label>Banco*</label>
                                                <select  name="banco" class="form-control" id=""
                                                    required>
                                                    <option value="{{$terceros_cuentas_bancarias[0]->param_banco_valor}}">{{$terceros_cuentas_bancarias[0]->param_banco_texto}}</option>
                                                    @foreach($banco as $bancos)
                                                    <option value="{{$bancos->valor}}">{{$bancos->texto}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>
                            <div class="col-md-4 col-lg-6">
                              <div class="form-group">
                                <label>Número de Cuenta*</label>
                              <input type="text" name="numero_cuenta" id=""  class="form-control" placeholder="" value="{{$terceros_cuentas_bancarias[0]->numero_cuenta}}" >

                              </div>
                            </div>
                       </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                    <input type="hidden" name="id" value="{{$terceros_cuentas_bancarias[0]->id}}">
                        <button type="submit" class="btn btn-sm btn-primary" name="guardar" vuale="guardar" >Actualizar</button>
                        <a href="{{route('terceros_cuentas_bancarias.index')}}"  type="button" class="btn btn-sm btn-default float-right"  name="regresar" vuale="regresar">Regresar</a>
                    </div>
                </form>
            </div>
              <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection

@section('script')

<script type="text/javascript">


function llenarTerceros(name) {
    var valor = $('#'+name).val()

    $('#id_'+name).val($('#browsersTerceros [value="' + valor + '"]').data('value'))

    console.log(valor);

    //var id_tercero=$('#id_contratista').val();
    //traerinfoterceros(id_tercero);

    }
  </script>


    @endsection

