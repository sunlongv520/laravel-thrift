说明：https://www.cnblogs.com/sunlong88/p/10031988.html
1，安装thrift

https://www.cnblogs.com/sunlong88/p/9965522.html

 

2，生成 RPC文件

thrift -r --out ./app --gen php:server ./ThriftSource/testServer.thrift



composer文件：

autoload": {
        "classmap": [
            "database",
            "app/Rpc"

        ],
        "psr-4": {
            "Entry\\": "app/entry",
            "Api\\": "app/api",
            "Stats\\": "app/stats",
            "Rpc\\": "app/Rpc",
            "Services\\": "app/services"
        }
    },
    
    
