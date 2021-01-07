from datetime import datetime, timedelta, timezone

# 一个python文件就是一个模块，你把文件命名为datetime，于是解释器就去你这文件里找datetime，找不到于是报错
now = datetime.now()
print(now)

dt = datetime(2015, 4, 19, 12, 20)  # 用指定日期时间创建datetime
timestamp = dt.timestamp()
print(timestamp)
print(datetime.fromtimestamp(timestamp))
print(datetime.utcfromtimestamp(timestamp))

# str转换为datetime
cday = datetime.strptime('2015-6-1 18:19:59', '%Y-%m-%d %H:%M:%S')
print(cday)

# datetime转换为str
dtnow = datetime.now()
print(now.strftime('%a, %b %d %H:%M'))

# datetime加减
print(now + timedelta(hours=10))
print(now - timedelta(days=1))
print(now + timedelta(days=2, hours=12))

# 本地时间转换为UTC时间
tz_utc_8 = timezone(timedelta(hours=8))  # 创建时区UTC+5:00
now = datetime.now()
print(now)
dt = now.replace(tzinfo=tz_utc_8)
print(dt)

# 时区转换：通过utcnow()拿到当前的UTC时间，再转换为任意时区的时间
# 拿到一个datetime时，要获知其正确的时区，然后强制设置时区，作为基准时间。 通过astimezone()方法，可以转换到任意时区
utc_dt = datetime.utcnow().replace(tzinfo=timezone.utc)
print(utc_dt)
print(utc_dt.astimezone(timezone(timedelta(hours=9))))  # 东京时间
