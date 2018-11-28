namespace php Rpc.Test

enum Operation {
ADD = 1,
SUBTRACT = 2,
MULTIPLY = 3,
DIVIDE = 4
}

exception InvalidOperation {
1: i32 whatOp,
2: string why
}

service Calculator {
double calculate(1:double num1, 2:double num2, 3:Operation op) throws (1:InvalidOperation ouch),
string echoString(1: string str) ,
}

service Echo {
string echo(1: string str) ,
}

作者：zcer
链接：https://www.jianshu.com/p/99405b3072b1
來源：简书
简书著作权归作者所有，任何形式的转载都请联系作者获