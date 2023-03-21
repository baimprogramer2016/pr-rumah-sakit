<?php 
use Illuminate\Support\Facades\Crypt;
function checkType($type)
{
    $dataType = ["jpg",'png','jpeg','ico'];
    foreach($dataType as $tp)
    {
        if($tp == $type)
        {
            return true;
            break;
        }
    }
    return false;
}

function Enc($v)
{
    
    return Crypt::encryptString($v);
}
function Dec($v)
{
    
    return Crypt::decryptString($v);
}

function DescCategory($v)
{
    switch($v){
        case $v == 'superadmin':
            return 'Super Admin';
        case $v == 'admin':
            return 'Admin';
        case $v == 'general':
            return 'general';
        default:
            return 'general';
    }
}

function CheckRoleMenuSelected($route, $routedata)
{
    foreach($routedata as $item_route)
    {
        if($route == $item_route->route)
        {
            return 'true';
            break;
        }
            
    }
    return false;
}

function DaftarTahun()
{
    $tahun = date('Y');
    $array_tahun = [];
    for($tahun_baru = $tahun; $tahun_baru >= 2020; $tahun_baru--)
    {
        array_push($array_tahun,$tahun_baru);
    }

    return $array_tahun;
}