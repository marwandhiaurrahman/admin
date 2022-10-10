@extends('adminlte::page')

@section('title', 'Component Tool')

@section('content_header')
    <h1 class="m-0 text-dark">Component Tool</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Modal" theme="info" icon="fas fa-info" collapsible removable maximizable>
                {{-- Minimal --}}
                <x-adminlte-modal id="modalMin" title="Minimal" />
                {{-- Example button to open modal --}}
                <x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalMin" />
                {{-- Themed --}}
                <x-adminlte-modal id="modalPurple" title="Theme Purple" theme="purple" icon="fas fa-bolt" size='lg'
                    disable-animations>
                    This is a purple theme modal without animations.
                </x-adminlte-modal>
                {{-- Example button to open modal --}}
                <x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalPurple" class="bg-purple" />
                {{-- Custom --}}
                <x-adminlte-modal id="modalCustom" title="Account Policy" size="lg" theme="teal" icon="fas fa-bell"
                    v-centered static-backdrop scrollable>
                    <div style="height:800px;">Read the account policies...</div>
                    <x-slot name="footerSlot">
                        <x-adminlte-button class="mr-auto" theme="success" label="Accept" />
                        <x-adminlte-button theme="danger" label="Dismiss" data-dismiss="modal" />
                    </x-slot>
                </x-adminlte-modal>
                {{-- Example button to open modal --}}
                <x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalCustom" class="bg-teal" />
            </x-adminlte-card>
            <x-adminlte-card title="Data Table" theme="info" icon="fas fa-info" collapsible removable maximizable>
                {{-- Setup data for datatables --}}
                @php
                    $heads = ['ID', 'Name', ['label' => 'Phone', 'width' => 40], ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

                    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>';
                    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

                    $config = [
                        'data' => [[22, 'John Bender', '+02 (123) 123456789', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'], [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>'], [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>']],
                        'order' => [[1, 'asc']],
                        'columns' => [null, null, null, ['orderable' => false]],
                    ];
                @endphp

                {{-- Minimal example / fill data using the component slot --}}
                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach ($config['data'] as $row)
                        <tr>
                            @foreach ($row as $cell)
                                <td>{!! $cell !!}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </x-adminlte-datatable>

                {{-- Compressed with style options / fill data using the plugin config --}}
                <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable
                    bordered compressed />
            </x-adminlte-card>
            <x-adminlte-card title="Data Table Theme" theme="info" icon="fas fa-info" collapsible removable maximizable>
                {{-- Themes --}}
                <x-adminlte-datatable id="table3" :heads="$heads" :config="$config" theme="info" striped hoverable />

                <x-adminlte-datatable id="table4" :heads="$heads" theme="danger" :config="$config" striped hoverable />

                <x-adminlte-datatable id="table5" :heads="$heads" :config="$config" theme="light" striped hoverable />

                <x-adminlte-datatable id="table6" :heads="$heads" head-theme="light" theme="dark" :config="$config"
                    striped hoverable with-footer footer-theme="light" beautify />
            </x-adminlte-card>
            <x-adminlte-card title="Data Table Customization" theme="info" icon="fas fa-info" collapsible removable
                maximizable>
                {{-- With buttons --}}
                <x-adminlte-datatable id="table7" :heads="$heads" head-theme="light" theme="warning"
                    :config="$config" striped hoverable with-buttons />

                {{-- With buttons + customization --}}
                @php
                    $config['dom'] = '<"row" <"col-sm-7" B> <"col-sm-5 d-flex justify-content-end" i> >
              <"row" <"col-12" tr> >
              <"row" <"col-sm-12 d-flex justify-content-start" f> >';
                    $config['paging'] = false;
                    $config['lengthMenu'] = [10, 50, 100, 500];
                @endphp

                <x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" class="bg-teal" :config="$config"
                    striped hoverable with-buttons />
            </x-adminlte-card>
        </div>
    </div>
@stop

@section('plugins.BsCustomFileInput', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
