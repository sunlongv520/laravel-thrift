<?php
namespace Services;
use Rpc\Test\EchopIf;

class EchopServie implements EchopIf{
    public function Echop($str){
        \Log::info($str);
        return "RPC:".$str;
    }
}