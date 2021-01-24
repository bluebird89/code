# Python 教程

* [Python教程](https://www.liaoxuefeng.com/wiki/1016959663602400)
* [Dejango](https://developer.mozilla.org/zh-CN/docs/Learn/Server-side/Django)

## scarpy

* todo: 配置 mongo

```
scrapy crawl douban_spider
scrapy crawl douban_spider -o douban.csv
```

## behave

```
pip install allure-behave
behave -f allure_behave.formatter:AllureFormatter -o report ./features
allure serve report
```

## 数据结构

* hash
    - 通过散列函数计算键的散列值，值是唯一的，查找 1
    - 冲突：不是将值放到格子里，而是放到该格子 所关联的数组里。查找：线性地在该数组中，检查每个子数组的索引 0 位置，如果碰到要找的词("dab")， 就返回该子数组的索引 1 的值
    - 负载因子：数量量与存储空间比值