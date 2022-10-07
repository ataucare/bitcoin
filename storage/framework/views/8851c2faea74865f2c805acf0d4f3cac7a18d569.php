<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col">
        <div class="card">
            <h2 class="card-header">
                HISTORIAL
            </h2>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Valor USD</th>
                            <th>Valor CLP</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/sc-2.0.7/datatables.min.css"/>
<link rel="stylesheet" href="<?php echo e(asset('/resources/css/odometer-theme-car.css')); ?>">

<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/r-2.3.0/sc-2.0.7/datatables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#example').DataTable({
            ajax: '<?php echo e(route('bitcoin.listar')); ?>',
            language: {
                //search: 'In der Tabelle finden',
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-CL.json',
            },
            columns: [
                { targets: 0, render: function(data, type, row, meta){
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { targets: 1, data: 'valorUsd'},
                { targets: 2, data: 'valorClp'},
                { targets: 3, data: 'formatted_created_at'}
            ]
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alvaro/Ntg/bitcoin/resources/views/home/historial.blade.php ENDPATH**/ ?>