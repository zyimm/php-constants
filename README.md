# php项目枚举常量配置管理&调用包

安装

```shell
composer  require zyimm/php-constants
```

## 使用示例

以一个简单流程配置为例:

```php
class FlowConst extends \Zyimm\PhpConstants\Constants
{
    protected static array $status = [
        'wait'  => [
            'value' => 0,
            'title' => '待审核'
        ],
        'pass'  => [
            'value' => 1,
            'title' => '通过'
        ],
        'reject' => [
            'value' => 2,
            'title' => '拒绝'
        ],
        'cancel' => [
            'value' => 3,
            'title' => '已取消'
        ]
    ];

}


```
1.获取某个枚举数值 
```php
FlowConst::getValueByKey('wait', 'status'); // 1
FlowConst::getValueByKey('cancel', 'status'); // 0
```

2.获取枚举数值map 
```php
FlowConst::getMap('status');// [0=>'待审核', 1=> '通过' ....]
```