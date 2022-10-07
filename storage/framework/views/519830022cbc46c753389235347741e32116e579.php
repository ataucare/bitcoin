<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col">
        <div class="card">
            <h2 class="card-header"><?php echo e(__('El valor del Bitcoin')); ?></h2>

            <div class="card-body">
                <div class="row">
                    <div class="col text-center">
                        <div id="odometer" class="odometer">0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style type="text/css">
    .odometer {
        font-size: 100px;
    }
</style>
    
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script type="text/javascript">
        var clock;
        window.odometerOptions = {
            format: '(.ddd),dd',
            theme: 'car',
        };

        $(document).ready(function() {
            myVar = setInterval("getBitcoin()", 10000);
        });

        function getBitcoin() {
            const settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?php echo e(route('bitcoin.getValor')); ?>",
                "method": "GET",
                "headers": {
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                }
            };

            $.ajax(settings).done(function (response) {
                console.log(response);
                $('.odometer').html(response.bitcoin.price_usd);
            });
        }
        function stopFunction(){
            clearInterval(clock);
        }
        function getRndInteger(min, max) {
            return Math.floor(Math.random() * (max - min + 1) ) + min;
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alvaro/Ntg/bitcoin/resources/views/home/home.blade.php ENDPATH**/ ?>