class Student(object):

    @property
    def score(self):
        return self._score

    @score.setter
    def score(self, value):
        if not isinstance(value, int):
            raise ValueError('score must be an integer!')
        if value < 0 or value > 100:
            raise ValueError('score must between 0 ~ 100!')
        self._score = value

    @property
    def birth(self):
        return self._birth

    @birth.setter
    def birth(self, value):
        self._birth = value

    @property
    def age(self):
        return 2015 - self._birth


s = Student()
s.score = 60
print(s.score)


class Animal(object):
    pass


class Mammal(Animal):
    pass


class Runnable(object):
    def run(self):
        print('Running...')


class Flyable(object):
    def fly(self):
        print('Flying...')


# 多重继承
class Dog(Mammal, Runnable):
    pass


b = Animal()
c = Dog()
isinstance(b, Animal)
isinstance(c, Animal)


def run_twice(animal):
    animal.run()
    animal.run()


run_twice(c)

print(type(c))

# 获得一个对象的所有属性和方法
print(dir(c))
# 主线都是单一继承下来的 需要“混入”额外的功能
# MixIn 给一个类增加多个功能，这样，在设计类的时候，我们优先考虑通过多重继承来组合多个MixIn的功能，而不是设计多层次的复杂的继承关系。
