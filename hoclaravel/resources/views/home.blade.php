<h1 style="text-align: center;">Học lập trình Laravel tại Unicode </h1>
<?php
// echo date('Y-m-d H:i:s');
// echo env('APP_ENV');
// echo config('app.env');

if (env('APP_ENV')=='production'){
    //Call api live
    echo 'Call api live';
}else{
    //Call api sandbox
    echo 'Call api sandbox';
}
?>