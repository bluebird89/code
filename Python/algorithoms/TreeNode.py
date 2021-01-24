class TreeNode:
    def __init__(self, val, left=None, right=None):
        self.value = val
        self.leftChild = left
        self.rightChild = right


def search(value, node):
    if node is None or node.value == value:
        return True
    elif value < node.value:
        return search(node.leftChild, value)
    else:
        return search(node.rightChild, value)


def insert(value, node):
    if value < node.value:
        # 如果左子结点不存在，则将新值作为左子结点
        if node.leftChild is None:
            node.leftChild = TreeNode(value)
        else:
            insert(value, node.leftChild)
    elif value > node.value:
        if node.rightChild is None:
            node.rightChild = TreeNode(value)
        else:
            insert(value, node.rightChild)


def traverse_and_print(node):
    if node is None:
        return
    traverse_and_print(node.leftChild)
    print(node.value)
    traverse_and_print(node.rightChild)


def lift(node, nodeToDelte):
    if node.leftChild:
        node.leftChild = lift(node.leftChild, nodeToDelte)
        return node
    else:
        nodeToDelte.value = node.value
        return node.rightChild


def delete(value, node):
    if node is None:
        return None
    elif value < node.value:
        node.leftChild = delete(value, node.leftChild)
        return node
    elif value > node.value:
        node.rightChild = delete(value, node.rightChild)
        return node
    elif value == node.value:
        if node.leftChild is None:
            return node.rightChild
        elif node.rightChild is None:
            return node.leftChild
        else:
            node.rightChild = lift(node.rightChild, node)
            return node


if __name__ == '__main__':
    node = TreeNode(25, TreeNode(10), TreeNode(33))
    node2 = TreeNode(75, TreeNode(56), TreeNode(89))
    root = TreeNode(50, node, node2)

    # print(search(root, 6))
    print("/------ 原始 -----/")
    traverse_and_print(root)
    print("/------ 插入 -----/")
    insert(30, root)
    traverse_and_print(root)
    print("/------ 删除 -----/")
    insert(56, root)
    traverse_and_print(root)
