<?php namespace Stats\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;
use Rpc\Test\EchopClient;
use Rpc\Test\EchopProcessor;
use Stats\Models\Test\Test;
use Entry\User;
use Request;
use Thrift\Exception\TException;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TPhpStream;

class RpcController extends Controller
{

    public function index(Request $request)
    {
        try {
            ob_end_clean();
            header("Content-type: application/x-thrift; charset=utf-8");
            if (php_sapi_name() == 'cli') {
                echo "\r\n";
                exit();
            }
            $handler = new \Services\EchopServie();
            $processor = new EchopProcessor($handler);
            $transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));
            $protocol = new TBinaryProtocol($transport, true, true);
            $transport->open();
            $processor->process($protocol, $protocol);
            $transport->close();
        } catch (TException $tx) {
            \Log::info($tx->getMessage());
        }
    }

    public function test(Request $request)
    {
        try {
            ini_set('memory_limit', '1024M');
            $socket = new THttpClient('192.168.1.188', 8082, '/rpc/index');
            $transport = new TBufferedTransport($socket, 1024, 1024);
            $protocol = new TBinaryProtocol($transport);
            $client = new \Rpc\Test\EchopClient($protocol);
            $transport->open();
            $result = $client->Echop('hello world !');
            print_r($result);
            $transport->close();
        } catch (TException $tx) {
            print_r($tx->getMessage());
        }

    }


}