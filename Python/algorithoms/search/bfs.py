from collections import deque


# BFS 通过图与队列实现
def search_queue(graph_root_name):
    queue = deque()
    queue += graph[graph_root_name]
    searched = []

    while queue:
        person = queue.popleft()
        if person not in searched:
            if person[-1] == 'm':
                print(person + "is a mango seller")
                return True
            else:
                queue += graph[person]
                searched.append(person)

    return False


if __name__ == '__main__':
    graph = {"you": ["alice", "bob", "claire"],
             "bob": ["anuj", "peggy"],
             "alice": ["peggy"],
             "claire": ["thom", "jonny"],
             "anuj": ["mango"],
             "peggy": [],
             "thom": [],
             "jonny": []}

    print(search_queue("you"))
