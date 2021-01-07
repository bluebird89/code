from io import StringIO, BytesIO


f = StringIO('Hello!\nGoodbye!')
f.write('hello')

print(f.getvalue())
while True:
    s = f.readline()
    if s == '':
        break
    print(s.strip())


f = BytesIO(b'\xe4\xb8\xad\xe6\x96\x87')
f.write('中文' . encode('utf-8'))
print(f.getvalue())
