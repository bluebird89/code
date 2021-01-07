# with open('./content.txt', 'a', encoding='utf8') as f:
#     f.write('Hello, world! \n')

with open('content.txt', 'r', encoding='utf8') as f:
    print(f.read())

    for line in f.readlines():
        print(line.strip())


