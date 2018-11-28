说明：https://www.cnblogs.com/sunlong88/p/10031988.html

1，安装thrift
https://www.cnblogs.com/sunlong88/p/9965522.html

2，生成 RPC文件

thrift -r --out ./app --gen php:server ./ThriftSource/testServer.thrift


新建 EchopServie文件：

E:\workspace\laravel51-server\app\services\EchopServie.php



namespace Services;

use Rpc\Test\EchopIf;

 
class EchopServie implements EchopIf{
    public function Echop($str){
        \Log::info($str);
        return "RPC:".$str;
    }
}
　　

3，编写服务端和客户端：

Route::post('/rpc/index', 'RpcController@index')->name('rpc.index');

Route::get('/rpc/test', 'RpcController@test')->name('rpc.test');


  
  
    
    
