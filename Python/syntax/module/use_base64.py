import base64

print(base64.b64encode(b'binary\x00string'))
# url safe"的base64编码，其实就是把字符+和/分别变成-和_
print(base64.urlsafe_b64decode(b'binary\x00string'))

print(base64.b64decode(b'YmluYXJ5AHN0cmluZw=='))
