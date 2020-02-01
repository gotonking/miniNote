# xnote插件
![Conda.png](/data/files/admin/upload/2020/01/Conda.png)
## 新增插件

点击菜单的【插件】-> 【新增插件】，然后在新增插件页面输入插件名称。（新增插件功能本身就是用插件机制实现的）

## 插件示例

```python
import xutils
import xauth
from xtemplate import BasePlugin

class Main(BasePlugin):
    """默认的插件声明入口，定义一个叫做Main的类"""
    
    title = '测试插件'
    # 插件类别
    category = "system"
    # 查看权限
    required_role = "admin"

    def render(self):
        # 处理页面渲染
        name = xutils.get_argument("name", "defaultName")
        return "Hello, %s" % name
    
```

## 插件卸载

直接删除对应的Python文件即可

## 插件的生命周期

一个插件在每次执行的时候都会产生新的实例，开发者可以把上下文信息放在插件对象的属性上面。

- 初始化：系统启动或者刷新的时候触发
- 响应客户请求：执行render方法
- 系统关闭：暂时无