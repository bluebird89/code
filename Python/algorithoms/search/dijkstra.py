def min_path(graph_root_name):
    pass


def find_lowest_cost_node(costs):
    lowest_cost = float("inf")
    lowest_cost_node = None

    for node in costs:
        cost = costs[node]
        if cost < lowest_cost and node not in processed:
            lowest_cost = cost
            lowest_cost_node = node
    return lowest_cost_node


if __name__ == '__main__':
    gragh = {"start": {}}
    gragh["start"]["a"] = 6
    gragh["start"]["b"] = 2

    gragh["a"] = {}
    gragh["a"]["fin"] = 1
    gragh["b"] = {}
    gragh["b"]["a"] = 3
    gragh["b"]["fin"] = 5

    gragh["fin"] = {}

    infinity = float("inf")
    costs = {"a": 6, "b": 2, "fin": infinity}

    parents = {"a": "start", "b": "start", "fin": None}

    processed = []

    node = find_lowest_cost_node(costs)
    while node is not None:
        cost = costs[node]
        neighbors = gragh[node]

        for n in neighbors.keys():
            new_cost = cost + neighbors[n]
            if costs[n] > new_cost:
                costs[n] = new_cost
                parents[n] = node
        processed.append(node)

        node = find_lowest_cost_node(costs)

    print(costs["fin"])
